<?php
/**
 * Redirect Handler Module for Ultimate Ad Redirect Plugin
 * Handles the main redirect logic and page display
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Main redirect handler function
 */
function ultimate_ad_redirect_handler( $args ) {
    $url = $args[0];
    $code = $args[1];
    
    // Debug: Log that handler is called
    error_log( 'Ultimate Ad Redirect: Handler called with URL: ' . $url . ', Code: ' . $code );
    
    // Get settings
    $settings = ultimate_ad_redirect_get_settings();
    
    // Check if we're in admin preview mode (plugin activation)
    if ( isset( $_GET['action'] ) && $_GET['action'] == 'activate' && isset( $_GET['plugin'] ) ) {
        ultimate_ad_redirect_show_preview( $settings );
        return;
    }
    
    // Show the redirect page with countdown
    ultimate_ad_redirect_show_countdown_page( $url, $settings );
}

/**
 * Show preview page for admin activation
 */
function ultimate_ad_redirect_show_preview( $settings ) {
    // Get admin URL for proper link generation
    $admin_url = yourls_admin_url();
    
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Plugin Preview - Ultimate Ad Redirect</title>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                margin: 0; 
                padding: 20px; 
                background: #f0f0f0; 
            }
            .preview-container { 
                max-width: 800px; 
                margin: 0 auto; 
                background: white; 
                padding: 30px; 
                border-radius: 10px; 
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            }
            .preview-header {
                background: #0073aa;
                color: white;
                padding: 20px;
                margin: -30px -30px 30px -30px;
                border-radius: 10px 10px 0 0;
                text-align: center;
            }
            .preview-content {
                text-align: center;
                padding: 20px;
                background: {$settings['bg_color']};
                color: {$settings['text_color']};
                border-radius: 10px;
                margin: 20px 0;
            }
            .preview-ads {
                background: rgba(255,255,255,0.1);
                padding: 20px;
                border-radius: 5px;
                margin: 20px 0;
            }
            .success-message {
                background: #d4edda;
                color: #155724;
                padding: 15px;
                border-radius: 5px;
                margin: 20px 0;
            }
        </style>
    </head>
    <body>
        <div class="preview-container">
            <div class="preview-header">
                <h1>🔧 Ultimate Ad Redirect Plugin Preview</h1>
                <p>This is how your redirect page will look to users</p>
            </div>
            
            <div class="success-message">
                <strong>✅ Plugin Activated Successfully!</strong><br>
                Your redirect page is now configured and ready to use.
            </div>
            
            <div class="preview-content">
                <h2>{$settings['page_title']}</h2>
                <p>{$settings['redirect_message']} <span id="preview-counter">{$settings['countdown_time']}</span> seconds</p>
                
                <div class="preview-ads">
                    <h3>📢 Ad Space Preview</h3>
                    <p>Your configured ads will appear here:</p>
                    <div style="background: #333; color: #fff; padding: 15px; border-radius: 5px; margin: 10px 0;">
                        <strong>Google AdSense Ad</strong><br>
                        <small>Client: {$settings['adsense_client']}</small><br>
                        <small>Slot: {$settings['adsense_slot']}</small>
                    </div>
                    <div style="background: #666; color: #fff; padding: 10px; border-radius: 5px; margin: 10px 0;">
                        <strong>Custom Ad Space</strong><br>
                        <small>Your custom HTML will be displayed here</small>
                    </div>
                </div>
                
                <p><small>This is a preview - the actual page will have working countdown and redirect functionality</small></p>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <a href="{$admin_url}plugins.php?page=ultimate_ad_redirect" class="button button-primary" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Configure Settings</a>
                <a href="{$admin_url}plugins.php" class="button" style="background: #666; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 10px;">Back to Plugins</a>
            </div>
        </div>
        
        <script>
        // Preview countdown
        let counter = {$settings['countdown_time']};
        const counterElement = document.getElementById('preview-counter');
        
        function updateCounter() {
            counterElement.textContent = counter;
            if (counter > 0) {
                counter--;
                setTimeout(updateCounter, 1000);
            } else {
                counterElement.textContent = 'Redirecting...';
            }
        }
        
        updateCounter();
        </script>
    </body>
    </html>
HTML;
    die();
}

/**
 * Show countdown page (like the working plugin)
 */
function ultimate_ad_redirect_show_countdown_page( $url, $settings ) {
    // Set refresh header like the working plugin
    header( "refresh:" . $settings['countdown_time'] . ";url=$url" );
    
    // Get ads HTML
    $ads_html = ultimate_ad_redirect_get_ads_html( $settings );
    
    // Get analytics HTML
    $analytics_html = ultimate_ad_redirect_get_analytics_html( $settings );
    
    // Very simple test - just like the working plugin
    echo "You'll be auto redirected in about ";
    
    // Simple countdown script like the working plugin
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

<!-- Start of ads -->
{$ads_html}
<!-- End of ads -->
HTML;
    
    // Die to stop normal YOURLS flow (like the working plugin)
    die();
}

/**
 * Show the actual redirect page
 */
function ultimate_ad_redirect_show_page( $url, $settings ) {
    // Set proper headers
    header( 'Content-Type: text/html; charset=UTF-8' );
    header( 'X-Robots-Tag: noindex, nofollow' );
    
    // Get ad content
    $ad_content = ultimate_ad_redirect_get_ad_content( $settings );
    
    // Track analytics
    ultimate_ad_redirect_track_redirect( $url );
    
    // Get GA code if configured
    $ga_code = $settings['ga_id'] ? ultimate_ad_redirect_get_ga_code($settings['ga_id']) : '';
    
    // Get GTM code if configured
    $gtm_code = $settings['gtm_id'] ? ultimate_ad_redirect_get_gtm_code($settings['gtm_id']) : '';
    $gtm_noscript_code = $settings['gtm_id'] ? ultimate_ad_redirect_get_gtm_noscript_code($settings['gtm_id']) : '';
    
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{$settings['page_title']}</title>
        <meta name="robots" content="noindex, nofollow">
        $gtm_code
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { 
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
                background: {$settings['bg_color']};
                color: {$settings['text_color']};
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }
            .redirect-container {
                max-width: 600px;
                width: 100%;
                text-align: center;
                background: rgba(255,255,255,0.05);
                padding: 40px 30px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                backdrop-filter: blur(10px);
            }
            .countdown-display {
                font-size: 3rem;
                font-weight: bold;
                margin: 20px 0;
                color: #ff6b6b;
                text-shadow: 0 0 20px rgba(255,107,107,0.5);
            }
            .redirect-message {
                font-size: 1.2rem;
                margin-bottom: 30px;
                opacity: 0.9;
            }
            .ad-container {
                margin: 30px 0;
                padding: 20px;
                background: rgba(255,255,255,0.1);
                border-radius: 10px;
                border: 1px solid rgba(255,255,255,0.2);
            }
            .ad-container h3 {
                margin-bottom: 15px;
                font-size: 1rem;
                opacity: 0.8;
            }
            .progress-bar {
                width: 100%;
                height: 4px;
                background: rgba(255,255,255,0.2);
                border-radius: 2px;
                overflow: hidden;
                margin: 20px 0;
            }
            .progress-fill {
                height: 100%;
                background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
                border-radius: 2px;
                transition: width 1s linear;
            }
            .skip-button {
                background: rgba(255,255,255,0.2);
                color: {$settings['text_color']};
                border: 1px solid rgba(255,255,255,0.3);
                padding: 10px 20px;
                border-radius: 25px;
                cursor: pointer;
                font-size: 0.9rem;
                transition: all 0.3s ease;
                margin-top: 20px;
            }
            .skip-button:hover {
                background: rgba(255,255,255,0.3);
                transform: translateY(-2px);
            }
            .destination-info {
                margin-top: 20px;
                padding: 15px;
                background: rgba(255,255,255,0.05);
                border-radius: 8px;
                font-size: 0.9rem;
                opacity: 0.8;
            }
            @media (max-width: 768px) {
                .redirect-container { padding: 30px 20px; }
                .countdown-display { font-size: 2.5rem; }
                .redirect-message { font-size: 1rem; }
            }
        </style>
    </head>
    <body>
        $gtm_noscript_code
        <div class="redirect-container">
            <h1>{$settings['page_title']}</h1>
            <p class="redirect-message">{$settings['redirect_message']}</p>
            
            <div class="countdown-display" id="countdown">{$settings['countdown_time']}</div>
            
            <div class="progress-bar">
                <div class="progress-fill" id="progress"></div>
            </div>
            
            <div class="ad-container">
                <h3>📢 Advertisement</h3>
                {$ad_content}
            </div>
            
            <button class="skip-button" onclick="skipRedirect()">Skip Countdown</button>
            
            <div class="destination-info">
                <p>Redirecting to: <strong id="destination-url">{$url}</strong></p>
            </div>
        </div>
        
        <script>
        let countdown = {$settings['countdown_time']};
        const countdownElement = document.getElementById('countdown');
        const progressElement = document.getElementById('progress');
        const destinationUrl = '{$url}';
        const totalTime = {$settings['countdown_time']};
        
        function updateCountdown() {
            countdownElement.textContent = countdown;
            const progress = ((totalTime - countdown) / totalTime) * 100;
            progressElement.style.width = progress + '%';
            
            if (countdown > 0) {
                countdown--;
                setTimeout(updateCountdown, 1000);
            } else {
                window.location.href = destinationUrl;
            }
        }
        
        function skipRedirect() {
            window.location.href = destinationUrl;
        }
        
        // Start countdown
        updateCountdown();
        
        // Add keyboard support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                skipRedirect();
            }
        });
        </script>
        
        $ga_code
    </body>
    </html>
HTML;
    die();
}
