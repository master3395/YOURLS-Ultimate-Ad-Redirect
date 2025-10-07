# API Documentation

Developer guide for extending and integrating with Ultimate Ad Redirect plugin.

## Overview

This document describes the functions, hooks, and filters available for developers who want to extend or integrate with the Ultimate Ad Redirect plugin.

## Available Functions

### Settings Management

#### `ultimate_ad_redirect_get_settings()`

Get all plugin settings.

**Returns:** `array` - Associative array of all settings

**Example:**
```php
$settings = ultimate_ad_redirect_get_settings();
echo $settings['countdown_time']; // Output: 10
```

#### `ultimate_ad_redirect_get_default_settings()`

Get default plugin settings.

**Returns:** `array` - Associative array of default settings

**Example:**
```php
$defaults = ultimate_ad_redirect_get_default_settings();
print_r($defaults);
```

#### `ultimate_ad_redirect_update_settings()`

Update plugin settings.

**Returns:** `bool` - True on success, false on failure

**Example:**
```php
// Update settings after form submission
if (ultimate_ad_redirect_update_settings()) {
    echo "Settings saved successfully!";
}
```

---

### Ad Management

#### `ultimate_ad_redirect_get_ad_content($settings)`

Generate complete ad content HTML.

**Parameters:**
- `$settings` (array) - Plugin settings array

**Returns:** `string` - HTML for ads

**Example:**
```php
$settings = ultimate_ad_redirect_get_settings();
$ad_html = ultimate_ad_redirect_get_ad_content($settings);
echo $ad_html;
```

#### `ultimate_ad_redirect_get_adsense_code($settings)`

Generate AdSense code.

**Parameters:**
- `$settings` (array) - Plugin settings array

**Returns:** `string` - AdSense HTML code

**Example:**
```php
$settings = ultimate_ad_redirect_get_settings();
$adsense = ultimate_ad_redirect_get_adsense_code($settings);
echo $adsense;
```

#### `ultimate_ad_redirect_get_default_ads()`

Get default ad HTML when no ads configured.

**Returns:** `string` - Default ad HTML

**Example:**
```php
$default_ads = ultimate_ad_redirect_get_default_ads();
echo $default_ads;
```

---

### Analytics Functions

#### `ultimate_ad_redirect_track_redirect($url)`

Track a redirect event.

**Parameters:**
- `$url` (string) - Destination URL

**Returns:** `void`

**Example:**
```php
ultimate_ad_redirect_track_redirect('https://example.com');
```

#### `ultimate_ad_redirect_get_user_ip()`

Get user's IP address.

**Returns:** `string` - User's IP address

**Example:**
```php
$user_ip = ultimate_ad_redirect_get_user_ip();
echo "User IP: " . $user_ip;
```

#### `ultimate_ad_redirect_get_stats()`

Get redirect statistics.

**Returns:** `array` - Statistics data

**Example:**
```php
$stats = ultimate_ad_redirect_get_stats();
echo "Total redirects: " . $stats['total'];
echo "Unique IPs: " . $stats['unique_ips'];
```

#### `ultimate_ad_redirect_get_ga_code($ga_id)`

Generate Google Analytics code.

**Parameters:**
- `$ga_id` (string) - GA4 Measurement ID

**Returns:** `string` - GA4 tracking code

**Example:**
```php
$ga_code = ultimate_ad_redirect_get_ga_code('G-XXXXXXXXXX');
echo $ga_code;
```

#### `ultimate_ad_redirect_get_gtm_code($gtm_id)`

Generate Google Tag Manager code.

**Parameters:**
- `$gtm_id` (string) - GTM Container ID

**Returns:** `string` - GTM code

**Example:**
```php
$gtm_code = ultimate_ad_redirect_get_gtm_code('GTM-XXXXXXX');
echo $gtm_code;
```

---

### Redirect Handler

#### `ultimate_ad_redirect_handler($args)`

Main redirect handler function.

**Parameters:**
- `$args` (array) - YOURLS redirect arguments

**Returns:** `void` or exits

**Example:**
```php
// Called automatically by YOURLS
// Can be hooked into for customization
```

#### `ultimate_ad_redirect_show_countdown_page($url, $settings)`

Display countdown redirect page.

**Parameters:**
- `$url` (string) - Destination URL
- `$settings` (array) - Plugin settings

**Returns:** `void` (outputs HTML)

**Example:**
```php
$url = 'https://example.com';
$settings = ultimate_ad_redirect_get_settings();
ultimate_ad_redirect_show_countdown_page($url, $settings);
```

---

## YOURLS Hooks

### Actions

The plugin uses these YOURLS action hooks:

#### `plugins_loaded`

Plugin initialization.

**Example:**
```php
// Plugin automatically hooks here
yourls_add_action('plugins_loaded', 'ultimate_ad_redirect_init');
```

#### `pre_redirect`

Before redirect occurs.

**Hook Priority:** 1

**Example:**
```php
// Plugin intercepts here
yourls_add_action('pre_redirect', 'ultimate_ad_redirect_handler', 1);
```

---

## Custom Hooks & Filters

### Filters

#### `ultimate_ad_redirect_settings`

Modify settings before use.

**Parameters:**
- `$settings` (array) - Current settings

**Returns:** `array` - Modified settings

**Example:**
```php
yourls_add_filter('ultimate_ad_redirect_settings', function($settings) {
    // Always set countdown to 5 seconds
    $settings['countdown_time'] = 5;
    return $settings;
});
```

#### `ultimate_ad_redirect_ad_html`

Modify ad HTML before output.

**Parameters:**
- `$html` (string) - Current ad HTML

**Returns:** `string` - Modified HTML

**Example:**
```php
yourls_add_filter('ultimate_ad_redirect_ad_html', function($html) {
    // Add custom wrapper
    return '<div class="my-ads">' . $html . '</div>';
});
```

#### `ultimate_ad_redirect_analytics_html`

Modify analytics code before output.

**Parameters:**
- `$html` (string) - Current analytics HTML

**Returns:** `string` - Modified HTML

**Example:**
```php
yourls_add_filter('ultimate_ad_redirect_analytics_html', function($html) {
    // Add custom tracking
    $custom = '<script>/* Custom tracking */</script>';
    return $html . $custom;
});
```

---

## Database Schema

### Options Table

Settings are stored in YOURLS options table:

```sql
SELECT * FROM yourls_options 
WHERE option_name LIKE 'ultimate_ad_redirect%';
```

**Stored Options:**
- `ultimate_ad_redirect_countdown_time`
- `ultimate_ad_redirect_redirect_message`
- `ultimate_ad_redirect_page_title`
- `ultimate_ad_redirect_bg_color`
- `ultimate_ad_redirect_text_color`
- `ultimate_ad_redirect_adsense_client_id`
- `ultimate_ad_redirect_adsense_slot_id`
- `ultimate_ad_redirect_adsense_format`
- `ultimate_ad_redirect_ga_id`
- `ultimate_ad_redirect_gtm_id`
- `ultimate_ad_redirect_custom_ad_html`
- `ultimate_ad_redirect_admin_theme`

---

## Log Files

### Redirect Log

**Location:** `/user/plugins/Ultimate-Ad-Redirect/logs/redirects.log`

**Format:**
```
[2024-01-15 10:30:45] Redirect: abc123 -> https://example.com | IP: 192.168.1.1 | Referrer: https://google.com | UA: Mozilla/5.0...
```

**Reading Logs:**
```php
$log_file = YOURLS_PLUGINDIR . '/Ultimate-Ad-Redirect/logs/redirects.log';
$logs = file($log_file, FILE_IGNORE_NEW_LINES);
foreach ($logs as $log) {
    echo $log . "\n";
}
```

---

## Extending the Plugin

### Example: Custom Ad Network

```php
<?php
// Add custom ad network support

yourls_add_filter('ultimate_ad_redirect_ad_html', 'my_custom_ads');

function my_custom_ads($html) {
    // Add your ad network code
    $custom_ad = '
    <div class="custom-ad">
        <!-- Your ad network code -->
        <script src="https://your-ad-network.com/ads.js"></script>
    </div>
    ';
    
    return $html . $custom_ad;
}
```

### Example: Custom Tracking

```php
<?php
// Add custom analytics

yourls_add_filter('ultimate_ad_redirect_analytics_html', 'my_custom_tracking');

function my_custom_tracking($html) {
    // Add Facebook Pixel
    $facebook_pixel = "
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', 'YOUR_PIXEL_ID');
        fbq('track', 'PageView');
    </script>
    ";
    
    return $html . $facebook_pixel;
}
```

### Example: Modify Countdown Time

```php
<?php
// Dynamically adjust countdown based on URL

yourls_add_filter('ultimate_ad_redirect_settings', 'dynamic_countdown');

function dynamic_countdown($settings) {
    // Get current short URL
    $keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
    
    // Set different countdown for premium URLs
    $premium_urls = array('premium1', 'premium2', 'vip');
    
    if (in_array($keyword, $premium_urls)) {
        $settings['countdown_time'] = 3; // 3 seconds for premium
    } else {
        $settings['countdown_time'] = 10; // 10 seconds for regular
    }
    
    return $settings;
}
```

---

## Best Practices

### Security

1. **Always Sanitize Input**
   ```php
   $input = sanitize_text_field($_POST['input']);
   ```

2. **Verify Nonces**
   ```php
   yourls_verify_nonce('my_action');
   ```

3. **Escape Output**
   ```php
   echo esc_html($data);
   ```

### Performance

1. **Cache Settings**
   ```php
   static $settings;
   if (!$settings) {
       $settings = ultimate_ad_redirect_get_settings();
   }
   ```

2. **Minimize Database Queries**
3. **Use Conditional Loading**
4. **Optimize Assets**

### Compatibility

1. **Check YOURLS Version**
   ```php
   if (version_compare(YOURLS_VERSION, '1.10.0', '<')) {
       die('Requires YOURLS 1.10.0+');
   }
   ```

2. **Check PHP Version**
   ```php
   if (version_compare(PHP_VERSION, '7.4.0', '<')) {
       die('Requires PHP 7.4+');
   }
   ```

3. **Test with Other Plugins**

---

## Support

### Developer Resources

- **GitHub**: [View source code](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect)
- **Issues**: [Report bugs](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)
- **Discord**: [Join community](https://discord.gg/nx9Kzrk)

### Contributing

1. Fork repository
2. Create feature branch
3. Make changes
4. Test thoroughly
5. Submit pull request

### Questions?

- Email: info@newstargeted.com
- Discord: [Join server](https://discord.gg/nx9Kzrk)
- GitHub: [Open issue](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)

---

## Related Documentation

- [Installation Guide](installation.md)
- [Configuration Guide](configuration.md)
- [Features Overview](features.md)
- [Troubleshooting](troubleshooting.md)

