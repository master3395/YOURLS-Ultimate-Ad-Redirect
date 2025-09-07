<?php
/**
 * Admin Base Styles Module for Ultimate Ad Redirect Plugin
 * Handles basic CSS styling for the admin interface
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get base admin styles CSS
 */
function ultimate_ad_redirect_get_base_styles() {
    return <<<CSS
    <style>
    /* Plugin-specific styles - ULTRA scoped to avoid ANY conflicts */
    .wrap .ultimate-ad-redirect-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        padding: 15px;
        background: #f0f0f1;
        border: 1px solid #c3c4c7;
        border-radius: 4px;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .wrap .ultimate-ad-redirect-controls .ultimate-ad-redirect-tab-nav {
        order: 1;
    }
    
    .wrap .ultimate-ad-redirect-controls .ultimate-ad-redirect-theme-toggle {
        order: 2;
    }
    
    .wrap .ultimate-ad-redirect-theme-toggle {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .wrap .ultimate-ad-redirect-theme-toggle label {
        font-weight: 600;
        margin: 0;
    }
    
    .wrap .ultimate-ad-redirect-tab-nav {
        display: flex;
        gap: 5px;
    }
    
    .wrap .ultimate-ad-redirect-tab {
        background: #f6f7f7;
        border: 1px solid #c3c4c7;
        color: #50575e;
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px 4px 0 0;
        font-size: 14px;
        transition: all 0.2s ease;
    }
    
    .wrap .ultimate-ad-redirect-tab:hover {
        background: #f0f0f1;
        color: #1d2327;
        text-decoration: none;
    }
    
    .wrap .ultimate-ad-redirect-tab-active {
        background: #fff;
        color: #1d2327;
        font-weight: 600;
        border-bottom: 2px solid #2271b1;
    }
    
    .wrap .ultimate-ad-redirect-form .form-table th {
        width: 200px;
    }
    
    .wrap .ultimate-ad-redirect-preview {
        margin-top: 30px;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 5px;
    }
    
    .wrap .preview-container {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
    }
    
    /* Tab content styles - completely isolated */
    .wrap .ultimate-ad-redirect-tabs {
        margin-top: 0;
        border: 1px solid #c3c4c7;
        border-radius: 0 4px 4px 4px;
        overflow: hidden;
        background: #fff;
    }
    
    .wrap .ultimate-ad-redirect-tabs .tab-content {
        display: none;
        padding: 20px;
        background: #fff;
        min-height: 400px;
    }
    
    .wrap .ultimate-ad-redirect-tabs .tab-content.active {
        display: block;
    }
    
    /* Documentation Styles - ULTRA scoped */
    .wrap .ultimate-ad-redirect-docs {
        max-width: 1200px;
    }
    
    .wrap .docs-section {
        margin: 30px 0;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 8px;
        border-left: 4px solid #0073aa;
    }
    
    .wrap .docs-section h3 {
        margin-top: 0;
        color: #0073aa;
    }
    
    .wrap .docs-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    
    .wrap .docs-item {
        background: white;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .wrap .docs-item h4 {
        margin-top: 0;
        color: #333;
    }
    
    .wrap .docs-item p {
        margin: 8px 0;
    }
    
    .wrap .docs-item a {
        color: #0073aa;
        text-decoration: none;
        font-weight: bold;
    }
    
    .wrap .docs-item a:hover {
        text-decoration: underline;
    }
    
    .wrap .docs-section ol {
        padding-left: 20px;
    }
    
    .wrap .docs-section ol li {
        margin: 10px 0;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .wrap .ultimate-ad-redirect-controls {
            flex-direction: column;
            align-items: stretch;
        }
        
        .wrap .ultimate-ad-redirect-tab-nav {
            justify-content: center;
        }
    }
    
    /* HTML Editor styling */
    .wrap .ultimate-ad-redirect-html-editor {
        width: 100%;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar {
        margin-bottom: 15px;
        padding: 15px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px solid #dee2e6;
        border-radius: 8px 8px 0 0;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button {
        margin: 0;
        padding: 8px 12px;
        font-size: 11px;
        font-weight: 600;
        min-width: 40px;
        height: 32px;
        border: 2px solid #ced4da;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        color: #495057;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        transition: left 0.5s;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button:hover {
        background: linear-gradient(135deg, #0073aa 0%, #0056b3 100%);
        color: #ffffff;
        border-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,115,170,0.3);
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button:hover::before {
        left: 100%;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button:active {
        background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0,115,170,0.4);
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-toolbar .button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(0,115,170,0.25);
    }
    
    .wrap .ultimate-ad-redirect-html-editor #custom_ad_html {
        border-radius: 0 0 8px 8px;
        border: 2px solid #dee2e6;
        border-top: none;
        font-family: 'Fira Code', 'Courier New', monospace;
        font-size: 14px;
        line-height: 1.6;
        resize: vertical;
        min-height: 250px;
        padding: 15px;
        background: #ffffff;
        color: #2c3e50;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .wrap .ultimate-ad-redirect-html-editor #custom_ad_html:focus {
        outline: none;
        border-color: #0073aa;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.1), 0 0 0 3px rgba(0,115,170,0.25);
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-info {
        margin-top: 12px;
        padding: 12px 16px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px solid #dee2e6;
        border-radius: 0 0 8px 8px;
        border-top: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-info .description {
        margin: 0 0 8px 0;
        font-size: 13px;
        color: #6c757d;
        line-height: 1.5;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-info .description:last-child {
        margin-bottom: 0;
    }
    
    .wrap .ultimate-ad-redirect-html-editor .editor-info .description strong {
        color: #495057;
        font-weight: 600;
    }
    </style>
CSS;
}
