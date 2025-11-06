# Deploying to Vercel

This guide will help you deploy your TechPulse blog site to Vercel for client review.

## Prerequisites

- A Vercel account (sign up at https://vercel.com if you don't have one)
- Vercel CLI installed (optional, but recommended)

## Deployment Methods

### Method 1: Deploy via Vercel Dashboard (Easiest)

1. **Go to Vercel Dashboard**
   - Visit https://vercel.com
   - Sign in or create an account

2. **Import Your Project**
   - Click "Add New..." → "Project"
   - Click "Import Git Repository" (if using Git) OR "Deploy" → "Browse" (to upload files)
   - If using Git: Connect your GitHub/GitLab/Bitbucket repository
   - If uploading: Select your project folder

3. **Configure Project**
   - Framework Preset: "Other" or "Static Site"
   - Root Directory: `.` (current directory)
   - Build Command: Leave empty (static site)
   - Output Directory: Leave empty or set to `.`
   - Install Command: Leave empty

4. **Deploy**
   - Click "Deploy"
   - Wait for deployment to complete
   - You'll get a URL like: `your-project-name.vercel.app`

### Method 2: Deploy via Vercel CLI (Recommended for Developers)

1. **Install Vercel CLI**
   ```bash
   npm install -g vercel
   ```

2. **Login to Vercel**
   ```bash
   vercel login
   ```

3. **Deploy from Project Directory**
   ```bash
   cd "D:\Blog Site"
   vercel
   ```

4. **Follow the Prompts**
   - Set up and deploy? **Yes**
   - Which scope? (Select your account)
   - Link to existing project? **No** (first time)
   - Project name? (Press Enter for default or enter custom name)
   - Directory? **.** (current directory)
   - Override settings? **No**

5. **Production Deployment**
   ```bash
   vercel --prod
   ```

## After Deployment

- Your site will be live at: `https://your-project-name.vercel.app`
- You can share this URL with your client for review
- Vercel automatically provides HTTPS
- Each deployment gets a unique preview URL

## Custom Domain (Optional)

1. Go to your project settings in Vercel Dashboard
2. Navigate to "Domains"
3. Add your custom domain
4. Follow DNS configuration instructions

## Environment Variables (If Needed)

If you add any API keys or environment variables later:
1. Go to Project Settings → Environment Variables
2. Add your variables
3. Redeploy

## Notes

- The WordPress theme folder (`techpulse-theme/`) is excluded from deployment via `.vercelignore`
- All static files (HTML, CSS, JS) will be deployed
- Vercel automatically handles routing and caching
- The site will be fast and globally distributed via Vercel's CDN

## Troubleshooting

- **404 errors**: Check that all file paths are relative (not absolute)
- **CSS/JS not loading**: Verify paths in HTML files are correct
- **Build errors**: Ensure all files are in the correct directories

---

**Your site is now ready for client review! 🚀**

