<?php
/**
 * -----------------------------------------------------------------------------
 * Wordpress Stuff.
 * -----------------------------------------------------------------------------
 * Plugin Name: Cohesion
 * Plugin URI: http://davidfravigar.com/
 * Description: A developer friendly framework.
 * Version: 0.0.1
 * Author: David Fravigar
 * Author URI: http://davidfravigar.com/
 * License: MIT
 * -----------------------------------------------------------------------------
 * Cohesion Framework
 * -----------------------------------------------------------------------------
 * "It is a period of civil war. Rebel spaceships, striking from a hidden base,
 * have won their first victory against the evil Galactic Empire. During the
 * battle, Rebel spies managed to steal secret plans to the Empire's ultimate
 * weapon, the DEATH STAR, an armored space station with enough power to destroy
 * an entire planet. Pursued by the Empire's sinister agents, Princess Leia races
 * home aboard her starship, custodian of the stolen plans that can save her
 * people and restore freedom to the galaxy...."
 *
 *A Wordpress framework for rapid creation of projects. This Framework has been
 * designed as a plugin so that if a new theme is required or simply swapped out
 * all the post types and taxonomies that have created are all still available
 * to Wordpress.
 *
 * This framework has also been coded be be modular so it is easier to update.
 * By having each section or feature within its own folder, it we want to update
 * the framework we can without breaking it.
 *
 * @author David Fravigar <david.fravigar@me.com>
 * @version 0.0.1
 * @see \Framework\Cohesion.class.php
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * Stop Direct Access
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * required Files
 * -----------------------------------------------------------------------------
 */
require_once('Framework/Cohesion.class.php');

/**
 * -----------------------------------------------------------------------------
 * post types
 * -----------------------------------------------------------------------------
 */
$postTypes = array(
	array(
		'name'					=> 'tenant',
		'description'		=> 'This is a post post type',
		'type'					=> 'post',
		'public'				=> true,
		'show_in_admin'	=> true,
		'params'				=> array(),
	),
	array(
		'name'					=> array('property', 'properties'),
		'description'		=> 'This is a page post type',
		'type'					=> 'page',
		'public'				=> true,
		'show_in_admin'	=> true,
		'params'				=> array(),
	)
);

/**
 * -----------------------------------------------------------------------------
 * Define our array
 * -----------------------------------------------------------------------------
 */
$params = array(
	'theme_name'			=> 'Cohesion',
	'plugin_prefix'		=> 'co',
	'version'					=> '0.0.1',
	'dev_email'				=> 'david@tjs.co.uk',
	'post_types'			=> $postTypes,
);

/**
 * -----------------------------------------------------------------------------
 * Instantiate everyting
 * -----------------------------------------------------------------------------
 */
$Cohesion = new Cohesion();
$Cohesion->co_init($params);