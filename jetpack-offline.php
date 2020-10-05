<?php
/**
 * Plugin Name: NUSA Jetpack Offline
 * Description: Turns Jetpack to offline mode for local development.
 * Version: 1.0
 * Author: Mike Estrada
 *
 * @package dev-toolbox
 *
 * Notes:
 * - Mainly utilized for enabling modules and testing them.
 * - Could also set the `JETPACK_DEV_DEBUG` constant to true.
 */

add_filter( 'jetpack_offline_mode', '__return_true' );
