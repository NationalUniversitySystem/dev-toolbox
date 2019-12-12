<?php
/**
 * Restore CSV upload functionality for WordPress 4.9.9 and up
 *
 * @package development-toolbox
 */

add_filter( 'wp_check_filetype_and_ext', function( $values, $file, $filename, $mimes ) {
	if ( extension_loaded( 'fileinfo' ) ) {
		// with the php-extension, a CSV file is issues type text/plain so we fix that back to
		// text/csv by trusting the file extension.
		$finfo     = finfo_open( FILEINFO_MIME_TYPE );
		$real_mime = finfo_file( $finfo, $file );
		finfo_close( $finfo );
		if ( 'text/plain' === $real_mime && preg_match( '/\.(csv)$/i', $filename ) ) {
			$values['ext']  = 'csv';
			$values['type'] = 'text/csv';
		}
	} else {
		// without the php-extension, we probably don't have the issue at all, but just to be sure...
		if ( preg_match( '/\.(csv)$/i', $filename ) ) {
			$values['ext']  = 'csv';
			$values['type'] = 'text/csv';
		}
	}
	return $values;
}, PHP_INT_MAX, 4 );
