<?php
/**
 * -----------------------------------------------------------------------------
 * Control Panel for Cohesion
 * -----------------------------------------------------------------------------
 * This is the control Panel for Cohesion.
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * Stop Direct Access
 * -----------------------------------------------------------------------------
 */

/**
 * -----------------------------------------------------------------------------
 * The Class
 * -----------------------------------------------------------------------------
 */
class Co_controlPanel
{
	/**
	 * ---------------------------------------------------------------------------
	 * Constructor
	 * ---------------------------------------------------------------------------
	 */
	function __construct()
	{
		$this->co_controlPanelConstants();
		add_action('admin_menu', array($this, 'co_controlPanelAddMenuPage'));
		add_action('admin_bar_menu', array($this, 'co_controlPanelAddAdminBarItem'), 2000);
	}//end

	/**
	 * ---------------------------------------------------------------------------
	 * Constants
	 * ---------------------------------------------------------------------------
	 */
	private function co_controlPanelConstants()
	{
		define('CONTROLPANEL_DIR', plugin_dir_path(__FILE__));
		define('CONTROLPANEL_URL',  plugins_url('cohesion/Framework/Admin/ControlPanel'));
		define('CONTROLPANEL_VIEWS', CONTROLPANEL_DIR . 'views');
		define('CONTROLPANEL_ASSETS', CONTROLPANEL_URL . '/assets');
		define('MENU_ID', 'co_controlPanel');
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Add Menu Page
	 * ---------------------------------------------------------------------------
	 */
	function co_controlPanelAddMenuPage()
	{
		add_menu_page(
      __('Cohesion', 'cohesion' ),
      'cohesion',
      'manage_options',
      CONTROLPANEL_VIEWS . '/controlPanelAdmin.php',
      '',
      CONTROLPANEL_ASSETS . '/images/cohesionIcon.png',
      6
    );
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Add navbar item
	 * ---------------------------------------------------------------------------
	 */
	function co_controlPanelAddAdminBarItem()
	{
		global $wp_admin_bar;
		$wp_admin_bar->add_menu(
			array('id' => MENU_ID,
				'title' => __('Cohesion'),
				'href' => 'admin.php?page=cohesion%2FFramework%2FAdmin%2FControlPanel%2Fviews%2FcontrolPanelAdmin.php',
			)
		);
	}

}//end class