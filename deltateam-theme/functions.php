<?php
/**
 * Delta Team Three Theme Functions
 *
 * @package DeltaTeam
 */

// Theme Setup
function deltateam_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'deltateam'),
        'footer'  => __('Footer Menu', 'deltateam'),
    ));

    // Add image sizes
    add_image_size('game-thumbnail', 800, 400, true);
    add_image_size('card-image', 400, 300, true);
}
add_action('after_setup_theme', 'deltateam_setup');

// Enqueue scripts and styles
function deltateam_scripts() {
    // Main stylesheet
    wp_enqueue_style('deltateam-style', get_stylesheet_uri(), array(), '2.0');

    // Custom CSS
    wp_enqueue_style('deltateam-custom', get_template_directory_uri() . '/css/custom.css', array(), '2.0');

    // Ensure jQuery is loaded
    wp_enqueue_script('jquery');

    // Main JavaScript with jQuery dependency
    wp_enqueue_script('deltateam-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.0', true);

    // Add inline script to verify jQuery is loaded
    wp_add_inline_script('deltateam-main', 'if(typeof jQuery==="undefined"){console.error("jQuery is not loaded - Delta Team theme may not function properly");}', 'before');
}
add_action('wp_enqueue_scripts', 'deltateam_scripts');

// Register Custom Post Type for Games
function deltateam_register_game_post_type() {
    $labels = array(
        'name'               => 'Games',
        'singular_name'      => 'Game',
        'menu_name'          => 'Games',
        'add_new'            => 'Add New Game',
        'add_new_item'       => 'Add New Game',
        'edit_item'          => 'Edit Game',
        'new_item'           => 'New Game',
        'view_item'          => 'View Game',
        'search_items'       => 'Search Games',
        'not_found'          => 'No games found',
        'not_found_in_trash' => 'No games found in trash'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'game'),
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-games',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    );

    register_post_type('game', $args);
}
add_action('init', 'deltateam_register_game_post_type');

// Add custom meta boxes for game details
function deltateam_add_game_meta_boxes() {
    add_meta_box(
        'game_details',
        'Game Details',
        'deltateam_game_details_callback',
        'game',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'deltateam_add_game_meta_boxes');

// Game details meta box callback
function deltateam_game_details_callback($post) {
    wp_nonce_field('deltateam_save_game_details', 'deltateam_game_details_nonce');

    $game_date = get_post_meta($post->ID, '_game_date', true);
    $game_time = get_post_meta($post->ID, '_game_time', true);
    $game_location = get_post_meta($post->ID, '_game_location', true);
    $game_location_address = get_post_meta($post->ID, '_game_location_address', true);
    $game_meeting_point = get_post_meta($post->ID, '_game_meeting_point', true);
    $game_cost = get_post_meta($post->ID, '_game_cost', true);
    ?>
    <p>
        <label for="game_date"><strong>Game Date:</strong></label><br>
        <input type="date" id="game_date" name="game_date" value="<?php echo esc_attr($game_date); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="game_time"><strong>Game Time:</strong></label><br>
        <input type="time" id="game_time" name="game_time" value="<?php echo esc_attr($game_time); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="game_location"><strong>Location Name:</strong></label><br>
        <input type="text" id="game_location" name="game_location" value="<?php echo esc_attr($game_location); ?>" style="width: 100%;" placeholder="e.g., Delta Force Paintball Centre">
    </p>
    <p>
        <label for="game_location_address"><strong>Full Address:</strong></label><br>
        <textarea id="game_location_address" name="game_location_address" rows="3" style="width: 100%;" placeholder="Full address for the game location"><?php echo esc_textarea($game_location_address); ?></textarea>
    </p>
    <p>
        <label for="game_meeting_point"><strong>Meeting Point:</strong></label><br>
        <input type="text" id="game_meeting_point" name="game_meeting_point" value="<?php echo esc_attr($game_meeting_point); ?>" style="width: 100%;" placeholder="e.g., Main car park">
    </p>
    <p>
        <label for="game_cost"><strong>Cost:</strong></label><br>
        <input type="text" id="game_cost" name="game_cost" value="<?php echo esc_attr($game_cost); ?>" style="width: 100%;" placeholder="e.g., £25 per person">
    </p>
    <?php
}

// Save game details
function deltateam_save_game_details($post_id) {
    // Verify nonce
    if (!isset($_POST['deltateam_game_details_nonce']) ||
        !wp_verify_nonce($_POST['deltateam_game_details_nonce'], 'deltateam_save_game_details')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Validate required fields
    $errors = array();

    // Game date is required for the next game functionality
    if (empty($_POST['game_date'])) {
        $errors[] = 'Game date is required.';
    } else {
        // Validate date format
        $date = $_POST['game_date'];
        $date_parts = explode('-', $date);
        if (count($date_parts) !== 3 || !checkdate($date_parts[1], $date_parts[2], $date_parts[0])) {
            $errors[] = 'Invalid date format.';
        }
    }

    // If there are validation errors, add admin notice and prevent save
    if (!empty($errors)) {
        set_transient('deltateam_game_save_errors_' . $post_id, $errors, 45);
        add_filter('redirect_post_location', function($location) use ($errors) {
            return add_query_arg('deltateam_errors', '1', $location);
        });
        return;
    }

    // Save fields with proper sanitization
    $text_fields = array(
        'game_date',
        'game_time',
        'game_location',
        'game_meeting_point',
        'game_cost'
    );

    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }

    // Special handling for textarea fields
    if (isset($_POST['game_location_address'])) {
        update_post_meta($post_id, '_game_location_address', sanitize_textarea_field($_POST['game_location_address']));
    }

    // Clear any previous errors
    delete_transient('deltateam_game_save_errors_' . $post_id);
}
add_action('save_post_game', 'deltateam_save_game_details');

// Display admin notices for game save errors
function deltateam_game_admin_notices() {
    global $post;

    if (!$post || $post->post_type !== 'game') {
        return;
    }

    if (isset($_GET['deltateam_errors'])) {
        $errors = get_transient('deltateam_game_save_errors_' . $post->ID);
        if ($errors) {
            echo '<div class="notice notice-error is-dismissible"><p><strong>Game validation errors:</strong></p><ul>';
            foreach ($errors as $error) {
                echo '<li>' . esc_html($error) . '</li>';
            }
            echo '</ul></div>';
            delete_transient('deltateam_game_save_errors_' . $post->ID);
        }
    }
}
add_action('admin_notices', 'deltateam_game_admin_notices');

// Get next upcoming game
function deltateam_get_next_game() {
    $args = array(
        'post_type'      => 'game',
        'posts_per_page' => 1,
        'orderby'        => array('meta_value' => 'ASC'),
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'     => '_game_date',
                'value'   => date('Y-m-d'),
                'compare' => '>=',
                'type'    => 'DATE'
            ),
            array(
                'key'     => '_game_date',
                'compare' => 'EXISTS'
            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $post = $query->posts[0];
        wp_reset_postdata();
        return $post;
    }

    return null;
}

// Format game date nicely
function deltateam_format_game_date($date, $time = '') {
    $formatted_date = date('l, F j, Y', strtotime($date));

    if (!empty($time)) {
        $formatted_time = date('g:i A', strtotime($time));
        return $formatted_date . ' at ' . $formatted_time;
    }

    return $formatted_date;
}

// Widget areas
function deltateam_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'deltateam'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'deltateam'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'deltateam'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area.', 'deltateam'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'deltateam'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area.', 'deltateam'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'deltateam'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area.', 'deltateam'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'deltateam_widgets_init');

// Customize excerpt length
function deltateam_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'deltateam_excerpt_length');

// Customize excerpt more text
function deltateam_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'deltateam_excerpt_more');

// Add custom body classes
function deltateam_body_classes($classes) {
    if (!is_front_page()) {
        $classes[] = 'inner-page';
    }

    return $classes;
}
add_filter('body_class', 'deltateam_body_classes');
