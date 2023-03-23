<?php

namespace WP_Rocket_e2e\App\Admin;

use WP_Rocket_e2e\App\Modules\Cache\Cache;

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
     * Cache instance.
     *
     * @var Cache
     */
    protected $cache;

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
    public function __construct( Template $template, Cache $cache ) {
        $this->template = $template;
        $this->cache = $cache;
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
            $this->cache->is_cache_generated( true )
        );

        $this->template->add_test_case(
            'cache',
            'should_generate_cache_files',
            'Should generate cache files for page visitors',
            $this->cache->is_cache_generated()
        );
    }
}
