<?php
/**
 * Admin Settings Module for Ultimate Ad Redirect Plugin
 * Main admin interface - streamlined and modular
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Display the admin settings page
 */
function ultimate_ad_redirect_admin_page() {
    // Process form submission
    $form_processed = ultimate_ad_redirect_process_form();
    
    // Show success message if form was processed
    if( $form_processed && isset($_SESSION['ultimate_ad_redirect_saved']) ) {
        echo '<div class="notice notice-success"><p><strong>Settings saved successfully!</strong></p></div>';
        unset($_SESSION['ultimate_ad_redirect_saved']);
    }

    // Get current settings
    $settings = ultimate_ad_redirect_get_settings();
    
    // Create nonce
    $nonce = yourls_create_nonce( 'ultimate_ad_redirect_settings' );
    
    // Prepare theme options
    $theme_options = '';
    $themes = array('auto' => 'Auto (Follow System)', 'light' => 'Light Theme', 'dark' => 'Dark Theme');
    foreach ($themes as $value => $label) {
        $selected = ($settings['admin_theme'] == $value) ? ' selected' : '';
        $theme_options .= "<option value=\"$value\"$selected>$label</option>";
    }
    
    // Generate content
    $form_content = ultimate_ad_redirect_generate_form($settings, $nonce);
    $docs_content = ultimate_ad_redirect_generate_docs_tab();
    $donation_content = ultimate_ad_redirect_generate_donation_tab();
    $styles = ultimate_ad_redirect_get_admin_styles();
    $scripts = ultimate_ad_redirect_get_admin_scripts();
    
    echo '<div class="wrap">';
    echo '<h2>Ultimate Ad Redirect Settings</h2>';
    echo '<div class="notice notice-info">';
    echo '<p><strong>Preview Mode:</strong> When you activate this plugin, you\'ll see a preview of how your redirect page will look to users. This helps you test the appearance before going live.</p>';
    echo '</div>';
    echo '<div class="ultimate-ad-redirect-controls">';
    echo '<div class="ultimate-ad-redirect-tab-nav">';
    echo '<a href="#settings-tab" class="ultimate-ad-redirect-tab ultimate-ad-redirect-tab-active" data-tab="settings">⚙️ Settings</a>';
    echo '<a href="#documentation-tab" class="ultimate-ad-redirect-tab" data-tab="documentation">📚 Documentation</a>';
    echo '<a href="#donation-tab" class="ultimate-ad-redirect-tab" data-tab="donation">💝 Donation</a>';
    echo '</div>';
    echo '<div class="ultimate-ad-redirect-theme-toggle">';
    echo '<label for="admin_theme">🎨 Admin Theme:</label>';
    echo '<select id="admin_theme" name="admin_theme" onchange="ultimateAdRedirectToggleTheme()">';
    echo $theme_options;
    echo '</select>';
    echo '</div>';
    echo '</div>';
    echo '<div class="ultimate-ad-redirect-tabs" data-theme="' . $settings['admin_theme'] . '">';
    echo $form_content;
    echo $docs_content;
    echo $donation_content;
    echo '</div>';
    echo '</div>';
    echo $styles;
    echo $scripts;
}
