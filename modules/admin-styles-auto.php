<?php
/**
 * Admin Auto Theme Styles Module for Ultimate Ad Redirect Plugin
 * Handles auto theme and responsive CSS styling for the admin interface
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get auto theme admin styles CSS
 */
function ultimate_ad_redirect_get_auto_theme_styles() {
    return <<<CSS
    <style>
    /* Auto theme styling */
    .wrap .ultimate-ad-redirect-controls[data-theme="auto"] {
        background: #f0f0f1 !important;
        border-color: #c3c4c7 !important;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-theme-toggle label {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab {
        background: #f6f7f7;
        color: #1d2327;
        border-color: #c3c4c7;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab:hover {
        background: #f0f0f1;
        color: #1d2327;
    }
    
    .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab-active {
        background: #fff;
        color: #1d2327;
        border-bottom-color: #2271b1;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview {
        background: #f9f9f9 !important;
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview h3 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container {
        background: #fff !important;
        color: #1d2327 !important;
        border: 1px solid #ddd !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container h2 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container small {
        color: #50575e !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-ads {
        background: #f0f0f1 !important;
        color: #1d2327 !important;
        border: 1px solid #c3c4c7 !important;
    }
    
    /* Auto theme form styling */
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .form-table th,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .form-table td {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="text"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="number"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="color"],
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] select,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] textarea {
        background: #fff !important;
        color: #1d2327 !important;
        border-color: #8c8f94 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .description {
        color: #50575e !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] h3 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] p {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] label {
        color: #1d2327 !important;
    }
    
    /* Auto theme content styling for documentation and donation tabs */
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs h3,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs h4,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs p,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs li,
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs a {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-section {
        background: #f9f9f9 !important;
        color: #1d2327 !important;
        border-left-color: #0073aa !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item {
        background: white !important;
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item h4 {
        color: #1d2327 !important;
    }
    
    .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item a {
        color: #0073aa !important;
    }
    
    /* Auto theme dark mode detection */
    @media (prefers-color-scheme: dark) {
        .wrap .ultimate-ad-redirect-controls[data-theme="auto"] {
            background: #2c2c2c !important;
            border-color: #555 !important;
        }
        
        .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-theme-toggle label {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab {
            background: #3c3c3c;
            color: #e0e0e0;
            border-color: #555;
        }
        
        .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab:hover {
            background: #4c4c4c;
            color: #fff;
        }
        
        .wrap .ultimate-ad-redirect-controls[data-theme="auto"] .ultimate-ad-redirect-tab-active {
            background: #1e1e1e;
            color: #fff;
            border-bottom-color: #4a9eff;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .form-table th,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .form-table td {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="text"],
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="number"],
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] input[type="color"],
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] select,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] textarea {
            background: #3c3c3c !important;
            color: #e0e0e0 !important;
            border-color: #555 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .description {
            color: #b0b0b0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] h3 {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] p {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] label {
            color: #e0e0e0 !important;
        }
        
        /* Auto theme dark mode content styling for documentation and donation tabs */
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs h3,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs h4,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs p,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs li,
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-docs a {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-section {
            background: #2c2c2c !important;
            color: #e0e0e0 !important;
            border-left-color: #4a9eff !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item {
            background: #3c3c3c !important;
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item h4 {
            color: #fff !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .docs-item a {
            color: #4a9eff !important;
        }
        
        /* Auto theme dark mode preview styling */
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview {
            background: #2c2c2c !important;
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview h3 {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .ultimate-ad-redirect-preview p {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container {
            background: #1e1e1e !important;
            color: #e0e0e0 !important;
            border: 1px solid #444 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container h2 {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container p {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-container small {
            color: #e0e0e0 !important;
        }
        
        .wrap .ultimate-ad-redirect-tabs[data-theme="auto"] .preview-ads {
            background: rgba(255,255,255,0.1) !important;
            color: #e0e0e0 !important;
            border: 1px solid #555 !important;
        }
    }
    </style>
CSS;
}
