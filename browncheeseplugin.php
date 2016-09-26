<?php
/*
Plugin Name: Brown's cheese
Plugin URI: https://github.com/tunapanda/BrCh-wp-Plugin.git
Author: Tunapanda
*/

namespace BrCh_PLUGIN;

define('BrCh_PLUGIN_PATH', plugin_dir_path(__FILE__));
require_once BrCh_PLUGIN_PATH . 'lib/model/db.php';

register_activation_hook(BrCh_PLUGIN_PATH.'browncheeseplugin.php', "BrCh_PLUGIN\activate_plugin");
register_deactivation_hook(BrCh_PLUGIN_PATH.'browncheeseplugin.php', "BrCh_PLUGIN\activate_plugin");


