<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers
	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	//Utility set providing handy methods
	require_once( 'external/zc-utilities.php' );

	//Default settings which we use all the time
	require_once( 'external/zc-settings.php' );

	/* ========================================================================================================================
	
	Shortcodes
	
	======================================================================================================================== */

	//Add custom shortcodes in shortcodes.php
	include('shortcodes.php');

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	//Add script enqueuer
	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		//Register and enqueue the default stylesheet
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/css/screen.min.css');
		wp_enqueue_style( 'screen' );

		//Register and enqueue the default javascript
		wp_register_script( 'libraries', get_stylesheet_directory_uri().'/js/libraries.js',array());
		wp_enqueue_script('libraries' );

		//Register and enqueue the default javascript
		wp_register_script( 'default', get_stylesheet_directory_uri().'/js/default.js',array());
		wp_enqueue_script('default' );
	}

	/* ========================================================================================================================

	Include custom menu walkers

	======================================================================================================================== */

	//Menu walkers can be used to change the menu output generated for a nav menu.
	include('menuwalkers.php');
	

	/* ========================================================================================================================
	
	Custom types and taxonomies
	
	======================================================================================================================== */

	include('customtypes.php');


	/* ========================================================================================================================
	
	Form handling
	
	======================================================================================================================== */

	include('formhandling.php');
