<?php
/**
 * Admin Styles Module for Ultimate Ad Redirect Plugin
 * Main styles coordinator - includes all style modules
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Include style modules
require_once dirname( __FILE__ ) . '/admin-styles-base.php';
require_once dirname( __FILE__ ) . '/admin-styles-themes.php';
require_once dirname( __FILE__ ) . '/admin-styles-auto.php';

/**
 * Get all admin styles CSS
 */
function ultimate_ad_redirect_get_admin_styles() {
    $base_styles = ultimate_ad_redirect_get_base_styles();
    $theme_styles = ultimate_ad_redirect_get_theme_styles();
    $auto_styles = ultimate_ad_redirect_get_auto_theme_styles();
    
    return $base_styles . $theme_styles . $auto_styles;
}