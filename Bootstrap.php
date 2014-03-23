<?php

/**
 * Plugin Name: Dracula
 * Description: An attempt to exploit WordPress with an invisible user. The white hat way.
 */

add_action( 'wp_loaded', 'initAnnoyingUser' );
function initAnnoyingUser()
{
	static $queryString;

	NULL === $queryString
	&& isset( $_SERVER['QUERY_STRING'] )
		AND parse_str( $_SERVER['QUERY_STRING'], $queryString );

	if (
		empty( $queryString )
		OR ! isset( $queryString['user-exploit'] )
		OR '1' !== $queryString['user-exploit']
	)
		return;

	echo '<h1>TEST</h1>';
}