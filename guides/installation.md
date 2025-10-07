# Installation Guide

## Requirements

- YOURLS 1.10.0 or higher
- PHP 7.4 or higher (PHP 8.0+ recommended)
- Apache, Nginx, or OpenLiteSpeed web server
- Write permissions on `/user/plugins/` directory

## Installation Steps

### Method 1: Manual Installation

1. **Download the Plugin**
   - Download the latest release from GitHub
   - Extract the ZIP file

2. **Upload to YOURLS**
   ```
   /user/plugins/Ultimate-Ad-Redirect/
   ```
   Upload the entire plugin folder to your YOURLS plugins directory

3. **Set Permissions**
   ```bash
   chmod 755 /user/plugins/Ultimate-Ad-Redirect
   chmod 755 /user/plugins/Ultimate-Ad-Redirect/logs
   chmod 644 /user/plugins/Ultimate-Ad-Redirect/logs/*.log
   ```

4. **Activate Plugin**
   - Go to your YOURLS admin panel
   - Navigate to "Manage Plugins"
   - Find "Ultimate Ad Redirect"
   - Click "Activate"

### Method 2: Git Clone

```bash
cd /path/to/yourls/user/plugins/
git clone https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect.git Ultimate-Ad-Redirect
chmod 755 Ultimate-Ad-Redirect
chmod 755 Ultimate-Ad-Redirect/logs
```

## Post-Installation

1. **Verify Installation**
   - Check that the plugin appears in "Manage Plugins"
   - Look for "Ultimate Ad Redirect" in the admin menu

2. **Configure Settings**
   - Click "Ultimate Ad Redirect" in admin menu
   - Configure basic settings (see [Configuration Guide](configuration.md))

3. **Test the Plugin**
   - Create a test short URL
   - Visit the short URL to see the redirect page
   - Verify countdown timer and ads display correctly

## Directory Structure

After installation, your directory should look like:

```
/user/plugins/Ultimate-Ad-Redirect/
├── plugin.php              # Main plugin file
├── modules/                # Plugin modules
│   ├── admin-settings.php
│   ├── redirect-handler.php
│   ├── ad-manager.php
│   └── analytics.php
├── logs/                   # Log files
│   └── redirects.log
├── images/                 # Plugin images
└── README.md              # Documentation
```

## Troubleshooting Installation

### Plugin Not Showing

- **Check file permissions**: Ensure the plugin directory is readable
- **Verify YOURLS version**: Must be 1.10.0 or higher
- **Check PHP version**: Must be 7.4 or higher

### Cannot Activate Plugin

- **PHP errors**: Check your PHP error log
- **File permissions**: Ensure logs directory is writable
- **Conflicts**: Temporarily disable other plugins

### Logs Not Working

```bash
# Make logs directory writable
chmod 755 /user/plugins/Ultimate-Ad-Redirect/logs
touch /user/plugins/Ultimate-Ad-Redirect/logs/redirects.log
chmod 644 /user/plugins/Ultimate-Ad-Redirect/logs/redirects.log
```

## Upgrading from Version 1.x

1. **Backup Your Settings**
   - Note your current configuration
   - Export any custom settings

2. **Deactivate Old Version**
   - Deactivate version 1.x in admin panel

3. **Install New Version**
   - Follow installation steps above
   - Your settings will be preserved

4. **Verify Settings**
   - Check all settings after upgrade
   - Test redirect functionality

## Next Steps

- [Configure the plugin](configuration.md)
- [Explore features](features.md)
- [Set up analytics](configuration.md#analytics-setup)

## Need Help?

- Check [Troubleshooting Guide](troubleshooting.md)
- Visit [GitHub Issues](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)
- Join our [Discord](https://discord.gg/nx9Kzrk)

