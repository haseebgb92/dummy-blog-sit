# TechPulse WordPress Theme - Installation Guide for Hostinger

## 📋 Pre-Installation Checklist

Before installing the theme, ensure you have:
- [ ] WordPress 6.0 or higher installed
- [ ] PHP 7.4 or higher
- [ ] Hostinger hosting account with WordPress installed
- [ ] FTP access or File Manager access to your server

## 🚀 Installation Steps

### Step 1: Download the Theme

1. Download the `techpulse-theme` folder
2. Ensure the folder is named exactly `techpulse-theme`

### Step 2: Upload to Hostinger

#### Option A: Via Hostinger hPanel File Manager

1. Log in to your Hostinger hPanel
2. Navigate to **File Manager**
3. Go to: `public_html/wp-content/themes/`
4. Click **Upload** button
5. Select the `techpulse-theme` folder (or zip file)
6. If uploaded as zip, extract it using **Extract** option
7. Verify the folder is in `/wp-content/themes/techpulse-theme/`

#### Option B: Via FTP

1. Connect to your Hostinger server via FTP (FileZilla, etc.)
2. Navigate to: `/public_html/wp-content/themes/`
3. Upload the `techpulse-theme` folder
4. Ensure all files are uploaded correctly

#### Option C: Via WordPress Admin

1. Zip the `techpulse-theme` folder
2. Log in to WordPress Admin
3. Go to **Appearance → Themes**
4. Click **Add New**
5. Click **Upload Theme**
6. Choose the zip file
7. Click **Install Now**
8. Click **Activate**

### Step 3: Activate the Theme

1. Go to WordPress Admin → **Appearance → Themes**
2. Find **TechPulse** theme
3. Click **Activate**

## ⚙️ Initial Configuration

### 1. Set Up Menus

1. Go to **Appearance → Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add pages, categories, or custom links
4. Assign to **Primary Menu** location
5. Save menu

**Recommended Menu Items:**
- Home
- Categories
- AI
- Gadgets
- Startups
- Reviews
- About
- Contact

### 2. Create Categories

1. Go to **Posts → Categories**
2. Create these categories:
   - AI Insights
   - Gadgets
   - Startups
   - Reviews
   - Robotics
   - Innovations

### 3. Create Essential Pages

1. Go to **Pages → Add New**
2. Create these pages:

**About Page:**
- Title: "About"
- Content: Your about page content
- Publish

**Contact Page:**
- Title: "Contact"
- Content: Contact information
- Publish

**Write for Us Page:**
- Title: "Write for Us"
- Content: Submission guidelines
- Publish

### 4. Set Up Widgets

1. Go to **Appearance → Widgets**
2. Add widgets to:
   - **Sidebar** (if using default sidebar)
   - **Footer 1, 2, 3, 4** (footer columns)

### 5. Configure Site Settings

1. Go to **Settings → General**
2. Set:
   - Site Title
   - Tagline
   - Timezone
   - Date Format
   - Time Format

3. Go to **Settings → Reading**
4. Set:
   - Blog pages show at most: **10 posts**
   - For each article in a feed, show: **Full text**

### 6. Upload Logo

1. Go to **Appearance → Customize → Site Identity**
2. Click **Select Logo**
3. Upload your logo
4. Adjust size if needed
5. Click **Publish**

### 7. Set Featured Images

For each post:
1. Edit the post
2. Click **Set featured image**
3. Upload or select image
4. Recommended size: 1200x600px
5. Click **Set featured image**
6. Update post

## 🔌 Recommended Plugins

Install these plugins for full functionality:

### Essential Plugins

1. **Yoast SEO** or **Rank Math**
   - SEO optimization
   - Meta tags
   - Schema markup

2. **Mailchimp for WordPress**
   - Newsletter integration
   - Subscribe forms

3. **Contact Form 7**
   - Contact forms
   - Submission forms

### Performance Plugins

4. **WP Super Cache** or **W3 Total Cache**
   - Page caching
   - Performance boost

5. **Smush** or **ShortPixel**
   - Image optimization
   - Compression

### Additional Plugins

6. **Google Analytics for WordPress**
   - Analytics tracking

7. **Regenerate Thumbnails**
   - Generate theme image sizes

8. **Wordfence Security**
   - Security hardening

## ✅ Post-Installation Checklist

After installation, verify:

- [ ] Theme is activated
- [ ] Navigation menu is set up
- [ ] Categories are created
- [ ] Essential pages are created
- [ ] Logo is uploaded
- [ ] Featured images are set for posts
- [ ] Widgets are configured
- [ ] Recommended plugins are installed
- [ ] Site is loading correctly
- [ ] Mobile view is working
- [ ] Dark mode toggle is functional
- [ ] Search functionality works

## 🎨 Customization Tips

### Change Colors

1. Go to **Appearance → Customize → Colors**
2. Adjust color scheme
3. Or add custom CSS in **Additional CSS**

### Custom CSS

Add custom styles in:
**Appearance → Customize → Additional CSS**

### Child Theme (Recommended)

For customizations, create a child theme:

1. Create `techpulse-child` folder
2. Create `style.css`:
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

## 🐛 Troubleshooting

### Theme Not Activating

- Check PHP version (needs 7.4+)
- Check WordPress version (needs 6.0+)
- Verify folder name is `techpulse-theme`
- Check file permissions

### Images Not Showing

- Set featured images for posts
- Check image file permissions
- Regenerate thumbnails
- Check image paths

### Menu Not Showing

- Create a menu in Appearance → Menus
- Assign menu to Primary Menu location
- Add items to menu

### Styling Issues

- Clear browser cache
- Clear WordPress cache
- Check for plugin conflicts
- Verify CSS files are loading

## 📞 Support Resources

- WordPress Codex: https://codex.wordpress.org/
- Hostinger Support: https://www.hostinger.com/support
- Theme Documentation: See README.md

## 🔄 Updating the Theme

1. **Backup your site first!**
2. Deactivate the theme
3. Replace theme files
4. Reactivate theme
5. Clear cache

## 📝 Notes

- Always backup before making changes
- Use a child theme for customizations
- Test on staging site first
- Keep WordPress and plugins updated

---

**Happy Blogging! 🚀**

