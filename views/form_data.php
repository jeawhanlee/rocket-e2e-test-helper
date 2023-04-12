<?php
defined( 'ABSPATH' ) || exit;

return [
    'form_action' => admin_url( 'admin-post.php' ),

    'filters' => [
        'rocket_post_purge_urls' => [
            'false_return' => 'false',
            'null_return' => 'null',
            'zero' => '0',
            'empty_string' => '""',
            'float' => '2.5',
            'int' => '15',
            'invalid_array' => '["yy",0,True]',
        ],

        'nonce' => wp_create_nonce( CONFIG['PLUGIN_ID'] . '_filters_form_nonce' ),
    ]
];