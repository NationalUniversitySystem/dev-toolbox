<?php
/**
 * Utility function to help debug.
 * Wil write whatever is passed to it to the debug.log file in /wp-content/.
 * Similar to `console.log` use in JS.
 *
 * Dependencies:
 * - WP_DEBUG constant defined as `true`, preferrably in wp-config.php file
 *
 * @package dev-toolbox
 */

if ( ! function_exists( 'write_to_log' ) ) {
	/**
	 * Add message/object/array to debug.log
	 *
	 * @param mixed $log Message to send to log.
	 *
	 * @return void
	 */
	function write_to_log( $log ) {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log );
			}
		}
	}
}
