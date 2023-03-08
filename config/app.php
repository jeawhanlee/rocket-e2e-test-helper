<?php

return [
    // Plugin file.
    'PLUGIN_FILE' => ( $plugin_file = str_replace( 'config/app.php', 'rocket-e2e-test-helper.php', __FILE__ ) ),
    
    // Plugin path.
    'PLUGIN_PATH' => realpath( plugin_dir_path( $plugin_file ) ) . '/',

    // Plugin name.
    'PLUGIN' => 'Rocket E2E Tests',

    // Plugin ID.
    'PLUGIN_ID' => 'rocket_e2e_tests_helper',
];
