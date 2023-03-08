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
            'name' => 'cache',
            'id' => 'cache_tab',
            'pane' => 'cache_tab_pane',
        ],
        [
            'name' => 'file optimization',
            'id' => 'file_optimization_tab',
            'pane' => 'file_optimization_tab_pane',
        ],
        [
            'name' => 'media',
            'id' => 'media_tab',
            'pane' => 'media_tab_pane',
        ],
        [
            'name' => 'preload',
            'id' => 'preload_tab',
            'pane' => 'preload_tab_pane',
        ],
        [
            'name' => 'advanced rules',
            'id' => 'advanced_rules_tab',
            'pane' => 'advanced_rules_tab_pane',
        ],
        [
            'name' => 'database',
            'id' => 'database_tab',
            'pane' => 'database_tab_pane',
        ],
        [
            'name' => 'cdn',
            'id' => 'cdn_tab',
            'pane' => 'cdn_tab_pane',
        ],
        [
            'name' => 'heartbeat',
            'id' => 'heartbeat_tab',
            'pane' => 'heartbeat_pane',
        ],
        [
            'name' => 'addons',
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

    public function admin_page() : void {
        require_once CONFIG[ 'PLUGIN_PATH' ] . 'views/main.php';
    }
}