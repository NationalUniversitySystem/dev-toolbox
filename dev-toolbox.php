<?php
/**
 * Plugin Name: Development Toolbox
 * Plugin URI: https://github.com/NationalUniversitySystem/development-toolbox
 * Description: Code and plugins used for site development. Should not be committed to repo and folder should be in .gitignore file.
 * Author: Mike Estrada
 * Version: 1.0.0
 * Requires PHP: 5.4
 *
 * @package development-toolbox
 */

// Require v5.4 of PHP.
define( 'DEV_TOOLBOX_REQUIRED_PHP_VERSION', '5.4' );
if ( version_compare( phpversion(), DEV_TOOLBOX_REQUIRED_PHP_VERSION, '<' ) ) {
	add_action( 'admin_notices', function() {
		?>
		<div class="notice notice-error">
			<p>You need to update your PHP version to run Development Toolbox.</p>
			<p>Actual version is: <strong><?php echo esc_html( phpversion() ); ?></strong>, required is <?php echo esc_html( DEV_TOOLBOX_REQUIRED_PHP_VERSION ); ?></p>
		</div>
		<?php
	} );

	return;
}

// If this is not a local/dev environment...bail.
if ( ! defined( 'WP_ENV' ) || ! in_array( WP_ENV, [ 'local', 'dev' ], true ) ) {
	return;
}

$files_to_load = [
	'write-to-log.php',
	'vip-activate-qm.php',
	'allow-csv-uploads.php',
	'class-show-template.php',
	'errors-report.php',
	'footer-queries.php',
	'https-ssl-verify.php',
	'override-attachment-import.php',
	'yoast-development.php',
];

foreach ( $files_to_load as $file_name ) {
	require __DIR__ . '/' . $file_name;
}
