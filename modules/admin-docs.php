<?php
/**
 * Admin Documentation Module for Ultimate Ad Redirect Plugin
 * Handles documentation and donation tabs content
 */

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

/**
 * Generate documentation tab content
 */
function ultimate_ad_redirect_generate_docs_tab() {
    return <<<HTML
            <div id="documentation-tab" class="tab-content">
                <div class="ultimate-ad-redirect-docs">
                    <div class="docs-section">
                        <h3>🚀 Quick Start Guide</h3>
                        <ol>
                            <li><strong>Set up Google AdSense:</strong> <a href="https://www.google.com/adsense/" target="_blank">Create an account</a> and get your Publisher ID</li>
                            <li><strong>Configure Google Analytics:</strong> <a href="https://analytics.google.com/" target="_blank">Set up GA4</a> and get your Measurement ID</li>
                            <li><strong>Optional - Google Tag Manager:</strong> <a href="https://tagmanager.google.com/" target="_blank">Set up GTM</a> for advanced tracking</li>
                            <li><strong>Customize appearance:</strong> Choose colors, countdown time, and messages</li>
                            <li><strong>Test your setup:</strong> Visit any of your short URLs to see the redirect page</li>
                        </ol>
                    </div>

                    <div class="docs-section">
                        <h3>💰 Google AdSense Resources</h3>
                        <div class="docs-grid">
                            <div class="docs-item">
                                <h4>📊 Main Dashboard</h4>
                                <p><a href="https://www.google.com/adsense/" target="_blank">Google AdSense Dashboard</a></p>
                                <p>Sign in to your AdSense account and manage your ads</p>
                            </div>
                            <div class="docs-item">
                                <h4>🔑 Find Publisher ID</h4>
                                <p><a href="https://support.google.com/adsense/answer/105516" target="_blank">How to find your Publisher ID</a></p>
                                <p>Step-by-step guide to locate your AdSense client ID</p>
                            </div>
                            <div class="docs-item">
                                <h4>🎯 Create Ad Units</h4>
                                <p><a href="https://support.google.com/adsense/answer/6002585" target="_blank">How to create ad units</a></p>
                                <p>Learn how to create and configure ad units for your site</p>
                            </div>
                            <div class="docs-item">
                                <h4>📱 Ad Formats</h4>
                                <p><a href="https://support.google.com/adsense/answer/6002585" target="_blank">Ad formats explained</a></p>
                                <p>Understanding different ad formats and when to use them</p>
                            </div>
                        </div>
                    </div>

                    <div class="docs-section">
                        <h3>📈 Google Analytics Resources</h3>
                        <div class="docs-grid">
                            <div class="docs-item">
                                <h4>📊 GA4 Dashboard</h4>
                                <p><a href="https://analytics.google.com/" target="_blank">Google Analytics 4</a></p>
                                <p>Access your GA4 property and view analytics data</p>
                            </div>
                            <div class="docs-item">
                                <h4>🔑 Find Measurement ID</h4>
                                <p><a href="https://support.google.com/analytics/answer/9539598" target="_blank">How to find your Measurement ID</a></p>
                                <p>Step-by-step guide to locate your GA4 measurement ID</p>
                            </div>
                            <div class="docs-item">
                                <h4>⚙️ Set up GA4</h4>
                                <p><a href="https://support.google.com/analytics/answer/9304153" target="_blank">GA4 setup guide</a></p>
                                <p>Complete guide to setting up Google Analytics 4</p>
                            </div>
                            <div class="docs-item">
                                <h4>📊 Understanding Reports</h4>
                                <p><a href="https://support.google.com/analytics/answer/9304153" target="_blank">GA4 reports guide</a></p>
                                <p>Learn how to read and understand your analytics data</p>
                            </div>
                        </div>
                    </div>

                    <div class="docs-section">
                        <h3>🏷️ Google Tag Manager Resources</h3>
                        <div class="docs-grid">
                            <div class="docs-item">
                                <h4>📊 GTM Dashboard</h4>
                                <p><a href="https://tagmanager.google.com/" target="_blank">Google Tag Manager</a></p>
                                <p>Access your GTM container and manage tags</p>
                            </div>
                            <div class="docs-item">
                                <h4>🔑 Find Container ID</h4>
                                <p><a href="https://support.google.com/tagmanager/answer/6103696" target="_blank">How to find your Container ID</a></p>
                                <p>Step-by-step guide to locate your GTM container ID</p>
                            </div>
                            <div class="docs-item">
                                <h4>⚙️ Set up GTM</h4>
                                <p><a href="https://support.google.com/tagmanager/answer/6103696" target="_blank">GTM setup guide</a></p>
                                <p>Complete guide to setting up Google Tag Manager</p>
                            </div>
                            <div class="docs-item">
                                <h4>🏷️ Understanding Tags</h4>
                                <p><a href="https://support.google.com/tagmanager/answer/6103696" target="_blank">GTM tags guide</a></p>
                                <p>Learn how to create and manage tags in GTM</p>
                            </div>
                        </div>
                    </div>

                    <div class="docs-section">
                        <h3>🆘 Support & Community</h3>
                        <div class="docs-grid">
                            <div class="docs-item">
                                <h4>💬 Discord Support</h4>
                                <p><a href="https://discord.gg/nx9Kzrk" target="_blank">Join our Discord server</a></p>
                                <p>Get help from the community and developers</p>
                            </div>
                            <div class="docs-item">
                                <h4>🐛 Report Issues</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues" target="_blank">GitHub Issues</a></p>
                                <p>Report bugs and request new features</p>
                            </div>
                            <div class="docs-item">
                                <h4>🔧 Contribute</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/pulls" target="_blank">GitHub Pull Requests</a></p>
                                <p>Submit code improvements and new features</p>
                            </div>
                            <div class="docs-item">
                                <h4>📖 Documentation</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect" target="_blank">GitHub Repository</a></p>
                                <p>View source code and detailed documentation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
HTML;
}

/**
 * Generate donation tab content
 */
function ultimate_ad_redirect_generate_donation_tab() {
    return <<<HTML
            <div id="donation-tab" class="tab-content">
                <div class="ultimate-ad-redirect-docs">
                    <div class="docs-section">
                        <h3>💝 Support This Plugin</h3>
                        <p>If you find this plugin helpful and would like to support its development, please consider making a donation. Your support helps us continue improving the plugin and adding new features!</p>
                    </div>

                    <div class="docs-grid">
                        <div class="docs-item">
                            <h4>💳 PayPal Donation</h4>
                            <p><a href="https://www.paypal.me/kimBS/" target="_blank">Donate with PayPal</a></p>
                            <p>Support via PayPal - secure and easy</p>
                        </div>
                        <div class="docs-item">
                            <h4>💳 Stripe Donation</h4>
                            <p><a href="https://donate.stripe.com/fZu3cv4YHddL4Li5MIdAk00" target="_blank">Donate with Stripe</a></p>
                            <p>Support via Stripe - modern payment processing</p>
                        </div>
                    </div>

                    <div class="docs-section">
                        <h3>🙏 Thank You!</h3>
                        <p>Your support means the world to us! Every donation, no matter the size, helps us:</p>
                        <ul>
                            <li>🐛 Fix bugs and improve stability</li>
                            <li>⭐ Add new features and enhancements</li>
                            <li>📱 Improve mobile compatibility</li>
                            <li>🔒 Enhance security features</li>
                            <li>📚 Create better documentation</li>
                            <li>⚡ Optimize performance</li>
                        </ul>
                    </div>

                    <div class="docs-section">
                        <h3>🆘 Other Ways to Support</h3>
                        <div class="docs-grid">
                            <div class="docs-item">
                                <h4>⭐ Star the Project</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect" target="_blank">Star on GitHub</a></p>
                                <p>Show your appreciation by starring the repository</p>
                            </div>
                            <div class="docs-item">
                                <h4>🐛 Report Issues</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues" target="_blank">GitHub Issues</a></p>
                                <p>Help us improve by reporting bugs and suggesting features</p>
                            </div>
                            <div class="docs-item">
                                <h4>🔧 Contribute Code</h4>
                                <p><a href="https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/pulls" target="_blank">GitHub Pull Requests</a></p>
                                <p>Submit code improvements and new features</p>
                            </div>
                            <div class="docs-item">
                                <h4>💬 Join Community</h4>
                                <p><a href="https://discord.gg/nx9Kzrk" target="_blank">Discord Server</a></p>
                                <p>Connect with other users and get support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
HTML;
}
