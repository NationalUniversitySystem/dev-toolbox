<?php
/**
 * Quick plugin to kill ssl verification for work on local environment
 *
 * @package dev-toolbox
 */

add_filter( 'http_request_args', function( $r, $url ) {
	if ( isset( $r['body']['action'] ) && 'dt_auth_check' === $r['body']['action'] ) {
		$r['sslverify'] = false;
	}

	return $r;
}, 10, 2 );

add_filter( 'https_ssl_verify', '__return_false' );
