<?php

namespace WP_Rocket_e2e\App\Admin;

/**
 * Handle pages view.
 */
class Pages {
    /**
     * Template instance.
     *
     * @var Template
     */
    protected $template;

    /**
     * Module views.
     *
     * @var array Array of modules view.
     */
    protected $views = [];

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
     * Load main view.
     *
     * @return void
     */
    public function render_views() : void {
        $this->cache_view();

        // Load modules to view.
        $this->views = $this->template->modules;
        require_once CONFIG[ 'PLUGIN_PATH' ] . 'views/main.php';
    }

    /**
     * Load all cache related test cases.
     *
     * @return void
     */
    private function cache_view() : void {
        $this->template->add_test_case(
            'cache',
            'should_generate_cache_files_for_logged-in_users',
            'Should generate cache files for logged-in users',
            apply_filters( 'rocket_e2e_should_generate_cache_for_logged_in_users', false )
        );

        $this->template->add_test_case(
            'cache',
            'should_generate_cache_files',
            'Should generate cache files for page visitors',
            apply_filters( 'rocket_e2e_should_generate_cache', false )
        );
    }
}
