<?php
/**
 * Force the WordPress importer to update existing posts instead of skipping them
 *
 * @package development-toolbox
 */

add_filter( 'wp_import_existing_post', function( $post_exists, $post ) {
	return 0;
}, 10, 2 );
