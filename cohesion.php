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
 * This is the initializer file for our framework. The actual framework is located
 * in the framework folder. Here we create an array and pass it to the cohesion
 * class to initialize.
 *
 * @author David Fravigar <david@tjs.co.uk>
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
 * Define our array
 * -----------------------------------------------------------------------------
 */
$params = array(
	'theme_name'				=> 'Cohesion',
	'plugin_prefix'			=> 'co',
	'version'						=> '0.0.1',
	'post_types'				=> array(
		'name'						=> '',
	),
);

/**
 * -----------------------------------------------------------------------------
 * Instantiate everyting
 * -----------------------------------------------------------------------------
 */
$Cohesion = new Cohesion();
$Cohesion->co_init($params);