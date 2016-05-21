<?php
/**
 * -----------------------------------------------------------------------------
 * Cohesion Class
 * -----------------------------------------------------------------------------
 * Our init class.
 *
 * This class sets up Wordpress for us.
 *
 * @author David Fravigar <david.fravigar@me.com>
 * @version 0.0.1
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * Stop Direct Access
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * The class
 * -----------------------------------------------------------------------------
 */
class Cohesion
{
	/**
	 * ---------------------------------------------------------------------------
	 * Vars
	 * ---------------------------------------------------------------------------
	 */
	private $themeName;
	private $themePrefix;
	private $themeVersion;
	private $postTypes;
	private $taxonomies;

	/**
	 * ---------------------------------------------------------------------------
	 * Constructor
	 * ---------------------------------------------------------------------------
	 * Here if we need it.
	 * ---------------------------------------------------------------------------
	 */
	function __construct() {}

	/**
	 * ---------------------------------------------------------------------------
	 * Init Function
	 * ---------------------------------------------------------------------------
	 */
	public function co_init($params = array())
	{
		$this->co_constants();
		$this->co_includes();

		if(!empty($params)) {
			if(Co_GeneralHelpers::inArray('theme_name', $params)) {
				$this->themeName = $params['theme_name'];
			}

			if(Co_GeneralHelpers::inArray('theme_prefix', $params)) {
				$this->themePrefix = $params['theme_prefix'];
			}

			if(Co_GeneralHelpers::inArray('theme_version', $params)) {
				$this->themeVersion = $params['theme_version'];
			}

			if(Co_GeneralHelpers::inArray('post_types', $params)) {
				$this->postTypes = $params['post_types'];
				$this->co_postTypesInit();
			}
		}

		$this->co_frameworkGo();
	}

	/**
	 * ---------------------------------------------------------------------------
	 *
	 * ---------------------------------------------------------------------------
	 */
	private function co_constants()
	{
		define('COHESION_DIR', plugin_dir_path(__FILE__));
		define('COHESION_HELPERS_DIR', COHESION_DIR . 'Helpers');
		define('COHESION_GENERATORS_DIR', COHESION_DIR . 'Generators');
		define('COHESION_ADMIN_DIR', COHESION_DIR . 'Admin');
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Include Files
	 * ---------------------------------------------------------------------------
	 */
	private function co_includes()
	{
		$this->co_includeFiles(COHESION_HELPERS_DIR);
		$this->co_includeFiles(COHESION_GENERATORS_DIR);

		require_once(COHESION_ADMIN_DIR . '/ControlPanel/ControlPanel.php');
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Custom Post Type init
	 * ---------------------------------------------------------------------------
	 */
	private function co_postTypesInit()
	{
		foreach($this->postTypes as $postType) {
			CustomPostTypeGenetor::init($postType);
		}
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Framework Go
	 * ---------------------------------------------------------------------------
	 * This function creates all the classes we need.
	 * ---------------------------------------------------------------------------
	 */
	private function co_frameworkGo()
	{
		new Co_controlPanel();
	}

	/**
	 * ---------------------------------------------------------------------------
	 * include files
	 * ---------------------------------------------------------------------------
	 * A generic include file function, that scans a directory and includes the
	 * files it finds in it.
	 * ---------------------------------------------------------------------------
	 */
	private function co_includeFiles($sourceFolder)
	{
		//var_dump($sourceFolder);
		if(!is_dir($sourceFolder)) {
        die ("Invalid directory.\n\n");
    }
    $FILES = glob("$sourceFolder/{*.php}", GLOB_BRACE);
		foreach($FILES as $key => $file) {
			require_once($file);
		}
	}

}//end class