<?php

namespace WP_Rocket_e2e;

use League\Container\Container;
use WP_Rocket_e2e\Events\Event_Manager;
use WP_Rocket_e2e\App\ServiceProvider as AssetsServiceProvider;
use WP_Rocket_e2e\App\Modules\ServiceProvider as ModulesServiceProvider;

class Plugin {
    protected $container;

    protected $event_manager;

    public function __construct( array $config_assets, Container $container ) {
        $this->container = $container;

        $this->container->add( 'config_assets', $config_assets );
    }

    public function run() : void {
        $this->event_manager = new Event_Manager();
		$this->container->add( 'event_manager', $this->event_manager )->setShared();

        $this->filter_subscribers();
        $this->container->addServiceProvider( new AssetsServiceProvider );
        $this->container->addServiceProvider( new ModulesServiceProvider );

        foreach ( Subscriber::get() as $subscriber ) {
            $this->event_manager->add_subscriber( $this->container->get( $subscriber ) );
        }
    }

    private function filter_subscribers() : void {
        if ( is_admin() ) {
            require_once CONFIG[ 'PLUGIN_PATH' ] . 'subscribers/admin.php';
        }
    }
}