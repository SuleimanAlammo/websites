# Installation Guide - Delta Team Three WordPress Theme

## Prerequisites

- WordPress 5.0 or higher
- PHP 7.4 or higher
- MySQL 5.6 or higher
- A web server (Apache or Nginx)

## Installation Steps

### 1. Upload the Theme

**Option A: Via WordPress Admin Panel**
1. Log in to your WordPress admin panel
2. Navigate to `Appearance > Themes`
3. Click `Add New` > `Upload Theme`
4. Choose the `deltateam-theme.zip` file (you'll need to zip the deltateam-theme folder first)
5. Click `Install Now`
6. Click `Activate` once installation is complete

**Option B: Via FTP/File Manager**
1. Upload the `deltateam-theme` folder to `/wp-content/themes/` directory
2. Log in to your WordPress admin panel
3. Navigate to `Appearance > Themes`
4. Find "Delta Team Three" and click `Activate`

### 2. Initial Setup

After activating the theme:

1. **Set up menus:**
   - Go to `Appearance > Menus`
   - Create a new menu called "Primary Menu"
   - Add pages: Home, About, Games, Gallery, Contact
   - Assign to "Primary Menu" location
   - Create another menu for "Footer Menu" if desired

2. **Upload a logo (optional):**
   - Go to `Appearance > Customize > Site Identity`
   - Click "Select Logo" to upload your team logo
   - Recommended size: 400px wide by 100px tall

3. **Set site title and tagline:**
   - Go to `Settings > General`
   - Set "Site Title" to "Delta Team Three"
   - Set "Tagline" to something like "Elite Airsoft Operations" or your custom tagline

4. **Configure permalink structure:**
   - Go to `Settings > Permalinks`
   - Select "Post name" for clean URLs
   - Click `Save Changes`

### 3. Create Your First Game

1. In WordPress admin, look for "Games" in the sidebar menu
2. Click `Add New Game`
3. Fill in the details:
   - **Title:** Name of the game/mission (e.g., "Operation Desert Storm")
   - **Content:** Full description of the game/mission briefing
   - **Game Date:** Select the date from the calendar
   - **Game Time:** Set the start time
   - **Location Name:** The venue name (e.g., "Delta Force Paintball Centre")
   - **Full Address:** Complete address for the location
   - **Meeting Point:** Where players should meet (e.g., "Main car park")
   - **Cost:** Entry fee (e.g., "£25 per person")
4. Set a Featured Image (optional but recommended)
5. Click `Publish`

### 4. Create Essential Pages

Create the following pages for a complete website:

**About Page:**
- Go to `Pages > Add New`
- Title: "About"
- Add content about your team, history, values, etc.
- Click `Publish`

**Contact Page:**
- Title: "Contact"
- Add contact information, email, phone, social media links
- You can use a contact form plugin like Contact Form 7

**Gallery Page:**
- Title: "Gallery"
- Upload images from your team events
- Use WordPress gallery blocks or a gallery plugin

### 5. Customize the Homepage

The homepage will automatically display:
- Hero section with site title
- Next upcoming game (automatically fetched)
- Latest news/posts
- About section
- Call to action

To customize content:
1. Edit content in `Pages > All Pages`
2. Or modify the theme files directly (advanced)

## Recommended Plugins

While the theme works standalone, these plugins enhance functionality:

- **Contact Form 7** - For contact forms
- **Yoast SEO** - For search engine optimization
- **Wordfence Security** - For website security
- **UpdraftPlus** - For backups
- **Smush** - For image optimization
- **WP Super Cache** - For performance

## Setting Up Social Media Links

Currently, social media links in the footer are placeholders. To update:

1. Edit `deltateam-theme/footer.php`
2. Find the social links section
3. Replace `#` with your actual social media URLs:
   ```php
   <a href="https://facebook.com/yourpage" class="social-link">F</a>
   <a href="https://twitter.com/yourhandle" class="social-link">T</a>
   ```

## Troubleshooting

**Games not showing up?**
- Make sure the game date is in the future
- Check that the game is published, not drafted
- Verify the date format is correct (YYYY-MM-DD)

**Menu not appearing?**
- Go to `Appearance > Menus` and assign menu to "Primary Menu" location
- Clear browser cache and WordPress cache

**Images not displaying?**
- Check file permissions on uploads folder
- Regenerate thumbnails using a plugin like "Regenerate Thumbnails"

**Styling looks broken?**
- Clear browser cache
- Clear WordPress cache if using a caching plugin
- Check that style.css is being loaded (view page source)

## Support

For issues specific to this theme, check:
- WordPress Codex: https://codex.wordpress.org/
- WordPress Support Forums: https://wordpress.org/support/

## Next Steps

Once installation is complete:
1. Add your team logo
2. Create game entries
3. Add blog posts about past games
4. Upload photos to gallery
5. Customize colors in style.css if needed
6. Set up contact forms
7. Configure SEO settings

Enjoy your new Delta Team Three website!
