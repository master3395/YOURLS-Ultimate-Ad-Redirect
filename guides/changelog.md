# Changelog

All notable changes to Ultimate Ad Redirect plugin.

## [2.0] - 2025

### 🎉 Major Release - Complete Rewrite

#### Added

- **Modular Architecture**: Split into 13 separate modules for better organization
- **Comprehensive Admin Interface**: Tabbed interface with Settings, Documentation, and Donation tabs
- **Google AdSense Integration**: Full support with customizable ad formats
- **Google Analytics 4**: Complete GA4 integration for tracking
- **Google Tag Manager**: GTM support for advanced tracking
- **Custom Ad HTML**: Built-in HTML editor with formatting buttons
- **Live Preview Mode**: Real-time preview of redirect page
- **Theme Support**: Light, Dark, and Auto themes for admin interface
- **Color Customization**: Custom background and text colors
- **Analytics Dashboard**: View stats directly in admin panel
- **Redirect Logging**: Detailed logs of all redirects with IP, referrer, and user agent
- **Security Features**: XSS protection, CSRF protection, input validation
- **Mobile-First Design**: Fully responsive and optimized for mobile devices
- **Documentation Tab**: Helpful links to AdSense, Analytics, and setup guides
- **Donation Tab**: Support plugin development via PayPal or Stripe
- **Default Ad Fallback**: Beautiful default ads when no custom ads configured
- **Progress Bar**: Visual countdown progress indicator
- **Skip Button**: Allow users to skip countdown
- **Keyboard Support**: Enter/Space to skip countdown
- **SEO Meta Tags**: Proper meta tags and robots directives

#### Changed

- **Complete Code Rewrite**: From ground up with modern PHP practices
- **Settings Storage**: Improved settings management and validation
- **Admin Interface**: Complete redesign with modern UI/UX
- **Code Organization**: Modular structure (was single file, now 13 modules)
- **Performance**: Optimized for faster loading and better efficiency
- **Security**: Enhanced security with multiple protection layers

#### Improved

- **User Experience**: Better countdown display and interaction
- **Admin Experience**: More intuitive settings interface
- **Code Maintainability**: Easier to maintain and extend
- **Documentation**: Comprehensive inline documentation
- **Error Handling**: Better error messages and logging
- **Compatibility**: Tested with latest YOURLS and PHP versions

#### Technical Details

- **File Structure**:

  ```
  plugin.php (40 lines, main plugin file)
  modules/
    ├── admin-settings.php (71 lines)
    ├── redirect-handler.php (393 lines)
    ├── ad-manager.php (216 lines)
    ├── analytics.php (187 lines)
    ├── admin-form.php (220 lines)
    ├── admin-docs.php (203 lines)
    ├── admin-scripts.php (112 lines)
    ├── admin-styles.php (24 lines)
    ├── admin-styles-base.php (309 lines)
    ├── admin-styles-themes.php (303 lines)
    ├── admin-styles-auto.php (268 lines)
    ├── admin-settings-functions.php (162 lines)
    └── admin-settings-functions-old.php (151 lines, deprecated)
  ```
- **Code Reduction**: 81% file reduction (16 files → 3 functional files + modules)
- **Lines of Code**: ~2,500 lines (well-organized in modules)
- **Modules**: 13 separate modules for maintainability

#### Dependencies

- **YOURLS**: 1.10.0+ (tested with 1.10.2)
- **PHP**: 7.4+ (recommended: 8.0+)
- **Web Servers**: Apache, Nginx, OpenLiteSpeed

#### Testing

- Tested on AlmaLinux 8.8, 9.6, and 10
- Tested with OpenLiteSpeed and LiteSpeed Enterprise
- Cross-browser tested (Chrome, Firefox, Safari, Edge)
- Mobile tested (iOS, Android)

---

## [1.5] - Previous Version

### Features

- Basic redirect functionality
- Simple countdown timer
- Basic ad display
- Minimal configuration options

### Limitations

- Single file architecture
- Limited customization
- No analytics
- No mobile optimization
- No theme support
- Basic security
- Limited documentation

---

## Migration from 1.x to 2.0

### Automatic Migration

- Settings are preserved during upgrade
- No manual configuration needed
- Database schema automatically updated

### What's New in 2.0

- 13 new features
- Complete UI redesign
- Advanced analytics
- Better security
- Mobile optimization
- Theme support
- Live preview
- And much more!

### Upgrading

1. Backup your YOURLS installation
2. Deactivate version 1.x
3. Delete old plugin files
4. Upload version 2.0
5. Activate plugin
6. Verify settings

---

## Version Comparison

| Feature                 | v1.5    | v2.0               |
| ----------------------- | ------- | ------------------ |
| **Files**         | 1       | 13 modules         |
| **Lines of Code** | ~500    | ~2,500 (organized) |
| **AdSense**       | Basic   | Full integration   |
| **Analytics**     | ❌      | GA4 + GTM          |
| **Themes**        | ❌      | 3 themes           |
| **Preview**       | ❌      | Live preview       |
| **Mobile**        | Basic   | Mobile-first       |
| **Security**      | Basic   | Advanced           |
| **Documentation** | Minimal | Comprehensive      |
| **Customization** | Limited | Extensive          |

---

## Roadmap

### Planned Features

- [ ] A/B testing support
- [ ] Custom CSS editor
- [ ] More ad network integrations
- [ ] Enhanced analytics dashboard
- [ ] Export/import settings
- [ ] Scheduled redirects
- [ ] Geo-targeting
- [ ] Device-specific settings
- [ ] API endpoints
- [ ] Webhook support

### Under Consideration

- [ ] WordPress integration
- [ ] REST API
- [ ] Custom redirect templates
- [ ] Video ad support
- [ ] Click fraud protection
- [ ] Advanced reporting
- [ ] Multi-language support
- [ ] White-label options

---

## Contributing

We welcome contributions! See [CONTRIBUTING.md](../CONTRIBUTING.md) for guidelines.

### How to Contribute

1. Fork the repository
2. Create feature branch
3. Make changes
4. Test thoroughly
5. Submit pull request

### Areas Needing Help

- Translation to other languages
- Testing on different platforms
- Documentation improvements
- Bug reports and fixes
- Feature suggestions

---

## Support

### Get Help

- **GitHub Issues**: [Report bugs](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)
- **Discord**: [Join community](https://discord.gg/nx9Kzrk)
- **Email**: info@newstargeted.com

### Stay Updated

- **GitHub**: Watch repository for updates
- **Discord**: Join for announcements
- **Website**: [newstargeted.com](https://newstargeted.com/)

---

## Credits

**Author**: Master3395
**Contributors**: Community contributors
**Special Thanks**: YOURLS team and community

## License

MIT License - See [LICENSE](../LICENSE) for details.

---

**Latest Version**: 2.0
**Release Date**: 2025
**Compatibility**: YOURLS 1.10.0+
**PHP Version**: 7.4+
