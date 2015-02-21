<?php
/*
Plugin Name: Embed Calculator
Plugin URI: http://jumpstartcreatives.com/plugins/embed-calculator-plugin
Description: Provides multiple calculator options to embed on your site.
Version: 1.0
Author: Carlo Andro Mabugay
Author URI: http://github.com/chikolokoy08

Embed Calculator is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Embed Calculator is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Embed Calculator. If not, see {License URI}.

*/

/*****************************
* Global Variables
*****************************/

$emcal_plugin_name = 'embed-calc';
$emcal_options = get_option('emcal_settings');
$emcal_version = '1.0';

/*****************************
* Includes
*****************************/

include('lib/emcal-scripts.php');//All Scripts Here

include('lib/emcal-admin-page.php');//All Admin Page

include('lib/emcal-ajax.php');//All JS

include('lib/emcal-functions.php');//All Display and Shortcodes

