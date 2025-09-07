<?php
/**
 * Admin Scripts Module for Ultimate Ad Redirect Plugin
 * Handles all JavaScript functionality for the admin interface
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Get admin scripts JavaScript
 */
function ultimate_ad_redirect_get_admin_scripts() {
    return <<<JS
    <script>
    // Global theme toggle function - accessible from HTML onchange
    window.ultimateAdRedirectToggleTheme = function() {
        var theme = document.getElementById('admin_theme').value;
        var tabsContainer = document.querySelector('.ultimate-ad-redirect-tabs');
        var controlsContainer = document.querySelector('.ultimate-ad-redirect-controls');
        
        if (theme === 'auto') {
            // Auto theme - detect system preference
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                tabsContainer.setAttribute('data-theme', 'dark');
                controlsContainer.setAttribute('data-theme', 'dark');
            } else {
                tabsContainer.setAttribute('data-theme', 'light');
                controlsContainer.setAttribute('data-theme', 'light');
            }
        } else {
            tabsContainer.setAttribute('data-theme', theme);
            controlsContainer.setAttribute('data-theme', theme);
        }
        
        // Force refresh of form elements to apply new theme
        var formElements = tabsContainer.querySelectorAll('input, select, textarea');
        formElements.forEach(function(element) {
            element.style.display = 'none';
            element.offsetHeight; // Trigger reflow
            element.style.display = '';
        });
        
        // Save theme preference
        localStorage.setItem('ultimate_ad_redirect_theme', theme);
    };
    
                // Also declare as regular function for compatibility
                function ultimateAdRedirectToggleTheme() {
                    return window.ultimateAdRedirectToggleTheme();
                }
                
                // HTML Editor functions
                window.insertHTML = function(startTag, endTag) {
                    var textarea = document.getElementById('custom_ad_html');
                    if (!textarea) return;
                    
                    var start = textarea.selectionStart;
                    var end = textarea.selectionEnd;
                    var selectedText = textarea.value.substring(start, end);
                    var replacement = startTag + selectedText + endTag;
                    
                    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
                    
                    // Set cursor position after the inserted content
                    var newCursorPos = start + startTag.length + selectedText.length;
                    textarea.setSelectionRange(newCursorPos, newCursorPos);
                    textarea.focus();
                };
    
    jQuery(document).ready(function($) {
        // Initialize theme on page load
        var savedTheme = localStorage.getItem('ultimate_ad_redirect_theme');
        if (savedTheme) {
            $('#admin_theme').val(savedTheme);
            ultimateAdRedirectToggleTheme();
        }
        
        // Tab functionality - ULTRA scoped to plugin only
        $('.ultimate-ad-redirect-tab').on('click', function(e) {
            e.preventDefault();
            
            // Don't interfere with form submission
            if ($(e.target).is('input[type="submit"]') || $(e.target).closest('form').length > 0) {
                return true;
            }
            
            // Remove active class from all tabs and content within plugin
            $('.ultimate-ad-redirect-tab').removeClass('ultimate-ad-redirect-tab-active');
            $('.ultimate-ad-redirect-tabs .tab-content').removeClass('active');
            
            // Add active class to clicked tab
            $(this).addClass('ultimate-ad-redirect-tab-active');
            
            // Show corresponding content
            var targetTab = $(this).data('tab');
            $('.ultimate-ad-redirect-tabs #' + targetTab + '-tab').addClass('active');
        });
        
        // Listen for system theme changes
        if (window.matchMedia) {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
                if ($('#admin_theme').val() === 'auto') {
                    ultimateAdRedirectToggleTheme();
                }
            });
        }
    });
    </script>
JS;
}
