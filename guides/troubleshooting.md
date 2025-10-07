# Troubleshooting Guide

Common issues and solutions for Ultimate Ad Redirect plugin.

## Common Issues

### Plugin Not Redirecting

**Problem:** Short URLs don't show redirect page

**Solutions:**

1. **Check Plugin Activation**
   ```
   Admin Panel → Manage Plugins → Ultimate Ad Redirect (should be "Active")
   ```

2. **Verify Settings Are Saved**
   - Go to Ultimate Ad Redirect settings
   - Check if countdown time is set
   - Click "Save Settings" again

3. **Test Different Short URL**
   - Create a new short URL
   - Try visiting it in incognito/private mode

4. **Check for Plugin Conflicts**
   - Temporarily disable other redirect plugins
   - Test if it works
   - Re-enable one by one to find conflict

5. **Clear Cache**
   - Browser cache
   - YOURLS cache (if using caching)
   - Server cache (if applicable)

### Ads Not Showing

**Problem:** AdSense ads don't display

**Solutions:**

1. **Verify AdSense IDs**
   ```
   Client ID format: ca-pub-xxxxxxxxxxxxxxxx
   Slot ID format: 1234567890 (10 digits)
   ```

2. **Check AdSense Account Status**
   - Account must be approved
   - Ads must be active
   - Site must be added to AdSense

3. **Wait for Ad Review**
   - New sites: Up to 24-48 hours
   - New ad units: Up to 1 hour

4. **Check Ad Format**
   - Try "Auto" format first
   - Test different formats
   - Verify format is supported

5. **Browser Ad Blockers**
   - Disable ad blockers
   - Test in different browser
   - Check browser console for errors

**Debug Steps:**
```javascript
// Open browser console (F12)
// Look for errors like:
// - "AdSense script blocked"
// - "Invalid ad unit ID"
// - "Ad request failed"
```

### Analytics Not Tracking

**Problem:** No data in Google Analytics

**Solutions:**

1. **Verify GA4 ID Format**
   ```
   Correct: G-XXXXXXXXXX
   Wrong: UA-XXXXXXXXX (Old Universal Analytics)
   ```

2. **Check GA4 Property**
   - Property must be active
   - Data stream must be configured
   - Measurement ID must match

3. **Wait for Data**
   - Real-time: Up to 30 seconds
   - Reports: Up to 24 hours

4. **Test Real-Time Reports**
   - Go to GA4 → Reports → Realtime
   - Visit a short URL
   - Should see event within 30 seconds

5. **Browser Privacy Settings**
   - Disable tracking protection
   - Allow all cookies
   - Test in regular (non-private) window

### Preview Not Working

**Problem:** Preview button doesn't show page

**Solutions:**

1. **Check Browser Pop-up Blocker**
   - Allow pop-ups for your site
   - Try right-click → Open in new tab

2. **Clear Browser Cache**
   ```
   Ctrl+Shift+Delete (Windows/Linux)
   Cmd+Shift+Delete (Mac)
   ```

3. **Try Different Browser**
   - Chrome, Firefox, Safari, Edge
   - Check if issue is browser-specific

4. **JavaScript Errors**
   - Open browser console (F12)
   - Look for JavaScript errors
   - Report errors to support

### Colors Not Applying

**Problem:** Background/text colors don't change

**Solutions:**

1. **Verify Hex Color Format**
   ```
   Correct: #ffffff, #1a1a1a, #007bff
   Wrong: ffffff, #fff, rgb(255,255,255)
   ```

2. **Use Full 6-Digit Hex**
   - #fff → #ffffff
   - #000 → #000000

3. **Clear Browser Cache**
   - Hard refresh: Ctrl+F5 (Windows/Linux)
   - Hard refresh: Cmd+Shift+R (Mac)

4. **Check Color Contrast**
   - Ensure colors are different enough
   - Test with high contrast (e.g., #000000 and #ffffff)

### Countdown Not Starting

**Problem:** Timer stays at initial value

**Solutions:**

1. **Check Countdown Range**
   ```
   Minimum: 3 seconds
   Maximum: 60 seconds
   ```

2. **JavaScript Errors**
   - Open browser console (F12)
   - Look for errors
   - Check if JavaScript is enabled

3. **Browser Compatibility**
   - Update browser to latest version
   - Test in different browser

4. **Disable Browser Extensions**
   - Privacy extensions
   - Script blockers
   - Security extensions

## Debug Steps

### Enable Debug Mode

Add to your YOURLS `config.php`:
```php
define('YOURLS_DEBUG', true);
```

### Check Error Logs

**PHP Error Log:**
```bash
# Location varies by system
tail -f /var/log/php/error.log
tail -f /var/log/apache2/error.log
tail -f /var/log/nginx/error.log
```

**Plugin Redirect Log:**
```bash
tail -f /user/plugins/Ultimate-Ad-Redirect/logs/redirects.log
```

### Browser Console

1. Open Developer Tools (F12)
2. Go to Console tab
3. Visit short URL
4. Look for errors

**Common Errors:**
```
Failed to load resource: net::ERR_BLOCKED_BY_CLIENT
→ Ad blocker is blocking content

Uncaught ReferenceError: $ is not defined
→ JavaScript conflict

Mixed Content: The page was loaded over HTTPS...
→ HTTP/HTTPS mismatch
```

### Network Tab

1. Open Developer Tools (F12)
2. Go to Network tab
3. Visit short URL
4. Check failed requests

**Look For:**
- Failed AdSense script loads
- Blocked analytics requests
- Missing resources
- CORS errors

## File Permission Issues

### Logs Not Writing

**Problem:** No entries in redirects.log

**Solution:**
```bash
# Check permissions
ls -la /user/plugins/Ultimate-Ad-Redirect/logs/

# Fix permissions
chmod 755 /user/plugins/Ultimate-Ad-Redirect/logs
chmod 644 /user/plugins/Ultimate-Ad-Redirect/logs/redirects.log

# On some systems, may need:
chown www-data:www-data /user/plugins/Ultimate-Ad-Redirect/logs/*
```

### Settings Not Saving

**Problem:** Settings reset after save

**Solutions:**

1. **Check YOURLS Database**
   ```sql
   SELECT * FROM yourls_options WHERE option_name LIKE 'ultimate_ad_redirect%';
   ```

2. **Database Permissions**
   - Ensure YOURLS can write to database
   - Check user has INSERT/UPDATE privileges

3. **File System Permissions**
   - YOURLS must be able to write
   - Check ownership and permissions

## Server Configuration

### Apache Issues

**Add to `.htaccess`:**
```apache
# Allow PHP execution
<FilesMatch "\.php$">
    SetHandler application/x-httpd-php
</FilesMatch>

# Enable rewrite engine
RewriteEngine On
```

### Nginx Issues

**Update nginx config:**
```nginx
location ~ \.php$ {
    include fastcgi_params;
    fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
```

### OpenLiteSpeed Issues

**Check rewrite rules:**
```
Context → Rewrite → Enable Rewrite: Yes
Rewrite Rules: YOURLS rules
```

## Error Messages

### "Settings could not be saved"

**Causes:**
- Database write error
- Insufficient permissions
- Invalid data format

**Solutions:**
- Check database connection
- Verify table exists
- Check error log

### "Invalid nonce"

**Causes:**
- Session expired
- Cache conflict
- Plugin conflict

**Solutions:**
- Refresh page and try again
- Clear cache
- Disable other plugins temporarily

### "Plugin activation failed"

**Causes:**
- PHP version too old
- Missing PHP extensions
- File permission issues

**Solutions:**
```bash
# Check PHP version
php -v  # Must be 7.4+

# Check permissions
ls -la /user/plugins/

# Check error log
tail -f /var/log/php/error.log
```

## Performance Issues

### Slow Redirect Page

**Solutions:**

1. **Optimize Images**
   - Compress images
   - Use appropriate formats
   - Consider lazy loading

2. **Minimize Custom HTML**
   - Remove unnecessary code
   - Optimize CSS/JavaScript
   - Reduce external resources

3. **Enable Caching**
   - Browser caching
   - Server-side caching
   - CDN if available

4. **Check Server Resources**
   - CPU usage
   - Memory usage
   - Database performance

### High Server Load

**Solutions:**

1. **Limit Logging**
   - Reduce log verbosity
   - Implement log rotation
   - Archive old logs

2. **Optimize Database**
   ```sql
   OPTIMIZE TABLE yourls_options;
   ```

3. **Use Caching**
   - Object caching
   - Page caching
   - Query caching

## Compatibility Issues

### YOURLS Version

**Minimum:** 1.10.0

**Check Version:**
```php
// In YOURLS admin
System Info → YOURLS Version
```

**Upgrade YOURLS:**
- Backup database
- Download latest YOURLS
- Replace files
- Run update script

### PHP Version

**Minimum:** 7.4
**Recommended:** 8.0+

**Check Version:**
```bash
php -v
```

**Common PHP Issues:**
```php
// Missing extensions
- php-curl
- php-json
- php-mbstring

// Install on Ubuntu/Debian
sudo apt-get install php-curl php-json php-mbstring

// Install on CentOS/RHEL
sudo yum install php-curl php-json php-mbstring
```

## Getting Help

### Before Reporting Issues

1. **Gather Information:**
   - YOURLS version
   - PHP version
   - Web server (Apache/Nginx/OLS)
   - Plugin version
   - Browser and version
   - Error messages

2. **Test Thoroughly:**
   - Disable other plugins
   - Test in different browser
   - Check in incognito mode
   - Try on different device

3. **Check Logs:**
   - PHP error log
   - Plugin redirect log
   - Browser console
   - Server error log

### Where to Get Help

1. **GitHub Issues**
   - Search existing issues
   - Create new issue with details
   - Include error logs
   - [Open Issue](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)

2. **Discord Community**
   - Ask questions
   - Get quick help
   - Share experiences
   - [Join Discord](https://discord.gg/nx9Kzrk)

3. **Email Support**
   - Detailed issues
   - Security concerns
   - Feature requests
   - info@newstargeted.com

### Issue Template

When reporting issues, include:

```
**Environment:**
- YOURLS Version: 1.10.2
- PHP Version: 8.0.30
- Web Server: Apache 2.4 / Nginx 1.18 / OpenLiteSpeed 1.7
- Plugin Version: 2.0

**Problem Description:**
Brief description of the issue

**Steps to Reproduce:**
1. Step one
2. Step two
3. Step three

**Expected Behavior:**
What should happen

**Actual Behavior:**
What actually happens

**Error Messages:**
Any error messages from logs or console

**Screenshots:**
If applicable
```

## Next Steps

- [Review configuration](configuration.md)
- [Check all features](features.md)
- [Read installation guide](installation.md)

## Still Having Issues?

Contact us:
- **GitHub**: [Open an issue](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)
- **Discord**: [Join community](https://discord.gg/nx9Kzrk)
- **Email**: info@newstargeted.com

