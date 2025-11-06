<?php
/**
 * The footer template
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="container mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            <!-- About Column -->
            <div>
                <h3 class="text-xl font-bold font-space-grotesk text-white mb-4"><?php echo esc_html(get_bloginfo('name')); ?></h3>
                <p class="text-gray-400 mb-4"><?php echo esc_html(get_bloginfo('description')); ?></p>
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            
            <!-- Quick Links Column -->
            <div>
                <h3 class="text-xl font-bold font-space-grotesk text-white mb-4"><?php esc_html_e('Quick Links', 'techpulse'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container'      => false,
                    'menu_class'     => 'space-y-2',
                    'fallback_cb'    => false,
                    'walker'         => new TechPulse_Footer_Walker(),
                ));
                ?>
                <?php if (!has_nav_menu('footer')) : ?>
                    <ul class="space-y-2">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="footer-link"><?php esc_html_e('Home', 'techpulse'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="footer-link"><?php esc_html_e('Blog', 'techpulse'); ?></a></li>
                        <?php if (get_option('page_for_posts')) : ?>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="footer-link"><?php esc_html_e('About', 'techpulse'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="footer-link"><?php esc_html_e('Contact', 'techpulse'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
            
            <!-- Popular Categories Column -->
            <div>
                <h3 class="text-xl font-bold font-space-grotesk text-white mb-4"><?php esc_html_e('Popular Topics', 'techpulse'); ?></h3>
                <?php
                $categories = get_categories(array(
                    'orderby' => 'count',
                    'order'   => 'DESC',
                    'number'  => 5,
                    'hide_empty' => true,
                ));
                
                if ($categories) :
                    echo '<ul class="space-y-2">';
                    foreach ($categories as $category) :
                        echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '" class="footer-link">' . esc_html($category->name) . '</a></li>';
                    endforeach;
                    echo '</ul>';
                endif;
                ?>
            </div>
            
            <!-- Subscribe Column -->
            <div>
                <h3 class="text-xl font-bold font-space-grotesk text-white mb-4"><?php esc_html_e('Stay Updated', 'techpulse'); ?></h3>
                <p class="text-gray-400 mb-4"><?php esc_html_e('Subscribe to our newsletter for the latest tech news and insights.', 'techpulse'); ?></p>
                <?php
                // Newsletter form - can be integrated with Mailchimp, etc.
                if (function_exists('mc4wp_show_form')) {
                    mc4wp_show_form();
                } else {
                    // Default form
                    ?>
                    <form class="flex flex-col gap-2" method="post" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="email" name="email" placeholder="<?php esc_attr_e('Your email', 'techpulse'); ?>" required class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-white">
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all">
                            <?php esc_html_e('Subscribe', 'techpulse'); ?>
                        </button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-t border-gray-800 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">
                &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?> &mdash; <?php esc_html_e('Exploring AI, Tech & Innovation.', 'techpulse'); ?>
            </p>
            <button id="backToTop" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 rounded-lg transition-colors flex items-center gap-2">
                <span><?php esc_html_e('Back to Top', 'techpulse'); ?></span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
            </button>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Footer Menu Walker
 */
class TechPulse_Footer_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li><a href="' . esc_url($item->url) . '" class="footer-link">' . esc_html($item->title) . '</a></li>';
    }
}
?>

