<?php
namespace WP_Rocket_e2e\App;

/**
 * 
 */
class Activation_Deactivation {
    
    /**
     * Fires process when plugin is activated.
     *
     * @return void
     */
    public function activate() : void {
        $config = [
            'rocket_post_purge_urls' => 'default',
        ];

        add_option( 'wpr_e2e_config', $config );
    }

    /**
     * Fires process when plugin is deactivated.
     *
     * @return void
     */
    public function deactivate() : void {
        delete_option( 'wpr_e2e_config' );
    }
}