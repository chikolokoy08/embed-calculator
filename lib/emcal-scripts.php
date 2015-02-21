<?php

/*****************************

* Scripts Includes

*****************************/

function emcal_load_scripts(){

	wp_enqueue_style('emcal-nst-styles', plugin_dir_url( __FILE__ ) . 'js/jquery.nstSlider.min.css');

	wp_enqueue_script(
		'emcal-nst-scripts',
		plugin_dir_url( __FILE__ ) . 'js/jquery.nstSlider.min.js',
		array( 'jquery' )
	);	
	
	wp_enqueue_style('emcal-styles', plugin_dir_url( __FILE__ ) . 'styles/emcal_styles.css');

	wp_enqueue_script(
		'emcal-scripts',
		plugin_dir_url( __FILE__ ) . 'js/emcal_scripts.js',
		array( 'jquery' )
	);
	
}

add_action('wp_enqueue_scripts', 'emcal_load_scripts');

function emcal_admin_styles() {
    wp_register_style( 'emcal_admin_stylesheet', plugins_url( 'styles/emcal_admin_styles.css', __FILE__ ) );
    wp_enqueue_style( 'emcal_admin_stylesheet' );
    wp_register_script( 'emcal_admin_scripts', plugins_url( 'js/emcal_admin_scripts.js', __FILE__ ) );
    wp_enqueue_script( 'emcal_admin_scripts' );


}

add_action( 'admin_enqueue_scripts', 'emcal_admin_styles' );

function emcal_custom_css()
{
	global $emcal_options;

	$output="<style type='text/css'> ".$emcal_options['mailCustomCSS']." </style>";

	echo $output;

}

add_action('wp_footer','emcal_custom_css');