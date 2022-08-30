<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Prints an instance of mod_jupyter.
 *
 * @package     mod_jupyter
 * @copyright   2022 StuPro Uni Stuttgart
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../config.php');
require_once(__DIR__.'/lib.php');
require (__DIR__ . '/vendor/autoload.php');

//MOODLE specific config

// Course module id.
$id = optional_param('id', 0, PARAM_INT);

// Activity instance id.
$j = optional_param('j', 0, PARAM_INT);

if ($id) {
    $cm = get_coursemodule_from_id('jupyter', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $moduleinstance = $DB->get_record('jupyter', array('id' => $cm->instance), '*', MUST_EXIST);
} else {
    $moduleinstance = $DB->get_record('jupyter', array('id' => $j), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $moduleinstance->course), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('jupyter', $moduleinstance->id, $course->id, false, MUST_EXIST);
}

require_login($course, true, $cm);

$modulecontext = context_module::instance($cm->id);

$PAGE->set_url('/mod/jupyter/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($moduleinstance->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($modulecontext);


//User interface
use Firebase\JWT\JWT;

$uniqueId=mb_strtolower($USER->username, "UTF-8");

//custom key must equal key in jupyterhub_docker .env !
$key = 'your-256-bit-secret';
$data = [
    "name"=> $uniqueId,
    "iat"=> time(),
    "exp"=> time()+15
];
$jwt = JWT::encode($data, $key, 'HS256');

//Get admin settings
$url = get_config('mod_jupyter', 'jupyterurl');
$ip = get_config('mod_jupyter', 'jupyterip');
$port = get_config('mod_jupyter', 'jupyterport');

$gitpath = genLink(
    $moduleinstance->repourl,
    $moduleinstance->branch,
    $moduleinstance->file
);

//If url empty, use port and ip
if(empty($url)){
    $jupyterLogin="http://" . $ip . ":" . $port . $gitpath . "&auth_token=".$jwt;

}else{
    $jupyterLogin= $url . $gitpath . "&auth_token=".$jwt;
}

$templatecontext=[
    'login'=> $jupyterLogin
];

echo $OUTPUT->header();
//echo $OUTPUT->heading($route);
$errorno = check_url($jupyterLogin);

if($errorno == 7){
    echo $OUTPUT->render_from_template('mod_jupyter/manage',$templatecontext);
}else{
    \core\notification::error(get_string('jupyter_url_error', 'jupyter'));
    echo $OUTPUT->render_from_template('mod_jupyter/manage_error',$templatecontext);
}
echo $OUTPUT->footer();

function genLink(string $repo, string $branch, string $file) : string {
    return $jupyterhub .
        '/hub/user-redirect/git-pull?repo=' .
        urlencode($repo) .
        '&urlpath=lab%2Ftree%2F' .
        urlencode(substr(strrchr($repo, "/"), 1)) .
        '%2F' .
        urlencode($file) .
        '&branch=' .
        urlencode($branch);
}

/**
 * @param string $url The url to check for availability.
 * @return boolean Returns true if url could be reached with acceptable http code (1xx-3xx)
 */
function check_url(string $url): bool {
    $url = str_replace("127.0.0.1","host.docker.internal",$url);
    //$curl = new curl();
    $curl = new curl(array('debug'=>true));
    //$curl->setopt(array('CURLOPT_CONNECTTIMEOUT'=> 5));
    $curl->setopt(array('CURLOPT_FOLLOWLOCATION'=> true));
    $curl->setopt(array('CURLOPT_MAXREDIRS'=> 100));
    $html = $curl->get($url);
    $response = $curl->getResponse();
    $info = $curl->get_info();
    $httpcode = $info['http_code'];
    $errorno = $curl->get_errno();

    \core\notification::error('http_code: ' . $info['http_code']);
    \core\notification::error('http response: ' . implode(",", $response));
    \core\notification::error('curl error number: ' . $errorno);

    if($httpcode < 400 && $httpcode >= 100){
        return true;
    }else{
        return false;
    }
}
