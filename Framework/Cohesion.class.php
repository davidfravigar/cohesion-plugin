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

		//$this->co_setUpFramework();
	}

	/**
	 * ---------------------------------------------------------------------------
	 *
	 * ---------------------------------------------------------------------------
	 */
	private function co_constants()
	{
		define('COHESION_DIR', plugin_dir_path(__FILE__));
		define('COHESION_HELPERS_DIR', COHESION_DIR . 'Admin/Helpers');
		define('COHESION_GENERATORS_DIR', COHESION_DIR . 'Admin/Generators');
	}

	/**
	 * ---------------------------------------------------------------------------
	 *
	 * ---------------------------------------------------------------------------
	 */
	private function co_includes()
	{
		$this->co_includeFiles('Helpers', COHESION_HELPERS_DIR);
		$this->co_includeFiles('Generator', COHESION_GENERATORS_DIR);
	}

	/**
	 * ---------------------------------------------------------------------------
	 *
	 * ---------------------------------------------------------------------------
	 */
	private function co_postTypesInit()
	{
		
	}

	/**
	 * ---------------------------------------------------------------------------
	 * include files
	 * ---------------------------------------------------------------------------
	 */
	private function co_includeFiles($fileType, $sourceFolder)
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