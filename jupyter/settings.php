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
 * Plugin administration pages are defined here.
 *
 * @package     mod_jupyter
 * @category    admin
 * @copyright   2022 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
    if ($ADMIN->fulltree) {
        // TODO: Define the plugin settings page - {@link https://docs.moodle.org/dev/Admin_settings}.

        //Jupyter url setting
        $settings->add(new admin_setting_configtext('mod_jupyter/jupyterurl', get_string('jupyterurl', 'jupyter'),
            get_string('jupyterurl_desc', 'jupyter'), 'http://localhost.localdomain/', PARAM_URL));

        //Jupyter IP setting
        $settings->add(new admin_setting_configtext('mod_jupyter/jupyterip', get_string('jupyterip', 'jupyter'),
            get_string('jupyterip_desc', 'jupyter'), '255.255.255.255', PARAM_HOST));

        //Jupyter Port setting
        $settings->add(new admin_setting_configtext('mod_jupyter/jupyterport', get_string('jupyterport', 'jupyter'),
            get_string('jupyterport_desc', 'jupyter'), 80, PARAM_INT));

    }
}
