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
		add_action('admin_menu', array($this, 'co_controlPanelAddMenuPages'));
		add_action('admin_bar_menu', array($this, 'co_controlPanelAddAdminBarItems'), 2000);
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
	function co_controlPanelAddMenuPages()
	{
		add_menu_page(
      __('Cohesion', 'cohesion' ),
      __('Cohesion', 'cohesion' ),
      'manage_options',
      'cohesion',
      array($this, 'controlPanelRenderAdminPage'),
      CONTROLPANEL_ASSETS . '/images/cohesionIcon.png',
      6
    );

    add_submenu_page(
    	  'cohesion',
        __('Post Types', 'cohesion'),
    		__('Post Types', 'cohesion'),
        'manage_options',
        'cohesion-posttypes',
        array($this, 'controlPanelRenderPostTypesPage')
    );
	}

	/**
	 * ---------------------------------------------------------------------------
	 * Add navbar item
	 * ---------------------------------------------------------------------------
	 */
	function co_controlPanelAddAdminBarItems()
	{
		global $wp_admin_bar;
		$wp_admin_bar->add_menu(
			array(
				'id' => MENU_ID,
				'title' => __('Cohesion'),
				'href' => 'admin.php?page=cohesion',
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'parent' => MENU_ID,
				'title' => __('Admin Page'),
				'id' => 'co_controlPanel-admin',
				'href' => 'admin.php?page=cohesion',
				'meta' => array('target' => '_self')
			)
		);
	}

	function controlPanelRenderAdminPage()
	{
		require_once(CONTROLPANEL_VIEWS . '/controlPanelAdmin.php');
	}

	function controlPanelRenderPostTypesPage()
	{
		require_once(CONTROLPANEL_VIEWS . '/ControlPanelPostTypes.php');
	}

}//end class