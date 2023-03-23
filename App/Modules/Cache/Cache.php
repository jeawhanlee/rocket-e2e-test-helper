<?php

namespace WP_Rocket_e2e\App\Modules\Cache;

class Cache {

    /**
     * Cache tests paths.
     *
     * @var array Array of url paths to be tested against.
     */
    private $cache_test_paths = [
        'consequatur-non-qui-facilis',
        'alias-vel-provident-quo',
    ];

    /**
     * Check that cache(user/non-user) cache is generated.
     *
     * @param boolean $user_cache check for user cache if true.
     * @return boolean
     */
    public function is_cache_generated( $user_cache = false ) : bool {
        /**
         * Filters the cache test path.
         * 
         * @param array $cache_test_path Array of cache paths.
         */
        $paths = apply_filters( 'rocket_e2e_cache_test_paths', $this->cache_test_paths );

        foreach ( $paths as $path ) {
            if ( ! rocket_direct_filesystem()->exists( $this->get_cache_root_dir( $user_cache ) . '/' . $path ) ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check that only common cache folder is created when common
     * cache is active and caching for logged in user is enabled.
     *
     * @return boolean
     */
    public function is_only_common_cache_folder_found() : bool {
        if ( ! $this->is_common_cache_enabled() ) {
            return false;
        }
    }

    /**
     * Check if common cache is active.
     *
     * @return boolean
     */
    private function is_common_cache_enabled() : bool {
        // Get rocket config buffer.
        $config_buffer = get_rocket_config_file()[1];
        if ( ! preg_match( '/\$rocket_common_cache_logged_users\s*=\s*(?<value>[0-9];)/', $config_buffer, $value ) ) {
            return false;
        }

        if ( 1 !== $value['value'] ) {
            return false;
        }

        return true;
    }

    /**
     * Return root cache directory.
     *
     * @param boolean $user_cache True if test case is user cache.
     * @return string
     */
    private function get_cache_root_dir( $user_cache = false ) : string {
        $url = get_site_url();

        $parse_url = get_rocket_parse_url( $url );
        $cache_dir = $parse_url['host'];

        // If testing for user cache.
        if ( $user_cache ) {
            global $current_user;
            wp_get_current_user();

            $user_key = $current_user->user_login . '-' . get_rocket_option( 'secret_cache_key' );

            $cache_dir = $parse_url['host'] . '-' . $user_key;
            $cache_dir = $this->sanitize_key( $cache_dir );
        }
		
		return rocket_get_constant( 'WP_ROCKET_CACHE_PATH' ) . $cache_dir;
    }

    /**
     * Sanitize user cache directory.
     *
     * @param string $key User Key.
     * @return string
     */
    private function sanitize_key( string $key ): string {
		$sanitized_key = strtolower( $key );
    
		return preg_replace( '/[^a-z0-9_\-]/', '', $sanitized_key );
	}
}