# TechPulse WordPress Theme

A modern, SEO-optimized, fully responsive WordPress theme for technology and AI blogs. Perfect for Hostinger WordPress hosting.

## 🚀 Features

- **Modern, Minimalist Design** - Clean tech-inspired layout
- **Fully Responsive** - Mobile-first design
- **SEO Optimized** - Schema markup, Open Graph, Twitter Cards
- **Dark Mode** - Toggle with localStorage persistence
- **Fast Performance** - Optimized for Core Web Vitals
- **WordPress Ready** - Built with WordPress best practices
- **Hostinger Compatible** - Tested and optimized for Hostinger hosting

## 📦 Installation

### Method 1: Upload via WordPress Admin

1. **Download the theme folder** (`techpulse-theme`)
2. **Zip the folder** (make sure the folder name is `techpulse-theme`)
3. Log in to your WordPress admin panel
4. Go to **Appearance → Themes**
5. Click **Add New**
6. Click **Upload Theme**
7. Choose the zip file and click **Install Now**
8. Click **Activate**

### Method 2: Upload via FTP/cPanel

1. **Extract the theme folder** from the zip
2. Upload the `techpulse-theme` folder to `/wp-content/themes/` on your server
3. Log in to WordPress admin
4. Go to **Appearance → Themes**
5. Find **TechPulse** and click **Activate**

### Method 3: Via Hostinger hPanel

1. Log in to your Hostinger hPanel
2. Go to **File Manager**
3. Navigate to `public_html/wp-content/themes/`
4. Upload the `techpulse-theme` folder
5. Extract if needed
6. Go to WordPress admin → **Appearance → Themes** → **Activate**

## ⚙️ Theme Setup

### 1. Initial Configuration

After activation, go to **Appearance → Customize** to configure:

- **Site Identity** - Upload logo, set site title and tagline
- **Colors** - Customize theme colors
- **Menus** - Set up navigation menus
- **Widgets** - Configure sidebar and footer widgets

### 2. Create Navigation Menus

1. Go to **Appearance → Menus**
2. Create a new menu (e.g., "Primary Menu")
3. Add pages, categories, or custom links
4. Assign to **Primary Menu** location
5. Create another menu for **Footer Menu**

### 3. Set Up Categories

Create categories for your blog:
- AI Insights
- Gadgets
- Startups
- Reviews
- Robotics
- Innovations

### 4. Create Essential Pages

Create these pages:
- **About** - About your blog
- **Contact** - Contact page
- **Write for Us** - Guest writer guidelines

### 5. Set Featured Images

For best results, set featured images for all posts:
- Recommended size: 1200x600px
- Minimum size: 800x400px

## 🎨 Customization

### Using WordPress Customizer

1. Go to **Appearance → Customize**
2. Customize:
   - Site Identity (Logo, Title, Tagline)
   - Colors
   - Menus
   - Widgets
   - Homepage Settings

### Custom CSS

Add custom CSS in **Appearance → Customize → Additional CSS**

### Child Theme (Recommended)

For customizations, create a child theme:

1. Create a folder `techpulse-child` in `/wp-content/themes/`
2. Create `style.css` with:
```css
/*
Theme Name: TechPulse Child
Template: techpulse
*/
@import url('../techpulse/style.css');
```
3. Create `functions.php`:
```php
<?php
function techpulse_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'techpulse_child_enqueue_styles');
```

## 📁 File Structure

```
techpulse-theme/
├── style.css              # Theme header and main stylesheet
├── functions.php          # Theme functions and setup
├── index.php             # Main template
├── header.php            # Header template
├── footer.php            # Footer template
├── single.php            # Single post template
├── category.php          # Category archive template
├── archive.php          # Archive template
├── page.php             # Page template
├── sidebar-trending.php # Trending sidebar
├── search.php           # Search results template
├── 404.php              # 404 error template
├── assets/
│   ├── css/
│   │   └── main.css     # Custom styles
│   └── js/
│       └── main.js      # JavaScript
└── template-parts/      # Reusable template parts
    ├── hero-featured.php
    ├── trending-posts.php
    ├── latest-posts.php
    └── ...
```

## 🔌 Recommended Plugins

- **Yoast SEO** or **Rank Math** - SEO optimization
- **Mailchimp for WordPress** - Newsletter integration
- **Contact Form 7** - Contact forms
- **WP Super Cache** or **W3 Total Cache** - Caching
- **Smush** - Image optimization
- **Google Analytics** - Analytics tracking

## 🎯 SEO Features

- Schema.org structured data
- Open Graph meta tags
- Twitter Card support
- Semantic HTML5
- Proper heading hierarchy
- Alt text for images
- Canonical URLs
- Mobile-friendly design

## 📱 Responsive Breakpoints

- Mobile: < 640px
- Tablet: 640px - 1024px
- Desktop: > 1024px

## 🔧 Functions Overview

### Theme Functions (functions.php)

- `techpulse_setup()` - Theme setup
- `techpulse_get_reading_time()` - Calculate reading time
- `techpulse_get_post_views()` - Get post views
- `techpulse_get_trending_posts()` - Get trending posts
- `techpulse_get_posts_by_category()` - Get posts by category

### Template Tags

- `techpulse_get_reading_time()` - Display reading time
- `techpulse_get_post_views()` - Display post views
- Featured image support
- Custom excerpt lengths

## 🐛 Troubleshooting

### Theme Not Showing Correctly

1. Clear browser cache
2. Clear WordPress cache (if using caching plugin)
3. Check PHP version (requires 7.4+)
4. Check for plugin conflicts

### Images Not Loading

1. Set featured images for posts
2. Check image permissions
3. Regenerate thumbnails (use Regenerate Thumbnails plugin)

### Menu Not Showing

1. Create a menu in **Appearance → Menus**
2. Assign menu to **Primary Menu** location
3. Add items to the menu

## 📞 Support

For support:
- Check WordPress documentation
- Review theme files for customization
- Contact Hostinger support for hosting issues

## 📄 License

This theme is licensed under the GNU GPL v2 or later.

## 🔄 Updates

To update the theme:
1. Download the latest version
2. Deactivate current theme
3. Replace theme files
4. Reactivate theme

## ✅ Hostinger Specific Notes

- Compatible with Hostinger WordPress hosting
- Works with Hostinger's one-click WordPress installation
- Optimized for Hostinger's performance features
- Tested on Hostinger's server environment

## 🎉 Getting Started Checklist

- [ ] Install and activate theme
- [ ] Set up navigation menus
- [ ] Create categories
- [ ] Create essential pages (About, Contact, Write for Us)
- [ ] Set featured images for posts
- [ ] Configure widgets
- [ ] Install recommended plugins
- [ ] Set up SEO plugin
- [ ] Configure newsletter integration
- [ ] Test on mobile devices
- [ ] Test dark mode toggle
- [ ] Review and publish!

---

**Built with ❤️ for TechPulse**

