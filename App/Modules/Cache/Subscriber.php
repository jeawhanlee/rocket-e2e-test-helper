<?php

namespace WP_Rocket_e2e\App\Modules\Cache;

use WP_Rocket_e2e\Events\Subscriber_Interface;

/**
 * Cache Subscriber.
 */
class Subscriber implements Subscriber_Interface {

    /**
     * Cache instance.
     *
     * @var Cache
     */
    protected $cache;

    /**
     * Instatiate class
     *
     * @param Cache $cache Cache instance.
     * @return void
     */
    public function __construct( Cache $cache ) {
        $this->cache = $cache;
    }

	/**
	 * Returns array of events this listen to.
	 *
	 * @return array
	 */
	public static function get_subscribed_events() : array {
		return [
			'rocket_e2e_should_generate_cache_for_logged_in_users' => 'is_user_cache_generated',
			'rocket_e2e_should_generate_cache' => 'is_cache_generated',
		];
	}

    /**
     * Check that user cache is generated.
     *
     * @return boolean
     */
    public function is_user_cache_generated() : bool {
        return $this->cache->is_cache_generated( true );
    }

    /**
     * Check that cache is generated.
     *
     * @return boolean
     */
    public function is_cache_generated() : bool {
        return $this->cache->is_cache_generated();
    }
}