# PowerShell Script to Download Images from Unsplash
# Run this script from the project root directory

$imageFolder = "assets\images"

# Create images folder if it doesn't exist
if (-not (Test-Path $imageFolder)) {
    New-Item -ItemType Directory -Path $imageFolder -Force
}

# Image mapping: filename -> URL
$images = @{
    "hero-ai-future.jpg" = "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&q=80"
    "featured-robotics.jpg" = "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&q=80"
    "featured-startups.jpg" = "https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80"
    "featured-gadgets.jpg" = "https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600&q=80"
    "article-chatgpt.jpg" = "https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80"
    "article-ar-vr.jpg" = "https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=600&q=80"
    "article-cybersecurity.jpg" = "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=600&q=80"
    "article-healthcare-ai.jpg" = "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80"
    "article-smart-home.jpg" = "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=600&q=80"
    "article-blockchain.jpg" = "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&q=80"
    "article-5g.jpg" = "https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=600&q=80"
    "article-machine-learning.jpg" = "https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=600&q=80"
    "review-iphone.jpg" = "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&q=80"
    "review-laptop.jpg" = "https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&q=80"
    "review-tablet.jpg" = "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=400&q=80"
    "robotics-industrial.jpg" = "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800&q=80"
    "robotics-service.jpg" = "https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&q=80"
    "robotics-ai.jpg" = "https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=400&q=80"
    "author-founder.jpg" = "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&q=80"
    "author-sarah.jpg" = "https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&h=150&fit=crop&q=80"
    "author-ahmed.jpg" = "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&q=80"
    "author-fatima.jpg" = "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&q=80"
    "thumb-trending-1.jpg" = "https://images.unsplash.com/photo-1555949963-aa79dcee981c?w=200&q=80"
    "thumb-trending-2.jpg" = "https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&q=80"
    "thumb-trending-3.jpg" = "https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=200&q=80"
    "thumb-trending-4.jpg" = "https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=200&q=80"
    "thumb-trending-5.jpg" = "https://images.unsplash.com/photo-1677442136019-21780ecad995?w=200&q=80"
}

Write-Host "Starting image download..." -ForegroundColor Green
Write-Host "Total images to download: $($images.Count)" -ForegroundColor Cyan

$downloaded = 0
$skipped = 0

foreach ($file in $images.Keys) {
    $filePath = Join-Path $imageFolder $file
    $url = $images[$file]
    
    if (Test-Path $filePath) {
        Write-Host "Skipping $file (already exists)" -ForegroundColor Yellow
        $skipped++
        continue
    }
    
    try {
        Write-Host "Downloading $file..." -ForegroundColor Cyan
        Invoke-WebRequest -Uri $url -OutFile $filePath -UseBasicParsing
        Write-Host "✓ Downloaded $file" -ForegroundColor Green
        $downloaded++
    }
    catch {
        Write-Host "✗ Failed to download $file : $($_.Exception.Message)" -ForegroundColor Red
    }
}

Write-Host "`nDownload complete!" -ForegroundColor Green
Write-Host "Downloaded: $downloaded" -ForegroundColor Cyan
Write-Host "Skipped: $skipped" -ForegroundColor Yellow
Write-Host "Total: $($images.Count)" -ForegroundColor White

