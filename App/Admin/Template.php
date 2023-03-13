<?php

namespace WP_Rocket_e2e\App\Admin;

/**
 * Creates the plugin view.
 */
class Template {

    /**
     * Array of Module views.
     *
     * @var array Array of WP Rocket Module views.
     */
    protected $views = [
        [   
            'name' => 'Cache',
            'id' => 'cache',
            'pane' => 'cache_tab_pane',
        ],
        [
            'name' => 'File Optimization',
            'id' => 'file_optimization',
            'pane' => 'file_optimization_tab_pane',
        ],
        [
            'name' => 'Media',
            'id' => 'media',
            'pane' => 'media_tab_pane',
        ],
        [
            'name' => 'Preload',
            'id' => 'preload',
            'pane' => 'preload_tab_pane',
        ],
        [
            'name' => 'Advanced Rules',
            'id' => 'advanced_rules',
            'pane' => 'advanced_rules_tab_pane',
        ],
        [
            'name' => 'Database',
            'id' => 'database',
            'pane' => 'database_tab_pane',
        ],
        [
            'name' => 'CDN',
            'id' => 'cdn',
            'pane' => 'cdn_tab_pane',
        ],
        [
            'name' => 'Heartbeat',
            'id' => 'heartbeat',
            'pane' => 'heartbeat_pane',
        ],
        [
            'name' => 'Addons',
            'id' => 'addons',
            'pane' => 'addons_pane',
        ],
    ];

    /**
     * Add admin
     *
     * @return void
     */
    public function admin_menu() : void {
        add_management_page( 
            CONFIG['PLUGIN'], 
            CONFIG['PLUGIN'],
            'install_plugins',
            CONFIG['PLUGIN_ID'],
            [ $this, 'admin_page' ]
        );
    }

    /**
     * Load main view.
     *
     * @return void
     */
    public function admin_page() : void {
        require_once CONFIG[ 'PLUGIN_PATH' ] . 'views/main.php';
    }

    /**
     * Load module view.
     *
     * @param string $id module id.
     * @return void
     */
    public function load_view( string $id ): void {
        if ( ! $this->is_valid_module( $id ) ) {
            $id = 'cache';
        }

        $this->cache();

        require_once CONFIG[ 'PLUGIN_PATH' ] . 'views/modules/' . $id . '.php';
    }

    private function cache() {
        apply_filters( 'rocket_e2e_should_generate_cache_for_logged_in_users', false );
    }

    /**
     * Check valid module.
     *
     * @param string $id module id.
     * @return boolean
     */
    private function is_valid_module( string $id ) : bool {
        foreach ( $this->views as $view ) {
            if ( $id === $view['id'] ) {
                return true;
            }
        }

        return false;
    }
}
