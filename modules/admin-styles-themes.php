<?php
/**
 * Admin Theme Styles Module for Ultimate Ad Redirect Plugin
 * Handles theme-specific CSS styling for the admin interface
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get theme-specific admin styles CSS
 */
function ultimate_ad_redirect_get_theme_styles() {
    return <<<CSS
    <style>
    /* Light theme styling */
    .wrap .ultimate-ad-redirect-controls[data-theme="light"] {
        background: #f0f0f1 !important;
        border-color: #c3c4c7 !important;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="light"] .ultimate-ad-redirect-theme-toggle label {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="light"] .ultimate-ad-redirect-tab {
        background: #f6f7f7;
        color: #1d2327;
        border-color: #c3c4c7;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="light"] .ultimate-ad-redirect-tab:hover {
        background: #f0f0f1;
        color: #1d2327;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="light"] .ultimate-ad-redirect-tab-active {
        background: #fff;
        color: #1d2327;
        border-bottom-color: #2271b1;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-preview {
        background: #f9f9f9 !important;
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-preview h3 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-preview p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .preview-container {
        background: #fff !important;
        color: #1d2327 !important;
        border: 1px solid #ddd !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .preview-container h2 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .preview-container p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .preview-container small {
        color: #50575e !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .preview-ads {
        background: #f0f0f1 !important;
        color: #1d2327 !important;
        border: 1px solid #c3c4c7 !important;
    }
    
    /* Light theme form styling */
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .form-table th,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .form-table td {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] input[type="text"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] input[type="number"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] input[type="color"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] select,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] textarea {
        background: #fff !important;
        color: #1d2327 !important;
        border-color: #8c8f94 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .description {
        color: #50575e !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] h3 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] label {
        color: #1d2327 !important;
    }
    
    /* Light theme content styling for documentation and donation tabs */
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-docs h3,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-docs h4,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-docs p,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-docs li,
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .ultimate-ad-redirect-docs a {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .docs-section {
        background: #f9f9f9 !important;
        color: #1d2327 !important;
        border-left-color: #0073aa !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .docs-item {
        background: white !important;
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .docs-item h4 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="light"] .docs-item a {
        color: #0073aa !important;
    }
    
    /* Dark theme styling */
    .wrap .ultimate-ad-redirect-controls[data-theme="dark"] {
        background: #2c2c2c;
        border-color: #444;
        color: #e0e0e0;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="dark"] .ultimate-ad-redirect-theme-toggle label {
        color: #e0e0e0 !important;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="dark"] .ultimate-ad-redirect-tab {
        background: #3c3c3c;
        color: #e0e0e0;
        border-color: #555;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="dark"] .ultimate-ad-redirect-tab:hover {
        background: #4c4c4c;
        color: #fff;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="dark"] .ultimate-ad-redirect-tab-active {
        background: #1e1e1e;
        color: #fff;
        border-bottom-color: #4a9eff;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] {
        background: #1e1e1e;
        border-color: #444;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .tab-content {
        background: #1e1e1e;
        color: #e0e0e0;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-preview {
        background: #2c2c2c;
        color: #e0e0e0;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .preview-container {
        background: #1e1e1e;
        color: #e0e0e0;
        border: 1px solid #444;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .preview-container h2,
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .preview-container p,
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .preview-container small {
        color: #e0e0e0;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .preview-ads {
        background: rgba(255,255,255,0.1) !important;
        color: #e0e0e0 !important;
        border: 1px solid #555 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .docs-section {
        background: #2c2c2c;
        color: #e0e0e0;
        border-left-color: #4a9eff;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .docs-section h3 {
        color: #4a9eff;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .docs-item {
        background: #3c3c3c;
        color: #e0e0e0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .docs-item h4 {
        color: #fff;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .docs-item a {
        color: #4a9eff;
    }
    
    /* Dark theme form styling */
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .form-table th,
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .form-table td {
        color: #e0e0e0;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] input[type="text"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] input[type="number"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] input[type="color"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] select,
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] textarea {
        background: #3c3c3c;
        color: #e0e0e0;
        border-color: #555;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .description {
        color: #b0b0b0;
    }
    
    /* HTML Editor Dark Theme */
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-toolbar {
        background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 100%) !important;
        border-color: #444 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-toolbar .button {
        background: linear-gradient(135deg, #3c3c3c 0%, #2c2c2c 100%) !important;
        color: #e9ecef !important;
        border-color: #555 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-toolbar .button:hover {
        background: linear-gradient(135deg, #0073aa 0%, #0056b3 100%) !important;
        color: #ffffff !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 8px rgba(0,115,170,0.4) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-toolbar .button:active {
        background: linear-gradient(135deg, #0056b3 0%, #004085 100%) !important;
        transform: translateY(0) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-toolbar .button:focus {
        box-shadow: 0 0 0 3px rgba(0,115,170,0.4) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor #custom_ad_html {
        background: #1a1a1a !important;
        color: #e9ecef !important;
        border-color: #444 !important;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.3) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor #custom_ad_html:focus {
        border-color: #0073aa !important;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.3), 0 0 0 3px rgba(0,115,170,0.4) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-info {
        background: linear-gradient(135deg, #2c2c2c 0%, #1a1a1a 100%) !important;
        border-color: #444 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3) !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-info .description {
        color: #adb5bd !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="dark"] .ultimate-ad-redirect-html-editor .editor-info .description strong {
        color: #e9ecef !important;
    }
    </style>
CSS;
}
