<?php
/**
 * Ad Manager Module for Ultimate Ad Redirect Plugin
 * Handles all advertisement display and management
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get ad content based on settings
 */
function ultimate_ad_redirect_get_ad_content( $settings ) {
    $ad_content = '';
    
    // Add custom ad HTML if provided
    if ( !empty( $settings['custom_ad_html'] ) ) {
        $ad_content .= '<div class="custom-ad">' . $settings['custom_ad_html'] . '</div>';
    }
    
    // Add Google AdSense if configured
    if ( !empty( $settings['adsense_client'] ) && !empty( $settings['adsense_slot'] ) ) {
        $ad_content .= ultimate_ad_redirect_get_adsense_code( $settings );
    }
    
    // Add default ads if no custom ads configured
    if ( empty( $ad_content ) ) {
        $ad_content = ultimate_ad_redirect_get_default_ads();
    }
    
    return $ad_content;
}

/**
 * Get Google AdSense code
 */
function ultimate_ad_redirect_get_adsense_code( $settings ) {
    $client_id = esc_attr( $settings['adsense_client'] );
    $slot_id = esc_attr( $settings['adsense_slot'] );
    $format = esc_attr( $settings['adsense_format'] );
    
    return <<<HTML
    <div class="adsense-container">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={$client_id}" crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="{$client_id}"
             data-ad-slot="{$slot_id}"
             data-ad-format="{$format}"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
HTML;
}

/**
 * Get default ads when no custom ads are configured
 */
function ultimate_ad_redirect_get_default_ads() {
    return <<<HTML
    <div class="default-ads">
        <!-- Default AdSense Ad -->
        <div class="adsense-container">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3060717665802203" crossorigin="anonymous"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-3060717665802203"
                 data-ad-slot="6872727175"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        
        <!-- Fallback promotional ads -->
        <div class="ad-banner" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin: 10px 0; text-align: center;">
            <h4 style="margin: 0 0 10px 0; font-size: 1.2rem;">🚀 Premium Web Hosting</h4>
            <p style="margin: 0 0 15px 0; opacity: 0.9;">Get the best VPS hosting with 6 cores, 12GB RAM, and 200GB SSD for less than $8/month!</p>
            <a href="https://www.contabo.com/?show=vps" target="_blank" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; text-decoration: none; border-radius: 25px; display: inline-block; transition: all 0.3s ease;">
                Get Started Now
            </a>
        </div>
        
        <div class="ad-banner" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 20px; border-radius: 10px; margin: 10px 0; text-align: center;">
            <h4 style="margin: 0 0 10px 0; font-size: 1.2rem;">💼 WHMCS Automation</h4>
            <p style="margin: 0 0 15px 0; opacity: 0.9;">The #1 choice in web hosting automation, billing and helpdesk software.</p>
            <a href="https://www.whmcs.com/members/aff.php?aff=32098" target="_blank" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; text-decoration: none; border-radius: 25px; display: inline-block; transition: all 0.3s ease;">
                Learn More
            </a>
        </div>
        
        <div class="ad-banner" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 20px; border-radius: 10px; margin: 10px 0; text-align: center;">
            <h4 style="margin: 0 0 10px 0; font-size: 1.2rem;">💰 Earn $5 Per Answer</h4>
            <p style="margin: 0 0 15px 0; opacity: 0.9;">Earn money by answering questions. We pay cash. Simple and fun!</p>
            <a href="https://metroopinion.com" target="_blank" style="background: rgba(255,255,255,0.2); color: white; padding: 10px 20px; text-decoration: none; border-radius: 25px; display: inline-block; transition: all 0.3s ease;">
                Start Earning
            </a>
        </div>
    </div>
    
    <style>
    .default-ads .ad-banner:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }
    .default-ads .ad-banner a:hover {
        background: rgba(255,255,255,0.3);
        transform: translateY(-2px);
    }
    .adsense-container {
        margin: 20px 0;
        text-align: center;
    }
    </style>
HTML;
}

/**
 * Get Google Analytics code
 */
function ultimate_ad_redirect_get_ga_code( $ga_id ) {
    $ga_id = esc_attr( $ga_id );
    
    return <<<HTML
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={$ga_id}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{$ga_id}', {
            'page_title': 'Redirect Page',
            'page_location': window.location.href
        });
    </script>
HTML;
}

/**
 * Get Google Tag Manager code
 */
function ultimate_ad_redirect_get_gtm_code( $gtm_id ) {
    $gtm_id = esc_attr( $gtm_id );
    
    return <<<HTML
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{$gtm_id}');</script>
    <!-- End Google Tag Manager -->
HTML;
}

/**
 * Get Google Tag Manager noscript code
 */
function ultimate_ad_redirect_get_gtm_noscript_code( $gtm_id ) {
    $gtm_id = esc_attr( $gtm_id );
    
    return <<<HTML
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={$gtm_id}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
HTML;
}

/**
 * Get all ads HTML for countdown page
 */
function ultimate_ad_redirect_get_ads_html( $settings ) {
    $html = '';
    
    // Custom HTML ads
    if ( !empty( $settings['custom_ad_html'] ) ) {
        $html .= $settings['custom_ad_html'] . "\n";
    }
    
    // AdSense ads
    if ( !empty( $settings['adsense_client'] ) && !empty( $settings['adsense_slot'] ) ) {
        $html .= ultimate_ad_redirect_get_adsense_code( $settings ) . "\n";
    }
    
    // Default ads if no custom ads
    if ( empty( $html ) ) {
        $html .= ultimate_ad_redirect_get_default_ads();
    }
    
    return $html;
}

/**
 * Get analytics HTML for countdown page
 */
function ultimate_ad_redirect_get_analytics_html( $settings ) {
    $html = '';
    
    // Google Analytics
    if ( !empty( $settings['ga_id'] ) ) {
        $html .= ultimate_ad_redirect_get_ga_code( $settings['ga_id'] ) . "\n";
    }
    
    // Google Tag Manager
    if ( !empty( $settings['gtm_id'] ) ) {
        $html .= ultimate_ad_redirect_get_gtm_code( $settings['gtm_id'] ) . "\n";
        $html .= ultimate_ad_redirect_get_gtm_noscript_code( $settings['gtm_id'] ) . "\n";
    }
    
    return $html;
}
