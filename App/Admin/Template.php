<?php

namespace WP_Rocket_e2e\App\Admin;

/**
 * Creates the plugin view.
 */
class Template {

    /**
     * Array of Modules.
     *
     * @var array Array of WP Rocket Modules
     */
    protected $modules = [
        [   
            'name' => 'Cache',
            'id' => 'cache_tab',
            'pane' => 'cache_tab_pane',
        ],
        [
            'name' => 'File Optimization',
            'id' => 'file_optimization_tab',
            'pane' => 'file_optimization_tab_pane',
        ],
        [
            'name' => 'Media',
            'id' => 'media_tab',
            'pane' => 'media_tab_pane',
        ],
        [
            'name' => 'Preload',
            'id' => 'preload_tab',
            'pane' => 'preload_tab_pane',
        ],
        [
            'name' => 'Advanced Rules',
            'id' => 'advanced_rules_tab',
            'pane' => 'advanced_rules_tab_pane',
        ],
        [
            'name' => 'Database',
            'id' => 'database_tab',
            'pane' => 'database_tab_pane',
        ],
        [
            'name' => 'CDN',
            'id' => 'cdn_tab',
            'pane' => 'cdn_tab_pane',
        ],
        [
            'name' => 'Heartbeat',
            'id' => 'heartbeat_tab',
            'pane' => 'heartbeat_pane',
        ],
        [
            'name' => 'Addons',
            'id' => 'addons_tab',
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
    public function load_module( string $id ): void {
        if ( ! $this->is_valid_module( $id ) ) {
            $this->admin_page();
            return;
        }

        require_once CONFIG[ 'PLUGIN_PATH' ] . 'views/modules/' . $id;
    }

    /**
     * Check valid module.
     *
     * @param string $id module id.
     * @return boolean
     */
    private function is_valid_module( string $id ) : bool {
        foreach ( $this->modules as $module ) {
            $file = str_replace( '', '_', strtolower( $module['name'] ) );

            if ( $id === $file ) {
                return true;
            }
        }

        return false;
    }
}