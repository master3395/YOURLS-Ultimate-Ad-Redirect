<?php
/**
 * Analytics Module for Ultimate Ad Redirect Plugin
 * Handles tracking and analytics for redirects
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Track redirect analytics
 */
function ultimate_ad_redirect_track_redirect( $url ) {
    // Get user IP
    $ip = ultimate_ad_redirect_get_user_ip();
    
    // Get user agent
    $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
    
    // Get referrer
    $referrer = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : 'Direct';
    
    // Get timestamp
    $timestamp = date( 'Y-m-d H:i:s' );
    
    // Prepare tracking data
    $tracking_data = array(
        'url' => $url,
        'ip' => $ip,
        'user_agent' => $user_agent,
        'referrer' => $referrer,
        'timestamp' => $timestamp,
        'short_url' => ultimate_ad_redirect_get_current_short_url()
    );
    
    // Log to file for debugging
    ultimate_ad_redirect_log_redirect( $tracking_data );
    
    // Send to Google Analytics if configured
    $settings = ultimate_ad_redirect_get_settings();
    if ( !empty( $settings['ga_id'] ) ) {
        ultimate_ad_redirect_send_ga_event( $tracking_data );
    }
}

/**
 * Get user IP address
 */
function ultimate_ad_redirect_get_user_ip() {
    $ip_keys = array(
        'HTTP_CF_CONNECTING_IP',     // Cloudflare
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
    );
    
    foreach ( $ip_keys as $key ) {
        if ( array_key_exists( $key, $_SERVER ) === true ) {
            foreach ( explode( ',', $_SERVER[$key] ) as $ip ) {
                $ip = trim( $ip );
                if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) !== false ) {
                    return $ip;
                }
            }
        }
    }
    
    return isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : 'Unknown';
}

/**
 * Get current short URL
 */
function ultimate_ad_redirect_get_current_short_url() {
    $protocol = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $path = $_SERVER['REQUEST_URI'];
    
    return $protocol . '://' . $host . $path;
}

/**
 * Log redirect data to file
 */
function ultimate_ad_redirect_log_redirect( $data ) {
    $log_file = dirname( __FILE__ ) . '/../logs/redirects.log';
    $log_dir = dirname( $log_file );
    
    // Create logs directory if it doesn't exist
    if ( !file_exists( $log_dir ) ) {
        mkdir( $log_dir, 0755, true );
    }
    
    // Format log entry
    $log_entry = sprintf(
        "[%s] IP: %s | URL: %s | Short: %s | Referrer: %s | UA: %s\n",
        $data['timestamp'],
        $data['ip'],
        $data['url'],
        $data['short_url'],
        $data['referrer'],
        substr( $data['user_agent'], 0, 100 )
    );
    
    // Write to log file
    file_put_contents( $log_file, $log_entry, FILE_APPEND | LOCK_EX );
}

/**
 * Send event to Google Analytics
 */
function ultimate_ad_redirect_send_ga_event( $data ) {
    // This would typically be done via JavaScript on the client side
    // But we can prepare the data for the frontend
    $ga_event = array(
        'event_name' => 'redirect_viewed',
        'event_category' => 'redirect',
        'event_label' => $data['url'],
        'value' => 1,
        'custom_parameters' => array(
            'short_url' => $data['short_url'],
            'referrer' => $data['referrer']
        )
    );
    
    // Store in session for JavaScript to pick up
    if ( !session_id() ) {
        session_start();
    }
    $_SESSION['ultimate_ad_redirect_ga_event'] = $ga_event;
}

/**
 * Get redirect statistics
 */
function ultimate_ad_redirect_get_stats() {
    $log_file = dirname( __FILE__ ) . '/../logs/redirects.log';
    
    if ( !file_exists( $log_file ) ) {
        return array(
            'total_redirects' => 0,
            'unique_ips' => 0,
            'top_referrers' => array(),
            'recent_redirects' => array()
        );
    }
    
    $lines = file( $log_file, FILE_IGNORE_NEW_LINES );
    $total_redirects = count( $lines );
    $ips = array();
    $referrers = array();
    $recent_redirects = array();
    
    // Process last 100 lines for recent data
    $recent_lines = array_slice( $lines, -100 );
    
    foreach ( $recent_lines as $line ) {
        if ( preg_match( '/\[([^\]]+)\] IP: ([^|]+) \| URL: ([^|]+) \| Short: ([^|]+) \| Referrer: ([^|]+) \| UA: (.+)/', $line, $matches ) ) {
            $ips[] = $matches[2];
            $referrers[] = $matches[5];
            $recent_redirects[] = array(
                'timestamp' => $matches[1],
                'ip' => $matches[2],
                'url' => $matches[3],
                'short_url' => $matches[4],
                'referrer' => $matches[5]
            );
        }
    }
    
    $unique_ips = count( array_unique( $ips ) );
    $referrer_counts = array_count_values( $referrers );
    arsort( $referrer_counts );
    $top_referrers = array_slice( $referrer_counts, 0, 5, true );
    
    return array(
        'total_redirects' => $total_redirects,
        'unique_ips' => $unique_ips,
        'top_referrers' => $top_referrers,
        'recent_redirects' => array_slice( $recent_redirects, -10 )
    );
}
