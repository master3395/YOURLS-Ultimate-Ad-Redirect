<?php
/**
 * Admin Form Module for Ultimate Ad Redirect Plugin
 * Handles form generation and processing
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Generate the settings form HTML
 */
function ultimate_ad_redirect_generate_form($settings, $nonce) {
    // Prepare select options
    $adsense_format_options = '';
    $formats = array('auto' => 'Auto', 'rectangle' => 'Rectangle', 'vertical' => 'Vertical', 'horizontal' => 'Horizontal');
    foreach ($formats as $value => $label) {
        $selected = ($settings['adsense_format'] == $value) ? ' selected' : '';
        $adsense_format_options .= "<option value=\"$value\"$selected>$label</option>";
    }
    
    // Prepare theme options
    $theme_options = '';
    $themes = array('auto' => 'Auto (Follow System)', 'light' => 'Light Theme', 'dark' => 'Dark Theme');
    foreach ($themes as $value => $label) {
        $selected = ($settings['admin_theme'] == $value) ? ' selected' : '';
        $theme_options .= "<option value=\"$value\"$selected>$label</option>";
    }
    
    return <<<HTML
            <div id="settings-tab" class="tab-content active">
                <form method="post" action="plugins.php?page=ultimate_ad_redirect" class="ultimate-ad-redirect-form">
                    <input type="hidden" name="ultimate_ad_redirect_settings" value="1" />
                    <input type="hidden" name="nonce" value="$nonce" />
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row">Countdown Time (seconds)</th>
                            <td>
                                <input type="number" name="countdown_time" value="{$settings['countdown_time']}" min="3" max="60" class="regular-text" />
                                <p class="description">How long to show the countdown before redirecting (3-60 seconds)</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Redirect Message</th>
                            <td>
                                <input type="text" name="redirect_message" value="{$settings['redirect_message']}" class="regular-text" />
                                <p class="description">Message shown during countdown (e.g., "You'll be redirected in")</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Page Title</th>
                            <td>
                                <input type="text" name="page_title" value="{$settings['page_title']}" class="regular-text" />
                                <p class="description">Title shown in browser tab</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Background Color</th>
                            <td>
                                <input type="color" name="bg_color" value="{$settings['bg_color']}" />
                                <p class="description">Background color of the redirect page</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Text Color</th>
                            <td>
                                <input type="color" name="text_color" value="{$settings['text_color']}" />
                                <p class="description">Text color of the redirect page</p>
                            </td>
                        </tr>
                        
                    </table>
                    
                    <h3>Google AdSense Settings</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">AdSense Client ID</th>
                            <td>
                                <input type="text" name="adsense_client" value="{$settings['adsense_client']}" class="regular-text" placeholder="ca-pub-xxxxxxxxxxxxxxxx" />
                                <p class="description">Your Google AdSense client ID (starts with ca-pub-)</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">AdSense Slot ID</th>
                            <td>
                                <input type="text" name="adsense_slot" value="{$settings['adsense_slot']}" class="regular-text" placeholder="1234567890" />
                                <p class="description">Your Google AdSense ad slot ID</p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">AdSense Format</th>
                            <td>
                                <select name="adsense_format">
                                    $adsense_format_options
                                </select>
                                <p class="description">Ad format for mobile responsiveness</p>
                            </td>
                        </tr>
                    </table>
                    
                    <h3>Google Analytics Settings</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Google Analytics ID</th>
                            <td>
                                <input type="text" name="ga_id" value="{$settings['ga_id']}" class="regular-text" placeholder="G-XXXXXXXXXX" />
                                <p class="description">Your Google Analytics 4 measurement ID</p>
                            </td>
                        </tr>
                    </table>
                    
                    <h3>Google Tag Manager Settings</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Google Tag Manager Container ID</th>
                            <td>
                                <input type="text" name="gtm_id" value="{$settings['gtm_id']}" class="regular-text" placeholder="GTM-XXXXXXX" />
                                <p class="description">Your Google Tag Manager container ID (starts with GTM-)</p>
                            </td>
                        </tr>
                    </table>
                    
                    <h3>Custom Ad Code</h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row">Custom Ad HTML</th>
                            <td>
                                <div class="ultimate-ad-redirect-html-editor">
                                    <div class="editor-toolbar">
                                        <button type="button" onclick="insertHTML('<b>', '</b>')" class="button" title="Bold">B</button>
                                        <button type="button" onclick="insertHTML('<i>', '</i>')" class="button" title="Italic">I</button>
                                        <button type="button" onclick="insertHTML('<u>', '</u>')" class="button" title="Underline">U</button>
                                        <button type="button" onclick="insertHTML('<br>', '')" class="button" title="Line Break">BR</button>
                                        <button type="button" onclick="insertHTML('<p>', '</p>')" class="button" title="Paragraph">P</button>
                                        <button type="button" onclick="insertHTML('<div>', '</div>')" class="button" title="Div">DIV</button>
                                        <button type="button" onclick="insertHTML('<span>', '</span>')" class="button" title="Span">SPAN</button>
                                        <button type="button" onclick="insertHTML('<a href=&quot;#&quot;>', '</a>')" class="button" title="Link">A</button>
                                        <button type="button" onclick="insertHTML('<img src=&quot;#&quot; alt=&quot;&quot;>', '')" class="button" title="Image">IMG</button>
                                        <button type="button" onclick="insertHTML('<script>', '</script>')" class="button" title="Script">SCRIPT</button>
                                        <button type="button" onclick="insertHTML('<!-- ', ' -->')" class="button" title="Comment">COMMENT</button>
                                        <button type="button" onclick="insertHTML('<style>', '</style>')" class="button" title="Style">STYLE</button>
                                        <button type="button" onclick="insertHTML('<center>', '</center>')" class="button" title="Center">CENTER</button>
                                        <button type="button" onclick="insertHTML('<h1>', '</h1>')" class="button" title="Heading 1">H1</button>
                                        <button type="button" onclick="insertHTML('<h2>', '</h2>')" class="button" title="Heading 2">H2</button>
                                        <button type="button" onclick="insertHTML('<h3>', '</h3>')" class="button" title="Heading 3">H3</button>
                                        <button type="button" onclick="insertHTML('<ul><li>', '</li></ul>')" class="button" title="List">UL</button>
                                        <button type="button" onclick="insertHTML('<ol><li>', '</li></ol>')" class="button" title="Ordered List">OL</button>
                                        <button type="button" onclick="insertHTML('<table><tr><td>', '</td></tr></table>')" class="button" title="Table">TABLE</button>
                                        <button type="button" onclick="insertHTML('<form>', '</form>')" class="button" title="Form">FORM</button>
                                        <button type="button" onclick="insertHTML('<input type=&quot;text&quot; placeholder=&quot;&quot;>', '')" class="button" title="Input">INPUT</button>
                                        <button type="button" onclick="insertHTML('<button>', '</button>')" class="button" title="Button">BUTTON</button>
                                    </div>
                                    <textarea name="custom_ad_html" id="custom_ad_html" rows="8" cols="80" class="large-text" placeholder="Enter your custom HTML here...">{$settings['custom_ad_html']}</textarea>
                                    <div class="editor-info">
                                        <p class="description">Custom HTML for additional ads (will be displayed above AdSense)</p>
                                        <p class="description"><strong>Quick Tips:</strong> Use the buttons above to insert common HTML elements, or type your own HTML code directly.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    
                    <p class="submit">
                        <input type="submit" name="ultimate_ad_redirect_settings" class="button-primary" value="Save Settings" />
                    </p>
                </form>
                
                <div class="ultimate-ad-redirect-preview">
                    <h3>Preview</h3>
                    <p>Here's how your redirect page will look:</p>
                    <div class="preview-container" style="border: 1px solid #ccc; padding: 20px; background: {$settings['bg_color']}; color: {$settings['text_color']};">
                        <h2>{$settings['page_title']}</h2>
                        <p>{$settings['redirect_message']} <span id="preview-counter">{$settings['countdown_time']}</span> seconds</p>
                        <div class="preview-ads" style="margin: 20px 0; padding: 10px; background: rgba(255,255,255,0.1); border-radius: 5px;">
                            <p><em>Ad space will appear here</em></p>
                        </div>
                        <p><small>This is a preview - the actual page will have working ads and countdown</small></p>
                    </div>
                </div>
            </div>
HTML;
}

/**
 * Process form submission
 */
function ultimate_ad_redirect_process_form() {
    if( isset( $_POST['ultimate_ad_redirect_settings'] ) ) {
        echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Form processing started...</p></div>';
        
        // Check nonce
        if( !yourls_verify_nonce( 'ultimate_ad_redirect_settings' ) ) {
            echo '<div class="notice notice-error"><p><strong>DEBUG:</strong> Nonce verification failed!</p></div>';
            yourls_die( 'Security check failed' );
        }
        
        echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Nonce verified, about to update settings...</p></div>';
        
        // Process form
        ultimate_ad_redirect_update_settings();
        
        echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Settings updated, about to show success message...</p></div>';
        
        // Set a flag to show success message in main page
        $_SESSION['ultimate_ad_redirect_saved'] = true;
        
        echo '<div class="notice notice-warning"><p><strong>DEBUG:</strong> Form processing completed successfully!</p></div>';
        
        return true;
    }
    return false;
}
