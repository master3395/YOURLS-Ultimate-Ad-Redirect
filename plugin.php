<?php
/*
Plugin Name: Ultimate Ad Redirect
Plugin URI: https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect
Description: Ultimate redirect plugin with customizable ads, countdown timer, and admin settings. Mobile-friendly and SEO-optimized.
Version: 2.0
Author: Master3395
Author URI: https://newstargeted.com/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Include modules for admin functionality
require_once dirname( __FILE__ ) . '/modules/admin-settings-functions.php';
require_once dirname( __FILE__ ) . '/modules/admin-form.php';
require_once dirname( __FILE__ ) . '/modules/admin-docs.php';
require_once dirname( __FILE__ ) . '/modules/admin-styles.php';
require_once dirname( __FILE__ ) . '/modules/admin-scripts.php';
require_once dirname( __FILE__ ) . '/modules/admin-settings.php';

// Hook into redirect process
yourls_add_action( 'pre_redirect', 'ultimate_ad_redirect_handler' );

// Initialize admin functionality
yourls_add_action( 'plugins_loaded', 'ultimate_ad_redirect_init' );

function ultimate_ad_redirect_init() {
    // Register admin page
    yourls_register_plugin_page( 'ultimate_ad_redirect', 'Ultimate Ad Redirect', 'ultimate_ad_redirect_admin_page' );
}

// Main redirect handler function
function ultimate_ad_redirect_handler( $args ) {
    $url = $args[0];
    $code = $args[1];
    
    // Get settings from database
    $settings = ultimate_ad_redirect_get_settings();
    
    // Set refresh header
    header( "refresh:" . $settings['countdown_time'] . ";url=$url" );
    
    // Simple countdown page
    echo $settings['redirect_message'] . " ";
    
    echo <<<HTML
<script type="text/javascript">
COUNTER_START = {$settings['countdown_time']}

function tick () {
    if (document.getElementById ('counter').firstChild.data > 0) {
        document.getElementById ('counter').firstChild.data = document.getElementById ('counter').firstChild.data - 1
        setTimeout ('tick()', 1000)
    } else {
        document.getElementById ('counter').firstChild.data = 'done'
    }
}

if (document.getElementById) onload = function () {
    var t = document.createTextNode (COUNTER_START)
    var p = document.createElement ('P')
    p.appendChild (t)
    p.setAttribute ('id', 'counter')
    
    var body = document.getElementsByTagName ('BODY')[0]
    var firstChild = body.getElementsByTagName ('*')[0]
    
    body.insertBefore (p, firstChild)
    tick()
}
</script>

<!-- Google AdSense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={$settings['adsense_client']}"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="{$settings['adsense_client']}"
     data-ad-slot="{$settings['adsense_slot']}"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
HTML;
    
    // Stop YOURLS from doing normal redirect
    die();
}
