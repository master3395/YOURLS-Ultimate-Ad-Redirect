<?php
/**
 * Admin Settings Functions Module for Ultimate Ad Redirect Plugin
 * Handles settings retrieval, validation, and updates
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get default plugin settings
 */
function ultimate_ad_redirect_get_default_settings() {
    return array(
        'countdown_time' => 10,
        'redirect_message' => 'You\'ll be redirected in',
        'page_title' => 'Redirecting...',
        'bg_color' => '#1a1a1a',
        'text_color' => '#ffffff',
        'adsense_client' => 'ca-pub-3060717665802203',
        'adsense_slot' => '6872727175',
        'adsense_format' => 'auto',
        'ga_id' => '',
        'gtm_id' => '',
        'custom_ad_html' => '',
        'admin_theme' => 'auto',
        'settings_configured' => false
    );
}

/**
 * Get current plugin settings
 */
function ultimate_ad_redirect_get_settings() {
    $defaults = ultimate_ad_redirect_get_default_settings();
    $settings = yourls_get_option( 'ultimate_ad_redirect_settings', $defaults );
    
    // Merge with defaults to ensure all keys exist
    return array_merge( $defaults, $settings );
}

/**
 * Update plugin settings
 */
function ultimate_ad_redirect_update_settings() {
    // Log to file
    $log_file = dirname(dirname(__FILE__)) . '/logs/settings_update.log';
    $log_entry = date('Y-m-d H:i:s') . " - Starting settings update\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Inside update_settings function...</p></div>';
    
    // Debug: Check what POST data we have
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> POST data: ' . print_r($_POST, true) . '</p></div>';
    
    // Log POST data
    $log_entry = date('Y-m-d H:i:s') . " - POST data: " . print_r($_POST, true) . "\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    
    // Check if required fields exist
    if (!isset($_POST['countdown_time'])) {
        echo '<div class="notice notice-error"><p><strong>ERROR:</strong> countdown_time missing from POST!</p></div>';
        return;
    }
    if (!isset($_POST['redirect_message'])) {
        echo '<div class="notice notice-error"><p><strong>ERROR:</strong> redirect_message missing from POST!</p></div>';
        return;
    }
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Required fields exist, creating settings array...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Required fields exist, creating settings array\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    
    // Build settings array step by step with debug
    $settings = array();
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing countdown_time...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Processing countdown_time\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    $settings['countdown_time'] = intval( $_POST['countdown_time'] );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing redirect_message...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Processing redirect_message\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    $settings['redirect_message'] = htmlspecialchars( $_POST['redirect_message'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing page_title...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Processing page_title\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    $settings['page_title'] = htmlspecialchars( $_POST['page_title'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing bg_color...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Processing bg_color\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    $settings['bg_color'] = htmlspecialchars( $_POST['bg_color'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing text_color...</p></div>';
    $settings['text_color'] = htmlspecialchars( $_POST['text_color'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing adsense_client...</p></div>';
    $settings['adsense_client'] = htmlspecialchars( $_POST['adsense_client'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing adsense_slot...</p></div>';
    $settings['adsense_slot'] = htmlspecialchars( $_POST['adsense_slot'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing adsense_format...</p></div>';
    $settings['adsense_format'] = htmlspecialchars( $_POST['adsense_format'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing ga_id...</p></div>';
    $settings['ga_id'] = htmlspecialchars( $_POST['ga_id'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing gtm_id...</p></div>';
    $settings['gtm_id'] = htmlspecialchars( $_POST['gtm_id'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing custom_ad_html...</p></div>';
    $settings['custom_ad_html'] = htmlspecialchars( $_POST['custom_ad_html'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Processing admin_theme...</p></div>';
    $settings['admin_theme'] = htmlspecialchars( $_POST['admin_theme'], ENT_QUOTES, 'UTF-8' );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Setting settings_configured...</p></div>';
    $settings['settings_configured'] = true;
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Settings array created, about to validate...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Settings array created, about to validate\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    
    // Validate countdown time
    if ( $settings['countdown_time'] < 3 ) $settings['countdown_time'] = 3;
    if ( $settings['countdown_time'] > 60 ) $settings['countdown_time'] = 60;
    
    // Validate colors
    if ( !preg_match('/^#[a-fA-F0-9]{6}$/', $settings['bg_color']) ) $settings['bg_color'] = '#1a1a1a';
    if ( !preg_match('/^#[a-fA-F0-9]{6}$/', $settings['text_color']) ) $settings['text_color'] = '#ffffff';
    
    // Validate AdSense client ID format
    if ( !empty( $settings['adsense_client'] ) && !preg_match('/^ca-pub-[0-9]+$/', $settings['adsense_client']) ) {
        $settings['adsense_client'] = '';
    }
    
    // Validate GA ID format
    if ( !empty( $settings['ga_id'] ) && !preg_match('/^G-[A-Z0-9]+$/', $settings['ga_id']) ) {
        $settings['ga_id'] = '';
    }
    
    // Validate GTM ID format
    if ( !empty( $settings['gtm_id'] ) && !preg_match('/^GTM-[A-Z0-9]+$/', $settings['gtm_id']) ) {
        $settings['gtm_id'] = '';
    }
    
    // Update settings
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> About to update option in database...</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - About to update option in database\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
    
    yourls_update_option( 'ultimate_ad_redirect_settings', $settings );
    
    echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Settings update completed!</p></div>';
    $log_entry = date('Y-m-d H:i:s') . " - Settings update completed successfully!\n";
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}
