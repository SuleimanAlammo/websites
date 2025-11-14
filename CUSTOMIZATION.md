# Customization Guide - Delta Team Three Theme

## Table of Contents
1. [Changing Colors](#changing-colors)
2. [Customizing Typography](#customizing-typography)
3. [Modifying the Hero Section](#modifying-the-hero-section)
4. [Adding Custom Content](#adding-custom-content)
5. [Widget Areas](#widget-areas)
6. [Advanced Customization](#advanced-customization)

## Changing Colors

The theme uses CSS custom properties (variables) for easy color customization.

### Location
Open `deltateam-theme/style.css` and find the `:root` section at the top:

```css
:root {
    --primary-color: #1a4d2e;      /* Main green */
    --secondary-color: #4f6f52;    /* Light green */
    --accent-color: #8b0000;       /* Dark red */
    --dark-bg: #0d0d0d;            /* Very dark background */
    --light-bg: #1a1a1a;           /* Slightly lighter background */
    --text-light: #e0e0e0;         /* Light text color */
    --border-color: #333;          /* Border color */
}
```

### Example Color Schemes

**Blue Military Theme:**
```css
:root {
    --primary-color: #1e3a5f;
    --secondary-color: #2c5f8d;
    --accent-color: #d4af37;
}
```

**Desert/Tan Theme:**
```css
:root {
    --primary-color: #8b7355;
    --secondary-color: #c19a6b;
    --accent-color: #654321;
}
```

**Urban/Gray Theme:**
```css
:root {
    --primary-color: #2c3e50;
    --secondary-color: #546e7a;
    --accent-color: #ff6b6b;
}
```

## Customizing Typography

### Changing Fonts

**Step 1:** Add Google Fonts (if desired)

Edit `deltateam-theme/functions.php` and add to the `deltateam_scripts()` function:

```php
// Add Google Fonts
wp_enqueue_style('google-fonts',
    'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Oswald:wght@400;700&display=swap',
    array(), null);
```

**Step 2:** Update CSS

Edit `deltateam-theme/style.css`:

```css
body {
    font-family: 'Roboto', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Oswald', sans-serif;
}
```

### Adjusting Font Sizes

In `style.css`, find the typography section:

```css
h1 { font-size: 2.5rem; }  /* Change as needed */
h2 { font-size: 2rem; }
h3 { font-size: 1.75rem; }
body { font-size: 16px; }   /* Base font size */
```

## Modifying the Hero Section

### Changing the Background Image

1. Add your image to `deltateam-theme/images/`
2. Name it `hero-bg.jpg` (or update the CSS reference)
3. In `style.css`, find `.hero-section`:

```css
.hero-section {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('images/hero-bg.jpg') center/cover no-repeat;
}
```

### Customizing Hero Content

Edit `deltateam-theme/front-page.php` and find the hero section:

```php
<div class="hero-content">
    <h1>Delta Team Three</h1>
    <p>Elite Airsoft Operations</p>
    <a href="#next-game" class="btn">View Next Game</a>
</div>
```

Change the text to match your team's branding.

### Adjusting Hero Height

In `style.css`:

```css
.hero-section {
    padding: 100px 0;  /* Increase/decrease padding */
}
```

## Adding Custom Content

### Creating a Custom Page Template

1. Create a new file in `deltateam-theme/`: `template-custom.php`

```php
<?php
/*
Template Name: Custom Page
*/
get_header();
?>

<div class="container content-section">
    <!-- Your custom content here -->
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
```

2. When creating a page, select "Custom Page" from the Template dropdown

### Adding a New Section to Homepage

Edit `deltateam-theme/front-page.php` and add before `get_footer()`:

```php
<section class="content-section custom-section">
    <div class="container">
        <h2 class="section-title">Your Custom Section</h2>
        <p>Your content here...</p>
    </div>
</section>
```

## Widget Areas

The theme includes widget areas for dynamic content.

### Available Widget Areas

1. **Sidebar** - For blog/post pages
2. **Footer 1** - First footer column
3. **Footer 2** - Second footer column
4. **Footer 3** - Third footer column

### Adding Widgets

1. Go to `Appearance > Widgets` in WordPress admin
2. Drag widgets to the desired area
3. Configure widget settings

### Creating a Custom Widget Area

Edit `deltateam-theme/functions.php` and add to `deltateam_widgets_init()`:

```php
register_sidebar(array(
    'name'          => __('Custom Widget Area', 'deltateam'),
    'id'            => 'custom-1',
    'description'   => __('Custom widget area description', 'deltateam'),
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
));
```

Then display it in your template:

```php
<?php if (is_active_sidebar('custom-1')) : ?>
    <?php dynamic_sidebar('custom-1'); ?>
<?php endif; ?>
```

## Advanced Customization

### Adding Custom Post Types

Want to add more custom post types (like "Members" or "Events")?

Edit `deltateam-theme/functions.php`:

```php
function deltateam_register_member_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Member'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
    );
    register_post_type('member', $args);
}
add_action('init', 'deltateam_register_member_post_type');
```

### Custom CSS Without Editing Files

1. Go to `Appearance > Customize`
2. Click `Additional CSS`
3. Add your custom CSS:

```css
/* Example: Change button colors */
.btn {
    background: #your-color;
    border-color: #your-color;
}
```

### Adding Custom JavaScript

Edit `deltateam-theme/js/main.js` to add your custom JavaScript functionality.

Example - Add a scroll-to-top button:

```javascript
// Add to main.js
$(document).ready(function() {
    // Create scroll to top button
    $('body').append('<button id="scroll-top" style="position:fixed;bottom:20px;right:20px;display:none;">↑</button>');

    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('#scroll-top').fadeIn();
        } else {
            $('#scroll-top').fadeOut();
        }
    });

    $('#scroll-top').click(function() {
        $('html, body').animate({scrollTop: 0}, 600);
    });
});
```

### Customizing Game Display

To change how games are displayed, edit these files:

- **Homepage game display:** `deltateam-theme/front-page.php`
- **Single game page:** `deltateam-theme/single-game.php`
- **Game archive:** `deltateam-theme/archive-game.php`

### Adding More Game Fields

Edit `deltateam-theme/functions.php`, find `deltateam_game_details_callback()`, and add:

```php
$game_equipment = get_post_meta($post->ID, '_game_equipment', true);
?>
<p>
    <label for="game_equipment"><strong>Required Equipment:</strong></label><br>
    <textarea id="game_equipment" name="game_equipment" rows="3" style="width: 100%;"><?php echo esc_textarea($game_equipment); ?></textarea>
</p>
```

Then update `deltateam_save_game_details()` to save the new field.

### Creating Child Theme (Recommended)

For major customizations, create a child theme:

1. Create folder: `wp-content/themes/deltateam-child/`
2. Create `style.css`:

```css
/*
Theme Name: Delta Team Three Child
Template: deltateam-theme
*/

/* Your custom styles here */
```

3. Create `functions.php`:

```php
<?php
function deltateam_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'deltateam_child_enqueue_styles');
```

4. Activate the child theme instead of the parent

## Tips

- Always backup your site before making changes
- Test changes on a staging site first
- Use browser developer tools to inspect elements
- Clear cache after making CSS changes
- Keep WordPress and theme files updated

## Common Customization Requests

### Remove "Next Game" Section
Edit `front-page.php` and comment out or delete the section.

### Change Layout to Sidebar
Create a new template or modify existing templates to include:

```php
<div class="content-with-sidebar">
    <div class="main-content">
        <!-- Main content -->
    </div>
    <aside class="sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
</div>
```

### Add Team Member Profiles
Use the custom post type example above and create templates to display members.

## Getting Help

- WordPress Codex: https://codex.wordpress.org/
- CSS Reference: https://developer.mozilla.org/en-US/docs/Web/CSS
- PHP WordPress Functions: https://developer.wordpress.org/reference/

Happy customizing!
