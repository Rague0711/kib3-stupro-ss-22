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
 * Plugin strings are defined here.
 *
 * @package     mod_jupyter
 * @category    string
 * @copyright   KIB3 StuPro SS2022 Uni Stuttgart
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Jupyter Notebook';
$string['modulenameplural'] = '';
$string['modulename'] = 'Jupyter Notebook';
$string['pluginadministration'] = 'pluginadministration';
$string['jupytername_help'] = 'Help text';
$string['jupytername'] = 'Jupyter Name'; // Name of the activity module instance.
$string['jupytersettings'] = 'Standard settings';
$string['jupyterfieldset'] = '';
$string['repourl'] = 'Git Repository URL';
$string['branch'] = 'Branch';
$string['file'] = 'Notebook file to open';

$string['jupyter:addinstance'] = 'Add a new Jupyter Activity';

$string['jupyter_url_error'] = '<strong>Error</strong><br>Sorry, your Jupyter Notebook could not be loaded.<br>Please try contacting an admin and provide the following information to help resolve this issue.<br><br><strong>Cause:</strong> The provided URL ({$a->url}) is not availiable or does not lead to a Jupyter Notebook.<br>The following steps can help to resolve this issue:<br>1.) Check the <i>Admin Settings</i> and make sure the URL matches the one used in the Jupyterhub Docker.<br>2.) Check the <i>Activity Settings</i>  and make sure <i>Git Repository URL</i>, <i>Branch</i> and <i>Notebook file to open</i> are set correctly.';

//Admin plugin settings
//General
$string['generalconfig'] = 'General settings';
$string['generalconfig_desc'] = 'Settings required to reach the JupyterHub this plugin uses. Replace the default value with your own <strong>URL/IP</strong>.';
// URL.
$string['jupyterurl'] = 'Jupyter URL/IP';
$string['jupyterurl_desc'] = 'Add the URL (e.g. https://moodle.org) or IP (e.g. http://127.0.0.1:8000) to your JupyterHub.';
