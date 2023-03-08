<?php
declare(strict_types=1);

namespace WP_Rocket_e2e\App\Admin;

use WP_Rocket_e2e\Events\Subscriber_Interface;

/**
 * Template Subscriber.
 */
class Subscriber implements Subscriber_Interface {

    /**
     * Template instance.
     *
     * @var Template
     */
    protected $template;

    /**
     * Instatiate class
     *
     * @param Template $template Template instance.
     * @return void
     */
    public function __construct( Template $template ) {
        $this->template = $template;
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
        $this->template->admin_menu();
    }
}
