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
     * Instatiate class
     *
     * @param Template $template Template instance.
     * @return void
     */
    public function __construct( Pages $pages ) {
        $this->pages = $pages;
    }

	/**
	 * Returns array of events this listen to.
	 *
	 * @return array
	 */
	public static function get_subscribed_events() : array {
		return [
			'admin_menu' => 'admin_menu',
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
}
