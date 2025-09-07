# Ultimate Ad Redirect Plugin for YOURLS

**Version:** 2.0  
**Author:** Master3395  
**License:** MIT  
**Repository:** [GitHub - YOURLS-Ultimate-Ad-Redirect](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect)  
**Author Website:** [newstargeted.com](https://newstargeted.com/)

The most advanced and feature-rich redirect plugin for YOURLS with customizable ads, countdown timer, and comprehensive analytics.

## 🚀 Features

### Core Functionality
- **Smart Redirect Logic**: Only redirects on actual short URL visits, not admin activation
- **Preview Mode**: Shows preview when activating plugin in admin
- **Customizable Countdown**: 3-60 second countdown timer
- **Mobile-First Design**: Fully responsive and mobile-optimized
- **SEO Friendly**: Proper meta tags and robots directives

### Advertisement Management
- **Pre-configured AdSense**: Comes with default AdSense settings ready to use
- **Google AdSense Integration**: Full AdSense support with customizable slots
- **Google Tag Manager**: Complete GTM integration for advanced tracking
- **Custom Ad HTML**: Add your own custom ad code
- **Default Ad Fallback**: Beautiful default ads when no custom ads configured
- **Multiple Ad Formats**: Support for auto, rectangle, vertical, and horizontal formats
- **Helpful Links**: Direct links to get AdSense IDs, create ad units, and more

### Analytics & Tracking
- **Google Analytics 4**: Full GA4 integration
- **Google Tag Manager**: Advanced tracking and tag management
- **Redirect Logging**: Detailed logs of all redirects
- **IP Tracking**: Track unique visitors
- **Referrer Analysis**: See where your traffic comes from
- **Real-time Stats**: View statistics in admin panel

### Admin Interface
- **Tabbed Interface**: Clean settings tab, comprehensive documentation tab, and donation tab
- **Theme Toggler**: Switch between light, dark, and auto themes
- **Live Preview**: See how your redirect page will look
- **Color Customization**: Customize background and text colors
- **Message Customization**: Customize countdown messages
- **Donation Support**: Support plugin development with PayPal or Stripe
- **Security Features**: Input validation and sanitization

## 📁 File Structure

```
Ultimate-Ad-Redirect/
├── plugin.php                 # Main plugin file (40 lines)
├── modules/
│   ├── admin-settings.php     # Admin settings and configuration (518 lines)
│   ├── redirect-handler.php   # Main redirect logic (334 lines)
│   ├── ad-manager.php         # Advertisement management (153 lines)
│   └── analytics.php          # Analytics and tracking (200 lines)
├── logs/
│   └── redirects.log          # Redirect tracking log
└── README.md                  # This file
```

## 🛠️ Installation

1. Upload the plugin folder to `/user/plugins/`
2. Activate the plugin in your YOURLS admin panel
3. Configure your settings in the "Ultimate Ad Redirect" admin page
4. Test with a short URL

## ⚙️ Configuration

### Admin Interface
- **Unified Controls**: Tab navigation and theme toggler in one clean row
- **Settings Tab**: Configure all plugin settings with clean interface
- **Documentation Tab**: Access all helpful links and setup guides
- **Donation Tab**: Support the plugin development with PayPal or Stripe
- **Theme Toggler**: Switch between light, dark, and auto themes for better readability
- **Navbar Safe**: Completely isolated from YOURLS navigation

### Basic Settings
- **Countdown Time**: Set how long to show the countdown (3-60 seconds)
- **Redirect Message**: Customize the countdown message
- **Page Title**: Set the browser tab title
- **Colors**: Customize background and text colors
- **Admin Theme**: Choose light, dark, or auto theme for the admin interface

### Google AdSense
- **Pre-configured**: Plugin comes with default AdSense settings ready to use
- **Client ID**: Your AdSense client ID (ca-pub-xxxxxxxxxxxxxxxx)
- **Slot ID**: Your AdSense ad slot ID
- **Format**: Choose ad format (auto, rectangle, vertical, horizontal)

### Google Analytics
- **GA4 ID**: Your Google Analytics 4 measurement ID (G-XXXXXXXXXX)

### Google Tag Manager
- **GTM Container ID**: Your Google Tag Manager container ID (GTM-XXXXXXX)

### Custom Ads
- **Custom HTML**: Add your own custom ad code

## 🔒 Security Features

- **Input Validation**: All user inputs are validated and sanitized
- **XSS Protection**: Output is properly escaped
- **CSRF Protection**: Nonce verification for all forms
- **SQL Injection Prevention**: Proper data sanitization
- **File Permission Security**: Logs directory has proper permissions

## 📊 Analytics

The plugin tracks:
- Total redirects
- Unique IP addresses
- Top referrers
- Recent redirect activity
- User agent information

View analytics in the admin panel under "Ultimate Ad Redirect" settings.

## 🎨 Customization

### Styling
The redirect page uses modern CSS with:
- Gradient backgrounds
- Smooth animations
- Mobile-responsive design
- Custom color schemes
- Progress bars
- Hover effects

### JavaScript Features
- Smooth countdown animation
- Progress bar animation
- Skip button functionality
- Keyboard support (Enter/Space to skip)
- Mobile touch support

## 🐛 Troubleshooting

### Plugin Not Working
1. Check that the plugin is activated
2. Verify your settings are configured
3. Check the logs directory for error messages
4. Ensure file permissions are correct

### Ads Not Showing
1. Verify your AdSense client ID and slot ID
2. Check that your AdSense account is approved
3. Ensure custom HTML is valid
4. Check browser console for JavaScript errors

### Analytics Not Tracking
1. Verify your Google Analytics ID is correct
2. Check that GA4 is properly configured
3. Ensure the tracking code is loading
4. Check browser network tab for requests

## 📝 Changelog

### Version 2.0
- Complete rewrite with modular architecture
- Added comprehensive admin settings with tabbed interface
- Integrated Google AdSense and Analytics
- Added Google Tag Manager support
- Added mobile-first responsive design
- Implemented security features
- Added analytics and logging
- Created preview mode for admin activation
- Added helpful documentation tab with all resources

### Version 1.5 (Previous)
- Basic redirect functionality
- Simple countdown timer
- Basic ad display

## 👨‍💻 Author

**Master3395**
- Website: https://newstargeted.com/
- Email: info@newstargeted.com
- Discord: https://discord.gg/nx9Kzrk
- GitHub: https://github.com/master3395

## 📄 License

MIT License - Feel free to modify and distribute.

## 🤝 Support

For support, feature requests, or bug reports:
1. Check the troubleshooting section above
2. Review the logs in the `/logs/` directory
3. Contact the author via email or GitHub

---

**Note**: This plugin is designed to be the ultimate YOURLS redirect solution with enterprise-level features while maintaining ease of use for beginners.