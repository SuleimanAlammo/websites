# Running Delta Team Three Website with Docker on Windows

This guide will help you run the Delta Team Three WordPress theme using Docker Desktop on Windows.

## Prerequisites

### 1. Install Docker Desktop for Windows

**Download and Install:**
1. Go to https://www.docker.com/products/docker-desktop/
2. Download Docker Desktop for Windows
3. Run the installer
4. Restart your computer if prompted
5. Launch Docker Desktop and wait for it to start (you'll see the Docker icon in your system tray)

**Verify Installation:**
Open PowerShell or Command Prompt and run:
```bash
docker --version
docker-compose --version
```

You should see version numbers for both commands.

### 2. Enable WSL 2 (if prompted)

Docker Desktop may ask you to enable WSL 2. If so:
1. Follow the prompts in Docker Desktop
2. Or manually enable it: https://docs.microsoft.com/en-us/windows/wsl/install

## Quick Start Guide

### Step 1: Download/Clone the Project

If you haven't already, download or clone this repository to your Windows machine.

For example, download to:
```
C:\Users\YourName\deltateam-website
```

### Step 2: Open Terminal in Project Directory

**Option A - Using File Explorer:**
1. Navigate to the project folder in File Explorer
2. Type `cmd` or `powershell` in the address bar and press Enter

**Option B - Using Command Prompt:**
```bash
cd C:\Users\YourName\deltateam-website
```

### Step 3: Start Docker Containers

In your terminal (PowerShell or CMD), run:

```bash
docker-compose up -d
```

**What this does:**
- `-d` runs containers in the background (detached mode)
- Downloads WordPress and MySQL images (first time only)
- Creates and starts all containers
- Sets up the database
- Mounts your theme into WordPress

**First time setup takes 2-5 minutes.** Subsequent starts are much faster.

### Step 4: Wait for Containers to Start

Check if containers are running:
```bash
docker-compose ps
```

You should see three containers running:
- `deltateam_wordpress`
- `deltateam_db`
- `deltateam_phpmyadmin`

### Step 5: Access WordPress

Open your web browser and go to:

**WordPress Site:**
```
http://localhost:8000
```

You should see the WordPress installation page.

## WordPress Installation Steps

When you first access http://localhost:8000, you'll see the WordPress setup wizard:

### 1. Select Language
- Choose English (or your preferred language)
- Click "Continue"

### 2. Site Information
Fill in the following:
- **Site Title:** Delta Team Three
- **Username:** admin (or choose your own)
- **Password:** Choose a strong password
- **Your Email:** your-email@example.com
- **Search Engine Visibility:** Uncheck for development
- Click "Install WordPress"

### 3. Login
- Go to http://localhost:8000/wp-admin
- Login with your username and password

### 4. Activate the Theme
1. In WordPress admin, go to **Appearance > Themes**
2. Find "Delta Team Three" theme
3. Click **Activate**

### 5. Set Homepage Display
1. Go to **Settings > Reading**
2. Set "Your homepage displays" to "A static page"
3. For "Homepage" select "Home" (or create a new page)
4. Click "Save Changes"

### 6. Create Menus
1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages: Home, About, Games, Gallery, Contact
4. Check "Primary Menu" under "Menu Settings"
5. Click "Save Menu"

### 7. Create Your First Game
1. In the WordPress admin sidebar, click **Games > Add New**
2. Fill in the game details:
   - Title: Your game name
   - Content: Mission briefing
   - Game Date, Time, Location, etc.
3. Set a Featured Image (optional)
4. Click **Publish**

Your theme is now fully set up!

## Additional Tools

### phpMyAdmin (Database Management)

Access the database management tool at:
```
http://localhost:8080
```

**Login credentials:**
- **Server:** db
- **Username:** root
- **Password:** rootpassword

## Common Docker Commands

### View Running Containers
```bash
docker-compose ps
```

### View Container Logs
```bash
# All containers
docker-compose logs

# Specific container
docker-compose logs wordpress
docker-compose logs db

# Follow logs in real-time
docker-compose logs -f wordpress
```

### Stop Containers
```bash
docker-compose down
```

This stops and removes containers, but **keeps your data** (database, uploads, etc.)

### Stop and Remove Everything (including data)
```bash
docker-compose down -v
```

**⚠️ WARNING:** This deletes all data including database and uploads!

### Restart Containers
```bash
docker-compose restart
```

### Rebuild Containers (after config changes)
```bash
docker-compose up -d --build
```

### Access WordPress Container Shell
```bash
docker exec -it deltateam_wordpress bash
```

Type `exit` to leave the container shell.

## Troubleshooting

### Port Already in Use

**Error:** "Port 8000 is already in use"

**Solution:** Change the port in `docker-compose.yml`:
```yaml
ports:
  - "8001:80"  # Changed from 8000 to 8001
```

Then access at http://localhost:8001

### Docker Desktop Not Running

**Error:** "Cannot connect to Docker daemon"

**Solution:**
1. Open Docker Desktop
2. Wait for it to fully start (green icon in system tray)
3. Try your command again

### Theme Not Showing Up

**Solution 1 - Restart WordPress:**
```bash
docker-compose restart wordpress
```

**Solution 2 - Check theme folder:**
```bash
docker exec deltateam_wordpress ls -la /var/www/html/wp-content/themes/
```

You should see `deltateam-theme` in the list.

### Can't Access localhost:8000

**Checklist:**
1. Are containers running? `docker-compose ps`
2. Is Docker Desktop running?
3. Try http://127.0.0.1:8000 instead
4. Check if another application is using port 8000
5. Try restarting containers: `docker-compose restart`

### Database Connection Error

**Solution:**
```bash
# Stop everything
docker-compose down

# Remove volumes and start fresh
docker-compose down -v
docker-compose up -d

# Wait 30 seconds, then try again
```

### Slow Performance on Windows

**Solutions:**
1. Ensure WSL 2 is enabled (not WSL 1)
2. In Docker Desktop: Settings > Resources > increase CPU/Memory
3. Store project files on your main drive (C:), not network drives
4. Disable antivirus scanning for Docker directories (temporary)

## File Locations

### On Your Windows Machine (Host)
- Project files: `C:\Users\YourName\deltateam-website\`
- Theme files: `C:\Users\YourName\deltateam-website\deltateam-theme\`

### Inside Docker Container
- WordPress root: `/var/www/html/`
- Theme: `/var/www/html/wp-content/themes/deltateam-theme/`
- Plugins: `/var/www/html/wp-content/plugins/`
- Uploads: `/var/www/html/wp-content/uploads/`

## Making Changes to the Theme

**You can edit theme files directly on your Windows machine!**

1. Navigate to: `C:\Users\YourName\deltateam-website\deltateam-theme\`
2. Edit any file (PHP, CSS, JS) with your favorite editor
3. Refresh your browser to see changes
4. CSS/JS changes may need a hard refresh: `Ctrl + F5`

Changes are instantly reflected in the Docker container!

## Backing Up Your Work

### Backup Database
```bash
docker exec deltateam_db mysqldump -u root -prootpassword wordpress > backup.sql
```

### Restore Database
```bash
docker exec -i deltateam_db mysql -u root -prootpassword wordpress < backup.sql
```

### Backup Uploads Folder
The uploads folder is in the Docker volume. To copy it out:
```bash
docker cp deltateam_wordpress:/var/www/html/wp-content/uploads ./uploads-backup
```

## Production Deployment

**Important:** This Docker setup is for **development only**.

For production:
1. Use a proper hosting service (SiteGround, WP Engine, etc.)
2. Or set up a production-ready Docker configuration
3. Use strong passwords
4. Enable SSL/HTTPS
5. Configure proper backups
6. Set up security measures

## Useful Links

- **WordPress Site:** http://localhost:8000
- **WordPress Admin:** http://localhost:8000/wp-admin
- **phpMyAdmin:** http://localhost:8080
- **Preview HTML:** http://localhost:8000/preview.html (after copying to theme)

## Stopping for the Day

When you're done working:

**Option 1 - Stop containers (keeps data):**
```bash
docker-compose down
```

**Option 2 - Leave running (uses resources):**
Just close your terminal. Containers keep running.

Next time you want to work, just run:
```bash
docker-compose up -d
```

And access http://localhost:8000 - everything will be as you left it!

## Getting Help

If you encounter issues:

1. Check container logs: `docker-compose logs`
2. Verify containers are running: `docker-compose ps`
3. Try restarting: `docker-compose restart`
4. Check Docker Desktop is running
5. Google the error message
6. Check WordPress support forums

## Summary of URLs

| Service | URL |
|---------|-----|
| WordPress Site | http://localhost:8000 |
| WordPress Admin | http://localhost:8000/wp-admin |
| phpMyAdmin | http://localhost:8080 |

---

**You're all set!** 🚀

Run `docker-compose up -d` and start building your Delta Team Three website!
