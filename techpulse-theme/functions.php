<?php
/**
 * TechPulse Theme Functions
 * 
 * @package TechPulse
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function techpulse_setup() {
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add theme support for custom header
    add_theme_support('custom-header', apply_filters('techpulse_custom_header_args', array(
        'default-image'      => '',
        'default-text-color' => '000000',
        'width'              => 1920,
        'height'             => 400,
        'flex-height'        => true,
        'wp-head-callback'   => 'techpulse_header_style',
    )));
    
    // Add theme support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for post formats
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));
    
    // Add theme support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add theme support for automatic feed links
    add_theme_support('automatic-feed-links');
    
    // Add theme support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Set content width
    $GLOBALS['content_width'] = 1200;
    
    // Register navigation menus
    register_nav_menus(array(
        'primary'   => esc_html__('Primary Menu', 'techpulse'),
        'footer'    => esc_html__('Footer Menu', 'techpulse'),
    ));
    
    // Set up image sizes
    add_image_size('techpulse-featured-large', 1200, 600, true);
    add_image_size('techpulse-featured-medium', 800, 400, true);
    add_image_size('techpulse-featured-small', 400, 300, true);
    add_image_size('techpulse-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'techpulse_setup');

/**
 * Register widget areas
 */
function techpulse_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'techpulse'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'techpulse'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'techpulse'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'techpulse'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'techpulse'),
        'id'            => 'footer-2',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'techpulse'),
        'id'            => 'footer-3',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'techpulse'),
        'id'            => 'footer-4',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'techpulse_widgets_init');

/**
 * Enqueue scripts and styles
 */
function techpulse_scripts() {
    // Enqueue styles
    wp_enqueue_style('techpulse-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('techpulse-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('techpulse-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap', array(), null);
    
    // Enqueue Tailwind CSS (via CDN)
    wp_enqueue_style('techpulse-tailwind', 'https://cdn.tailwindcss.com', array(), null);
    
    // Enqueue scripts
    wp_enqueue_script('techpulse-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('techpulse-main', 'techpulseAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('techpulse_nonce'),
    ));
    
    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'techpulse_scripts');

/**
 * Custom header style callback
 */
function techpulse_header_style() {
    $header_text_color = get_header_textcolor();
    
    if ($header_text_color === 'blank') {
        return;
    }
    ?>
    <style type="text/css">
    .site-title a,
    .site-description {
        color: #<?php echo esc_attr($header_text_color); ?>;
    }
    </style>
    <?php
}

/**
 * Get post reading time
 */
function techpulse_get_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    
    return $reading_time;
}

/**
 * Get post views count
 */
function techpulse_get_post_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        return '0';
    }
    
    return $count;
}

/**
 * Set post views count
 */
function techpulse_set_post_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

/**
 * Track post views
 */
function techpulse_track_post_views() {
    if (!is_singular()) {
        return;
    }
    
    global $post;
    techpulse_set_post_views($post->ID);
}
add_action('wp_head', 'techpulse_track_post_views');

/**
 * Get trending posts
 */
function techpulse_get_trending_posts($limit = 5) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $limit,
        'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
        'meta_query'     => array(
            array(
                'key'     => 'post_views_count',
                'compare' => 'EXISTS',
            ),
        ),
    );
    
    return new WP_Query($args);
}

/**
 * Get posts by category
 */
function techpulse_get_posts_by_category($category_slug, $limit = 6) {
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $limit,
        'category_name'  => $category_slug,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    
    return new WP_Query($args);
}

/**
 * Add custom body classes
 */
function techpulse_body_classes($classes) {
    // Add dark mode class if enabled
    if (isset($_COOKIE['techpulse_dark_mode']) && $_COOKIE['techpulse_dark_mode'] === 'true') {
        $classes[] = 'dark';
    }
    
    return $classes;
}
add_filter('body_class', 'techpulse_body_classes');

/**
 * Custom excerpt length
 */
function techpulse_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'techpulse_excerpt_length');

/**
 * Custom excerpt more
 */
function techpulse_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'techpulse_excerpt_more');

/**
 * Add schema.org structured data
 */
function techpulse_schema_markup() {
    if (is_singular('post')) {
        global $post;
        $schema = array(
            '@context' => 'https://schema.org',
            '@type'    => 'TechArticle',
            'headline' => get_the_title(),
            'description' => get_the_excerpt(),
            'image'    => get_the_post_thumbnail_url($post->ID, 'full'),
            'author'   => array(
                '@type' => 'Person',
                'name'  => get_the_author(),
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name'  => get_bloginfo('name'),
                'logo'  => array(
                    '@type' => 'ImageObject',
                    'url'   => get_custom_logo() ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
                ),
            ),
            'datePublished' => get_the_date('c'),
            'dateModified'  => get_the_modified_date('c'),
        );
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }
}
add_action('wp_head', 'techpulse_schema_markup');

/**
 * Register custom post meta for views
 */
function techpulse_register_post_meta() {
    register_post_meta('post', 'post_views_count', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'string',
        'default'      => '0',
    ));
}
add_action('init', 'techpulse_register_post_meta');

/**
 * Add security headers
 */
function techpulse_security_headers() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
}
add_action('send_headers', 'techpulse_security_headers');

/**
 * Disable XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Register theme customization options
 */
function techpulse_customize_register($wp_customize) {
    // Contact Section
    $wp_customize->add_section('techpulse_contact', array(
        'title'    => __('Contact Information', 'techpulse'),
        'priority' => 30,
    ));
    
    // Contact Email
    $wp_customize->add_setting('techpulse_contact_email', array(
        'default'           => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('techpulse_contact_email', array(
        'label'    => __('Contact Email', 'techpulse'),
        'section'  => 'techpulse_contact',
        'type'     => 'email',
    ));
    
    // Phone
    $wp_customize->add_setting('techpulse_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('techpulse_phone', array(
        'label'    => __('Phone Number', 'techpulse'),
        'section'  => 'techpulse_contact',
        'type'     => 'text',
    ));
    
    // Location
    $wp_customize->add_setting('techpulse_location', array(
        'default'           => __('Dubai, United Arab Emirates', 'techpulse'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('techpulse_location', array(
        'label'    => __('Location', 'techpulse'),
        'section'  => 'techpulse_contact',
        'type'     => 'text',
    ));
    
    // Map Embed Code
    $wp_customize->add_setting('techpulse_map_embed', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('techpulse_map_embed', array(
        'label'    => __('Map Embed Code', 'techpulse'),
        'section'  => 'techpulse_contact',
        'type'     => 'textarea',
        'description' => __('Paste Google Maps or Mapbox embed code here', 'techpulse'),
    ));
    
    // Social Media Section
    $wp_customize->add_section('techpulse_social', array(
        'title'    => __('Social Media Links', 'techpulse'),
        'priority' => 31,
    ));
    
    // Twitter
    $wp_customize->add_setting('techpulse_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('techpulse_twitter_url', array(
        'label'    => __('Twitter URL', 'techpulse'),
        'section'  => 'techpulse_social',
        'type'     => 'url',
    ));
    
    // LinkedIn
    $wp_customize->add_setting('techpulse_linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('techpulse_linkedin_url', array(
        'label'    => __('LinkedIn URL', 'techpulse'),
        'section'  => 'techpulse_social',
        'type'     => 'url',
    ));
    
    // Instagram
    $wp_customize->add_setting('techpulse_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('techpulse_instagram_url', array(
        'label'    => __('Instagram URL', 'techpulse'),
        'section'  => 'techpulse_social',
        'type'     => 'url',
    ));
    
    // Facebook
    $wp_customize->add_setting('techpulse_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('techpulse_facebook_url', array(
        'label'    => __('Facebook URL', 'techpulse'),
        'section'  => 'techpulse_social',
        'type'     => 'url',
    ));
    
    // About Page Section
    $wp_customize->add_section('techpulse_about', array(
        'title'    => __('About Page Settings', 'techpulse'),
        'priority' => 32,
    ));
    
    // Founder Name
    $wp_customize->add_setting('techpulse_founder_name', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('techpulse_founder_name', array(
        'label'    => __('Founder Name', 'techpulse'),
        'section'  => 'techpulse_about',
        'type'     => 'text',
    ));
    
    // Founder Title
    $wp_customize->add_setting('techpulse_founder_title', array(
        'default'           => __('Founder & Editor-in-Chief', 'techpulse'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('techpulse_founder_title', array(
        'label'    => __('Founder Title', 'techpulse'),
        'section'  => 'techpulse_about',
        'type'     => 'text',
    ));
    
    // Founder Bio
    $wp_customize->add_setting('techpulse_founder_bio', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('techpulse_founder_bio', array(
        'label'    => __('Founder Bio', 'techpulse'),
        'section'  => 'techpulse_about',
        'type'     => 'textarea',
    ));
    
    // Founder Image
    $wp_customize->add_setting('techpulse_founder_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'techpulse_founder_image', array(
        'label'    => __('Founder Image', 'techpulse'),
        'section'  => 'techpulse_about',
        'mime_type' => 'image',
    )));
    
    // Contact Form Section
    $wp_customize->add_section('techpulse_forms', array(
        'title'    => __('Form Settings', 'techpulse'),
        'priority' => 33,
    ));
    
    // Contact Form 7 ID
    $wp_customize->add_setting('techpulse_contact_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('techpulse_contact_form_id', array(
        'label'       => __('Contact Form 7 ID', 'techpulse'),
        'section'     => 'techpulse_forms',
        'type'        => 'number',
        'description' => __('Enter Contact Form 7 form ID if using CF7 plugin', 'techpulse'),
    ));
    
    // Submission Form 7 ID
    $wp_customize->add_setting('techpulse_submission_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('techpulse_submission_form_id', array(
        'label'       => __('Submission Form 7 ID', 'techpulse'),
        'section'     => 'techpulse_forms',
        'type'        => 'number',
        'description' => __('Enter Contact Form 7 form ID for Write for Us page', 'techpulse'),
    ));
}
add_action('customize_register', 'techpulse_customize_register');

/**
 * Handle contact form submission
 */
function techpulse_handle_contact_form() {
    if (!isset($_POST['techpulse_contact_nonce']) || !wp_verify_nonce($_POST['techpulse_contact_nonce'], 'techpulse_contact_form')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    $to = get_theme_mod('techpulse_contact_email', get_option('admin_email'));
    $email_subject = '[' . get_bloginfo('name') . '] ' . $subject;
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array('From: ' . $name . ' <' . $email . '>');
    
    wp_mail($to, $email_subject, $email_body, $headers);
    
    wp_redirect(add_query_arg('contact', 'sent', wp_get_referer()));
    exit;
}
add_action('admin_post_techpulse_contact_form', 'techpulse_handle_contact_form');
add_action('admin_post_nopriv_techpulse_contact_form', 'techpulse_handle_contact_form');

