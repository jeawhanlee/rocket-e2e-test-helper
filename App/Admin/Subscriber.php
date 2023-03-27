<?php
declare(strict_types=1);

namespace WP_Rocket_e2e\App\Admin;

use WP_Rocket_e2e\Events\Subscriber_Interface;

/**
 * Template Subscriber.
 */
class Subscriber implements Subscriber_Interface {

    /**
     * Pages instance.
     *
     * @var Pages
     */
    protected $pages;

    /**
     * Notices instance.
     *
     * @var Notices
     */
    protected $notices;

    /**
     * Instatiate class
     *
     * @param Template $template Template instance.
     * @return void
     */
    public function __construct( Pages $pages, Notices $notices ) {
        $this->pages = $pages;
        $this->notices = $notices;
    }

	/**
	 * Returns array of events this listen to.
	 *
	 * @return array
	 */
	public static function get_subscribed_events() : array {
		return [
			'admin_menu' => 'admin_menu',
            'admin_notices' => 'debug_log_notice',
		];
	}

    /**
     * Add to admin menu.
     *
     * @return void
     */
    public function admin_menu() : void {
        add_management_page( 
            CONFIG['PLUGIN'], 
            CONFIG['PLUGIN'],
            'install_plugins',
            CONFIG['PLUGIN_ID'],
            [ $this->pages, 'render_views' ]
        );
    }

    /**
     * Display notice for wp rocket related warnings/errors in debug.log.
     *
     * @return void
     */
    public function debug_log_notice() : void {
        $this->notices->debug_log_notice();
    }
}
