# Page Templates Guide

This theme includes custom page templates that you can use when creating pages in WordPress. These templates have all the styling and structure already built-in, so you don't need to recreate the pages from scratch.

## 📄 Available Page Templates

### 1. About Page Template
**File:** `templates/page-about.php`  
**Template Name:** "About Page"

#### How to Use:
1. Go to **Pages → Add New** in WordPress Admin
2. Enter page title: "About" (or any title you prefer)
3. In the **Page Attributes** box (right sidebar), find **Template**
4. Select **"About Page"** from the dropdown
5. Optionally add content in the editor (or use default content)
6. Click **Publish**

#### Features:
- Hero section with gradient background
- Mission statement section
- Team section with founder/editor info
- Contributing authors grid (auto-populated from users with posts)
- Social media CTA section
- All content is customizable via WordPress Customizer

#### Customization Options (Customizer):
- **Appearance → Customize → About Page Settings**
  - Founder Name
  - Founder Title
  - Founder Bio
  - Founder Image

### 2. Contact Page Template
**File:** `templates/page-contact.php`  
**Template Name:** "Contact Page"

#### How to Use:
1. Go to **Pages → Add New**
2. Enter page title: "Contact"
3. Select **"Contact Page"** template from dropdown
4. Click **Publish**

#### Features:
- Hero section
- Contact form (supports Contact Form 7 or default form)
- Contact information display
- Map placeholder (can add Google Maps embed)
- Social media links

#### Customization Options (Customizer):
- **Appearance → Customize → Contact Information**
  - Contact Email
  - Phone Number
  - Location
  - Map Embed Code (Google Maps/Mapbox)

- **Appearance → Customize → Form Settings**
  - Contact Form 7 ID (if using CF7 plugin)

### 3. Write for Us Page Template
**File:** `templates/page-write-for-us.php`  
**Template Name:** "Write for Us Page"

#### How to Use:
1. Go to **Pages → Add New**
2. Enter page title: "Write for Us"
3. Select **"Write for Us Page"** template from dropdown
4. Optionally add guidelines content in the editor
5. Click **Publish**

#### Features:
- Hero section
- Submission guidelines (with default content if page is empty)
- Topics covered section
- Content requirements
- Submission form (supports Contact Form 7 or default form)

#### Customization Options (Customizer):
- **Appearance → Customize → Form Settings**
  - Submission Form 7 ID (if using CF7 plugin)

## 🎨 Customizing Content

### Option 1: Use WordPress Editor
- Add content in the page editor
- The template will display your content while maintaining the styling
- For About page: Content appears in the mission statement section
- For Contact page: Content can be added above the form
- For Write for Us: Content replaces the default guidelines

### Option 2: Use WordPress Customizer
Go to **Appearance → Customize** to customize:
- Contact information
- Social media links
- About page founder info
- Form settings

## 📝 Step-by-Step Setup

### Create About Page:
1. **Pages → Add New**
2. Title: "About"
3. Template: **About Page**
4. Publish
5. Go to **Appearance → Customize → About Page Settings**
6. Fill in founder information
7. Save

### Create Contact Page:
1. **Pages → Add New**
2. Title: "Contact"
3. Template: **Contact Page**
4. Publish
5. Go to **Appearance → Customize → Contact Information**
6. Fill in contact details
7. (Optional) Add Contact Form 7 form ID in **Form Settings**
8. Save

### Create Write for Us Page:
1. **Pages → Add New**
2. Title: "Write for Us"
3. Template: **Write for Us Page**
4. Optionally add custom guidelines content
5. Publish
6. (Optional) Add Contact Form 7 form ID in **Form Settings**
7. Save

## 🔌 Using Contact Form 7

If you have Contact Form 7 installed:

1. Create a form in **Contact → Contact Forms**
2. Copy the form ID (shortcode shows: `[contact-form-7 id="123"]`)
3. Go to **Appearance → Customize → Form Settings**
4. Enter the form ID
5. The template will automatically use CF7 instead of default form

## 🗺️ Adding Google Maps

1. Go to Google Maps
2. Find your location
3. Click **Share → Embed a map**
4. Copy the iframe code
5. Go to **Appearance → Customize → Contact Information**
6. Paste code in **Map Embed Code** field
7. Save

## ✅ Quick Setup Checklist

- [ ] Create About page with "About Page" template
- [ ] Create Contact page with "Contact Page" template
- [ ] Create Write for Us page with "Write for Us Page" template
- [ ] Configure contact information in Customizer
- [ ] Add social media links in Customizer
- [ ] Add founder info for About page (if applicable)
- [ ] Set up Contact Form 7 (optional)
- [ ] Add Google Maps embed (optional)
- [ ] Add pages to navigation menu

## 💡 Tips

- Pages can be left empty - templates include default content
- All text is translatable (uses WordPress i18n)
- Forms work even without Contact Form 7 (uses mailto fallback)
- Social links only show if URLs are configured
- Team section automatically shows authors with published posts
- All templates are fully responsive and SEO-optimized

---

**All templates are ready to use! Just create the pages and select the template. No coding required! 🎉**



