# Delta Team Three - Airsoft Website

A modern WordPress theme for Delta Team Three airsoft team, featuring a tactical military design and enhanced functionality.

## Features

- **Tactical Military Design**: Dark theme with Delta Force inspired aesthetics
- **Next Game Display**: Prominent display of upcoming game information
- **Responsive Layout**: Mobile-friendly design that works on all devices
- **Game Management**: Easy-to-update game schedule via WordPress admin
- **Team Gallery**: Showcase team photos and action shots
- **News & Updates**: Keep members informed with latest updates
- **Contact Information**: Easy access to team contact details

## Quick Start Options

### Option 1: Docker (Recommended for Local Development)

**For Windows users with Docker Desktop:**

1. Install Docker Desktop: https://www.docker.com/products/docker-desktop/
2. Open terminal in project directory
3. Run: `docker-compose up -d` (or double-click `start.bat`)
4. Open browser to: http://localhost:8000
5. Complete WordPress installation wizard
6. Activate the Delta Team Three theme

**See [DOCKER-SETUP.md](DOCKER-SETUP.md) for detailed instructions.**

### Option 2: Traditional WordPress Installation

1. Upload the `deltateam-theme` folder to `/wp-content/themes/` directory
2. Activate the theme through WordPress admin panel (Appearance > Themes)
3. Configure theme settings and add your content

**See [INSTALLATION.md](INSTALLATION.md) for detailed instructions.**

## Theme Structure

```
deltateam-theme/
├── style.css           # Main stylesheet and theme information
├── functions.php       # Theme functions and features
├── index.php          # Main template file
├── header.php         # Header template
├── footer.php         # Footer template
├── single.php         # Single post template
├── page.php           # Page template
├── front-page.php     # Homepage template
├── js/
│   └── main.js        # Custom JavaScript
├── css/
│   └── custom.css     # Additional styles
└── images/            # Theme images and assets
```

## Game Management

To add/update the next game:
1. Go to WordPress Admin > Games > Add New
2. Enter game details (date, location, time, description)
3. The most recent future game will automatically display on the homepage

## Customization

- Colors and styles can be modified in `style.css` and `css/custom.css`
- Update logo and imagery in the `images/` folder
- Modify layout in respective PHP template files

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Modern web browser

## Support

For questions or issues, contact the theme administrator.
