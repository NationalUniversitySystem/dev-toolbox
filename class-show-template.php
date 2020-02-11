<?php
/**
 * Plugin Name: Show Template
 * Description: Show's the template file being used at the top of the page
 * Version: 1.0
 * Author: Mike Estrada
 *
 * @package development-toolbox
 *
 * Notes:
 * - This class is initiated at the bottom of the file.
 * - Define your preferred action/comment inside the __construct method
 */

if ( ! class_exists( 'Show_Template' ) ) {
	/**
	 * Show_Template
	 */
	class Show_Template {
		/**
		 * Instance of this class
		 *
		 * @var boolean
		 */
		public static $instance = false;

		/**
		 * Add all actions & filters and initial build setup
		 */
		public function __construct() {
			$this->action_hook    = 'wp_head';
			$this->comment_output = true;

			add_action( 'init', [ $this, 'show_template' ] );
		}

		/**
		 * Singleton
		 *
		 * Returns a single instance of the current class.
		 */
		public static function singleton() {
			if ( ! self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Print the full path of the current template to a specific location
		 *
		 * @return void
		 */
		public function show_template() {
			add_action( $this->action_hook, function() {
				global $template;

				$path = print_r( $template, true );

				if ( $this->comment_output ) {
					$path = sprintf( "<!-- Template path: \n %s \n --> \n", $path );
				}
				$allowed_tags = wp_kses_allowed_html( 'post' );

				echo wp_kses_post( $path );
			} );
		}

	} // End class definition

	// Initiate the class.
	Show_Template::singleton();
} // End if class_exists
