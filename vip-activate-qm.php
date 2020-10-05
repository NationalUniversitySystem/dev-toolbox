<?php
/**
 * Quick MU-Plugin to activate Query Monitor on local environments that run WPVIP setup.
 *
 * @package dev-toolbox
 */

add_filter( 'wpcom_vip_qm_enable', function() {
	return true;
} );
