# Images Directory

This directory contains all images used in the TechPulse blog website.

## Quick Start

### Option 1: Download All Images Automatically

Run the PowerShell script to download all images:

```powershell
cd "D:\Blog Site"
.\assets\images\download-images.ps1
```

### Option 2: Download Images Manually

1. Open `IMAGE_MAPPING.md` to see all image URLs
2. Download each image from the Unsplash URL
3. Save with the corresponding filename in this folder

## Image Files Required

### Hero & Featured (4 images)
- `hero-ai-future.jpg`
- `featured-robotics.jpg`
- `featured-startups.jpg`
- `featured-gadgets.jpg`

### Article Images (8 images)
- `article-chatgpt.jpg`
- `article-ar-vr.jpg`
- `article-cybersecurity.jpg`
- `article-healthcare-ai.jpg`
- `article-smart-home.jpg`
- `article-blockchain.jpg`
- `article-5g.jpg`
- `article-machine-learning.jpg`

### Review Images (3 images)
- `review-iphone.jpg`
- `review-laptop.jpg`
- `review-tablet.jpg`

### Robotics Images (3 images)
- `robotics-industrial.jpg`
- `robotics-service.jpg`
- `robotics-ai.jpg`

### Author Images (4 images)
- `author-founder.jpg`
- `author-sarah.jpg`
- `author-ahmed.jpg`
- `author-fatima.jpg`

### Thumbnail Images (5 images)
- `thumb-trending-1.jpg` through `thumb-trending-5.jpg`

**Total: 27 images**

## Image Optimization

Before committing images:
1. Optimize images using tools like:
   - TinyPNG (https://tinypng.com)
   - ImageOptim (https://imageoptim.com)
   - Squoosh (https://squoosh.app)
2. Recommended formats: WebP (with JPG fallback)
3. Target sizes:
   - Hero images: ~200-300 KB
   - Featured images: ~150-200 KB
   - Thumbnails: ~50-100 KB

## Notes

- All images are from Unsplash (free to use)
- Images are referenced in HTML files with relative paths: `assets/images/filename.jpg`
- Make sure all images are optimized for web performance

