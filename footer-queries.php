<?php
/**
 * Plugin Name: Footer Queries
 * Description: Display the queries in the footer if parameter is set
 * Version: 1.0
 * Author: Mike Estrada
 *
 * @package development-toolbox
 */

if ( isset( $_GET['fqueries'] ) ) {
	add_action( 'wp_footer', 'run_footer_queries' );

	function run_footer_queries() {
		echo esc_html( get_num_queries() ) . 'queries in' . esc_html( timer_stop( 1 ) ) . ' seconds.';

		if ( ! empty( $_GET['fqueries'] ) ) {
			global $wpdb;
			echo '<pre>';
			print_r( $wpdb->queries );
			echo '</pre>';
		}
	}
}
