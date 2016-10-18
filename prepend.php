<?php

global $ds_runtime;
if ( 'start_services' != $ds_runtime->last_ui_event->action ) {
	return;
}

define( 'ERROR_LOG_PATH', $ds_runtime->htdocs_dir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'logs' );

$dh = opendir( ERROR_LOG_PATH );
while ( ( $file = readdir( $dh ) ) !== false ) {

	if ( $file === 'php_error_log' ) {  // do some sort of filtering on files

    	$path = ERROR_LOG_PATH . DIRECTORY_SEPARATOR . $file;
        unlink( $path );  // remove it

	}

}
