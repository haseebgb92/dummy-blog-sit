# Deploy to GitHub → Vercel

Your project is now ready to be pushed to GitHub and deployed on Vercel!

## Step 1: Create a GitHub Repository

1. **Go to GitHub**
   - Visit https://github.com
   - Sign in to your account (or create one if needed)

2. **Create a New Repository**
   - Click the "+" icon in the top right → "New repository"
   - Repository name: `techpulse-blog` (or your preferred name)
   - Description: "TechPulse - Technology & AI Blog Website"
   - Choose **Public** or **Private** (your choice)
   - **DO NOT** initialize with README, .gitignore, or license (we already have these)
   - Click "Create repository"

## Step 2: Push Your Code to GitHub

After creating the repository, GitHub will show you commands. Use these commands in your terminal:

```powershell
# Navigate to your project (if not already there)
cd "D:\Blog Site"

# Add the remote repository (replace YOUR_USERNAME with your GitHub username)
git remote add origin https://github.com/YOUR_USERNAME/techpulse-blog.git

# Rename branch to main (if needed)
git branch -M main

# Push your code
git push -u origin main
```

**OR** if you prefer SSH:

```powershell
git remote add origin git@github.com:YOUR_USERNAME/techpulse-blog.git
git branch -M main
git push -u origin main
```

## Step 3: Deploy to Vercel from GitHub

### Option A: Deploy via Vercel Dashboard (Recommended)

1. **Go to Vercel**
   - Visit https://vercel.com
   - Sign in (or create account if needed)
   - You can sign in with your GitHub account for easier integration

2. **Import Your GitHub Repository**
   - Click "Add New..." → "Project"
   - Click "Import Git Repository"
   - You'll see your GitHub repositories listed
   - Click "Import" next to your `techpulse-blog` repository

3. **Configure Project Settings**
   - **Framework Preset**: Select "Other" or "Static Site"
   - **Root Directory**: Leave as `.` (root)
   - **Build Command**: Leave empty (static site, no build needed)
   - **Output Directory**: Leave empty
   - **Install Command**: Leave empty

4. **Deploy**
   - Click "Deploy"
   - Wait 1-2 minutes for deployment
   - Your site will be live at: `https://techpulse-blog.vercel.app` (or similar)

### Option B: Deploy via Vercel CLI

```powershell
# Install Vercel CLI (if not already installed)
npm install -g vercel

# Login to Vercel
vercel login

# Deploy (from your project directory)
cd "D:\Blog Site"
vercel

# For production deployment
vercel --prod
```

## Step 4: Share with Client

Once deployed, you'll get:
- **Production URL**: `https://your-project-name.vercel.app`
- **Preview URLs**: Each commit gets its own preview URL

Share the production URL with your client for review!

## Automatic Deployments

After connecting GitHub to Vercel:
- ✅ Every push to `main` branch = automatic production deployment
- ✅ Every pull request = automatic preview deployment
- ✅ You can see deployment status in Vercel dashboard

## Custom Domain (Optional)

1. Go to your project in Vercel Dashboard
2. Click "Settings" → "Domains"
3. Add your custom domain (e.g., `www.techpulse.ae`)
4. Follow DNS configuration instructions

## Updating the Site

To update the site after making changes:

```powershell
cd "D:\Blog Site"

# Make your changes to files...

# Stage changes
git add .

# Commit changes
git commit -m "Description of changes"

# Push to GitHub (triggers automatic Vercel deployment)
git push
```

Vercel will automatically detect the push and redeploy your site!

## Troubleshooting

- **Git push fails**: Make sure you're authenticated with GitHub
- **Vercel build fails**: Check that all file paths are correct
- **404 errors**: Verify `vercel.json` routing configuration
- **CSS/JS not loading**: Check that paths in HTML are relative (not absolute)

---

**Your site is ready! 🚀**

After pushing to GitHub and deploying to Vercel, share the URL with your client for review.

