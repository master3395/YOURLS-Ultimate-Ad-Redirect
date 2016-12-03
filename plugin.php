<?php
/*
Plugin Name: Fallback to main website
Plugin URI: https://roblox-network.com/yourls-plugins
Description: Users can change their url in the plugin file.
Version: 1.2
Author: Master3395 <info@roblox-network.com>
Author URI: https://roblox-network.com/master3395
*/

// No direct call
if( ! defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Set default password requirements. Default is minimum 6 characters.
 * You may also enable the following:
 * - Require at least one digit
 * - Require at lesat one special character
 * - Require both uppercase and lowercase letters
 * 
 * You can change these options in your config.php file.
 * This example enables everything:
 *
/**
 * Add hooks required for plugin
 */
yourls_add_filter( 'logout_link',		'vva_change_password_logout_link' );

/**
 * Add the change password link next to logout so it makes sense in the UI
 * 
 * @param string $logout_link
 * @return string $logout_link
 */
function vva_change_password_logout_link ( $logout_link )
{
	$admin_pages = yourls_list_plugin_admin_pages();
	$change_password_url = $admin_pages[ 'change_password' ][ 'url' ];
	
	$logout_link = rtrim( $logout_link, ')' );
	$logout_link .= sprintf( ' | <a href="/">Go to main website.</a>)', $change_password_url );
	
	return $logout_link;
}

/**
 * Remove Redict to main website link from sublist of manage plugins since we're
 * adding it to the logout link
 * 
 * @param array $admin_sublinks
 * @return array $admin_sublinks
 */

function vva_change_password_admin_sublinks( $admin_sublinks )
{
	unset( $admin_sublinks[ 'plugins' ][ 'change_password' ] );
	
	return $admin_sublinks;
}

/**
 * Update current user's password in config file
 * 
 * Borrowed heavily from yourls_hash_passwords_now()
 * 
 * @param string $new_password
 * @return boolean
 */

/**
 * Verify YOURLS >= 1.7, passwords are hashed, and config file is writable
 * 
 * @return bool
 */
function vva_change_password_verify_capabilities()
{
	$error = FALSE;
	
	if ( version_compare( YOURLS_VERSION, '1.7', 'lt' ) )
	{
		$error .= 'Error: This plugin requires YOURLS version 1.7 or greater<br />';
	}
	
	if ( yourls_has_cleartext_passwords() )
	{
		$error .= 'Error: This plugin requires stored passwords to be hashed<br />';
	}
	
	if ( ! is_readable( YOURLS_CONFIGFILE ) )
		
	{
		$error .= 'Error: Cannot read config file<br />';
	}
		
	if ( ! is_writable( YOURLS_CONFIGFILE ) )
	{
		$error .= 'Error: Cannot write config file<br />';
	}
	
	if ( $error )
	{
		echo '<p class="error">' . $error . '</p>';
		
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

// EOF */
