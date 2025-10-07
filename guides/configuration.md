# Configuration Guide

Complete guide to configuring Ultimate Ad Redirect plugin.

## Admin Interface Overview

The plugin features a clean, tabbed interface with three main sections:

- **⚙️ Settings Tab**: Complete configuration panel
- **📚 Documentation Tab**: Helpful links and setup guides  
- **💝 Donation Tab**: Support plugin development

## Basic Settings

### Countdown Timer

| Setting | Description | Default | Range |
|---------|-------------|---------|-------|
| **Countdown Time** | How long to show countdown before redirect | 10 seconds | 3-60 seconds |
| **Redirect Message** | Message shown during countdown | "You'll be redirected in" | Custom text |
| **Page Title** | Browser tab title | "Redirecting..." | Custom text |

**Example Configuration:**
```
Countdown Time: 5 seconds
Redirect Message: Please wait while we redirect you
Page Title: Redirecting to your destination...
```

### Visual Customization

| Setting | Description | Default |
|---------|-------------|---------|
| **Background Color** | Page background color | #1a1a1a |
| **Text Color** | Text color on page | #ffffff |
| **Admin Theme** | Admin interface theme | Auto |

**Theme Options:**
- **Light**: Bright interface for daylight viewing
- **Dark**: Dark interface for reduced eye strain
- **Auto**: Automatically matches system preference

**Color Picker Tips:**
- Use hex color codes (e.g., #1a1a1a)
- Test colors with preview before saving
- Ensure good contrast for readability

## Google AdSense Settings

### Getting Started

1. **Sign up for AdSense**
   - Visit [Google AdSense](https://www.google.com/adsense/)
   - Create account and get approved
   - Note your Publisher ID

2. **Create Ad Unit**
   - Go to AdSense dashboard
   - Ads → By ad unit → Display ads
   - Create new ad unit
   - Copy the ad unit ID

### Configuration

| Setting | Description | Format | Required |
|---------|-------------|--------|----------|
| **Client ID** | Your AdSense publisher ID | ca-pub-xxxxxxxxxxxxxxxx | Yes |
| **Slot ID** | Your ad unit slot ID | 1234567890 | Yes |
| **Ad Format** | Ad display format | Auto/Rectangle/Vertical/Horizontal | Yes |

**Ad Format Details:**
- **Auto** (Recommended): Automatically adjusts based on screen size
- **Rectangle**: 300x250px standard rectangle
- **Vertical**: 160x600px skyscraper
- **Horizontal**: 728x90px leaderboard

**Example Configuration:**
```
Client ID: ca-pub-1234567890123456
Slot ID: 9876543210
Ad Format: Auto
```

### Pre-configured Settings

The plugin comes with default AdSense settings ready to use:
- Default Client ID: ca-pub-1234567890123456
- Default Slot ID: 1234567890
- Default Format: Auto

Simply update with your own IDs to start displaying ads.

## Analytics & Tracking

### Google Analytics 4 (GA4)

1. **Create GA4 Property**
   - Go to [Google Analytics](https://analytics.google.com/)
   - Create new GA4 property
   - Copy Measurement ID

2. **Configure in Plugin**
   ```
   GA4 ID: G-XXXXXXXXXX
   ```

**What Gets Tracked:**
- Redirect page views
- Countdown completions
- Skip button clicks
- User location and device info

### Google Tag Manager (GTM)

1. **Create GTM Container**
   - Go to [Google Tag Manager](https://tagmanager.google.com/)
   - Create new container
   - Copy Container ID

2. **Configure in Plugin**
   ```
   GTM Container ID: GTM-XXXXXXX
   ```

**GTM Benefits:**
- Advanced tracking and tag management
- Custom event tracking
- Integration with multiple tools
- No code changes needed

## Custom Ad Code

### HTML Editor

The plugin includes a built-in HTML editor for custom ads:

**Features:**
- Format buttons (bold, italic, links)
- Code validation
- XSS protection
- Real-time preview

**Example Custom Ad:**
```html
<div style="text-align: center; padding: 20px;">
    <h3>Special Offer!</h3>
    <p>Get 50% off your first order</p>
    <a href="https://example.com" style="background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Shop Now
    </a>
</div>
```

**Best Practices:**
- Keep code clean and simple
- Test on mobile devices
- Ensure fast loading
- Follow advertising guidelines

### Ad Placement

Custom ads appear:
1. Above AdSense ads (if configured)
2. Below countdown timer
3. Above redirect button

## Preview Mode

### Using Live Preview

1. Click "Preview" button in admin
2. See real-time changes
3. Test different settings
4. Verify mobile responsiveness

**Preview Features:**
- Real countdown timer
- Actual color schemes
- Working skip button
- Mobile/desktop views

### Preview vs Live

| Feature | Preview | Live |
|---------|---------|------|
| Shows ads | ✅ Yes | ✅ Yes |
| Counts down | ✅ Yes | ✅ Yes |
| Redirects | ❌ No | ✅ Yes |
| Tracks analytics | ❌ No | ✅ Yes |

## Saving Settings

1. **Make Changes**
   - Update any settings in the form
   - Use live preview to test

2. **Save Settings**
   - Click "Save Settings" button
   - Wait for success message
   - Verify changes in preview

3. **Test Live**
   - Create test short URL
   - Visit the URL
   - Confirm redirect works

## Advanced Configuration

### Helpful Links in Documentation Tab

The Documentation tab provides direct links to:

- **Get AdSense Client ID**: Direct link to AdSense dashboard
- **Create Ad Unit**: Guide to creating ad units
- **Google Analytics Setup**: GA4 setup instructions
- **GTM Setup**: Tag Manager configuration
- **YOURLS Documentation**: Official YOURLS docs
- **Plugin Support**: GitHub issues and Discord

### Security Features

The plugin automatically:
- Validates all user inputs
- Sanitizes HTML output
- Protects against XSS attacks
- Uses CSRF nonces for forms
- Escapes database queries

### Performance Optimization

- **Minimal JavaScript**: Only essential scripts loaded
- **CSS Optimization**: Inline critical CSS
- **Ad Lazy Loading**: Ads load efficiently
- **Cache-Friendly**: Works with caching plugins

## Configuration Examples

### Example 1: Minimal Setup
```
Countdown Time: 5 seconds
Background Color: #ffffff
Text Color: #000000
No ads configured
```

### Example 2: AdSense Only
```
Countdown Time: 10 seconds
Client ID: ca-pub-1234567890123456
Slot ID: 9876543210
Ad Format: Auto
GA4 ID: G-XXXXXXXXXX
```

### Example 3: Full Setup
```
Countdown Time: 15 seconds
Client ID: ca-pub-1234567890123456
Slot ID: 9876543210
Ad Format: Rectangle
GA4 ID: G-XXXXXXXXXX
GTM ID: GTM-XXXXXXX
Custom HTML: <div>Custom banner</div>
Admin Theme: Dark
```

## Next Steps

- [Explore all features](features.md)
- [Troubleshooting issues](troubleshooting.md)
- [View analytics data](features.md#analytics)

## Need Help?

- Check [Troubleshooting Guide](troubleshooting.md)
- Visit [GitHub Issues](https://github.com/master3395/YOURLS-Ultimate-Ad-Redirect/issues)
- Join our [Discord](https://discord.gg/nx9Kzrk)

