<?php
/**
 * Trigger browsersync refresh on save and other actions.
 *
 * Requires a WP_SYNC_IP constant to be defined usually provided when booting up `npm run dev`.
 */

/**
 * Will only work if the constants are defined in wp-config.php.
 *
 * @return void
 */
function browsersync_save() {
	if ( ! defined( 'WP_ENV' ) || ! defined( 'WP_SYNC_IP' ) || ! in_array( WP_ENV, [ 'local', 'dev' ], true ) ) {
		return;
	}

	$args = [
		'blocking'  => false,
		'sslverify' => false,
	];

	wp_remote_get( 'https://' . WP_SYNC_IP . ':3000/__browser_sync__?method=reload', $args );
}
add_action( 'rest_after_insert_page', 'browsersync_save' );
add_action( 'rest_after_insert_post', 'browsersync_save' );
add_action( 'customize_save_after', 'browsersync_save' );
add_action( 'wp_update_nav_menu', 'browsersync_save' );
add_action( 'save_post', 'browsersync_save' );
add_action( 'update_post', 'browsersync_save' );
