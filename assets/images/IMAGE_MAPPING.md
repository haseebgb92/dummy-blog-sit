# Image Mapping Guide

This document maps all Unsplash image URLs to local filenames used in the site.

## How to Add Images

1. Download each image from the Unsplash URL
2. Save it with the corresponding filename in this folder
3. Recommended format: WebP or JPG (optimized for web)

## Image List

### Hero & Featured Images
- `hero-ai-future.jpg` - https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80
  - Used in: index.html (main hero), AI section, trending sidebar

- `featured-robotics.jpg` - https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&q=80
  - Used in: index.html (featured), category pages, robotics section

- `featured-startups.jpg` - https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80
  - Used in: index.html (featured), startup section, category pages

- `featured-gadgets.jpg` - https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600&q=80
  - Used in: index.html (featured), gadgets section, reviews

### Article Images
- `article-chatgpt.jpg` - https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80
  - Used in: Trending section, AI articles

- `article-quantum.jpg` - https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80
  - Used in: Quantum computing articles

- `article-ar-vr.jpg` - https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=600&q=80
  - Used in: AR/VR articles

- `article-cybersecurity.jpg` - https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=600&q=80
  - Used in: Cybersecurity articles

- `article-healthcare-ai.jpg` - https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80
  - Used in: Healthcare AI articles, reviews

- `article-smart-home.jpg` - https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&q=80
  - Used in: Smart home articles, gadgets

- `article-blockchain.jpg` - https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80
  - Used in: Blockchain articles, startup funding

- `article-5g.jpg` - https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600&q=80
  - Used in: 5G technology articles

- `article-machine-learning.jpg` - https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80
  - Used in: Machine learning articles

### Review Images
- `review-iphone.jpg` - https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80
  - Used in: iPhone review section

- `review-laptop.jpg` - https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&q=80
  - Used in: Laptop reviews

- `review-tablet.jpg` - https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&q=80
  - Used in: Tablet reviews

### Robotics Images
- `robotics-industrial.jpg` - https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800&q=80
  - Used in: Robotics section

- `robotics-service.jpg` - https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80
  - Used in: Service robots

- `robotics-ai.jpg` - https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=400&q=80
  - Used in: AI-powered robots

### Author & Team Images
- `author-founder.jpg` - https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&q=80
  - Used in: About section, index.html author highlight

- `author-sarah.jpg` - https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&h=150&fit=crop&q=80
  - Used in: About page team section

- `author-ahmed.jpg` - https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&q=80
  - Used in: About page team section

- `author-fatima.jpg` - https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&q=80
  - Used in: About page team section

### Thumbnail Images (Small)
- `thumb-trending-1.jpg` - https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=200&q=80
- `thumb-trending-2.jpg` - https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&q=80
- `thumb-trending-3.jpg` - https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=200&q=80
- `thumb-trending-4.jpg` - https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=200&q=80
- `thumb-trending-5.jpg` - https://images.unsplash.com/photo-1677442136019-21780ecad995?w=200&q=80

## Quick Download Script

You can use a tool like `wget` or `curl` to download all images:

```bash
# Example using PowerShell (Windows)
$images = @{
    "hero-ai-future.jpg" = "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80"
    "featured-robotics.jpg" = "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&q=80"
    # Add all mappings here
}

foreach ($file in $images.Keys) {
    Invoke-WebRequest -Uri $images[$file] -OutFile "assets/images/$file"
}
```

## Image Optimization Tips

1. **Format**: Use WebP for better compression (with JPG fallback)
2. **Size**: Optimize images before uploading (use tools like TinyPNG, ImageOptim)
3. **Dimensions**: 
   - Hero images: 1200x800px
   - Featured images: 800x600px
   - Thumbnails: 400x300px
   - Author images: 200x200px (square)

## Notes

- All images are from Unsplash (free to use)
- Make sure to optimize images for web performance
- Consider using responsive images with `srcset` for better performance

