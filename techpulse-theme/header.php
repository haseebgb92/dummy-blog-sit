<?php
/**
 * The header for our theme
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300'); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'techpulse'); ?></a>

<!-- Header (Sticky) -->
<header id="header" class="sticky top-0 z-50 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md shadow-sm border-b border-gray-200 dark:border-gray-800">
    <nav class="container mx-auto px-4 lg:px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold font-space-grotesk bg-gradient-to-r from-blue-500 to-emerald-500 bg-clip-text text-transparent">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Desktop Navigation -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class' => 'hidden lg:flex items-center space-x-6',
                'menu_class'     => 'flex items-center space-x-6',
                'fallback_cb'    => 'techpulse_default_menu',
                'walker'         => new TechPulse_Walker_Nav_Menu(),
            ));
            ?>
            
            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon -->
                <button id="searchBtn" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" aria-label="<?php esc_attr_e('Search', 'techpulse'); ?>">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                
                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" aria-label="<?php esc_attr_e('Toggle dark mode', 'techpulse'); ?>">
                    <svg id="sunIcon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <svg id="moonIcon" class="w-5 h-5 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>
                
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" aria-label="<?php esc_attr_e('Menu', 'techpulse'); ?>">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden lg:hidden mt-4 pb-4 border-t border-gray-200 dark:border-gray-800 pt-4">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col space-y-3',
                'fallback_cb'    => 'techpulse_default_menu',
                'walker'         => new TechPulse_Walker_Nav_Menu_Mobile(),
            ));
            ?>
        </div>
    </nav>
</header>

<!-- Search Modal -->
<div id="searchModal" class="hidden fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-start justify-center pt-20 px-4">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-2xl p-6">
        <div class="flex items-center space-x-4 mb-4">
            <form role="search" method="get" class="flex-1" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" id="searchInput" name="s" placeholder="<?php esc_attr_e('Search articles...', 'techpulse'); ?>" value="<?php echo get_search_query(); ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </form>
            <button id="closeSearch" class="px-4 py-3 bg-gray-200 dark:bg-gray-700 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors"><?php esc_html_e('Cancel', 'techpulse'); ?></button>
        </div>
        <div id="searchResults" class="space-y-2"></div>
    </div>
</div>

<?php
/**
 * Default menu fallback
 */
function techpulse_default_menu() {
    echo '<div class="flex items-center space-x-6">';
    echo '<a href="' . esc_url(home_url('/')) . '" class="nav-link">' . esc_html__('Home', 'techpulse') . '</a>';
    wp_list_categories(array(
        'title_li' => '',
        'style'    => 'none',
        'walker'   => new TechPulse_Category_Walker(),
    ));
    echo '</div>';
}

/**
 * Custom Nav Menu Walker
 */
class TechPulse_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<div class="submenu">';
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</div>';
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-link';
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        $output .= '<a href="' . esc_url($item->url) . '" class="' . esc_attr($class_names) . '">' . esc_html($item->title) . '</a>';
    }
}

/**
 * Mobile Nav Menu Walker
 */
class TechPulse_Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="nav-link-mobile">' . esc_html($item->title) . '</a>';
    }
}

/**
 * Category Walker for Navigation
 */
class TechPulse_Category_Walker extends Walker_Category {
    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0) {
        $cat_name = apply_filters('list_cats', $category->name, $category);
        $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="nav-link">' . esc_html($cat_name) . '</a>';
    }
}
?>

