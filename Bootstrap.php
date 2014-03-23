<?php

/**
 * Plugin Name: Annoying user.
 * Description: An attempt to exploit WordPress
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
	)
		return;
}