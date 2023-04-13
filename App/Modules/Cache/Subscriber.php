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
            'rocket_post_purge_urls' => 'purge_urls',
        ];
	}

    /**
     * Purge urls.
     *
     * @param array $purge_urls urls to purge.
     * @return mixed
     */
    public function purge_urls( array $purge_urls ) {
        if ( ! __get_option( 'rocket_post_purge_urls' ) ) {
            return $purge_urls;
        }

        $rocket_post_purge_urls = __get_option( 'rocket_post_purge_urls' );
        switch ( $rocket_post_purge_urls ) {
            case 'false_return':
                return false;
            case 'null_return':
                return null;
            case 'zero':
                return 0;
            case 'empty_string':
                return '';
            case 'float':
                return 2.5;
            case 'int':
                return 15;
            case 'invalid_array':
                return ['yy',0,True];
            default:
                return $purge_urls;
        }
    }
}