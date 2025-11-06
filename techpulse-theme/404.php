<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- 404 Header -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
    <div class="container mx-auto px-4 lg:px-6 text-center">
        <h1 class="text-6xl lg:text-8xl font-bold font-space-grotesk mb-4">404</h1>
        <p class="text-2xl text-blue-50"><?php esc_html_e('Page Not Found', 'techpulse'); ?></p>
    </div>
</section>

<!-- 404 Content -->
<section class="container mx-auto px-4 lg:px-6 py-12">
    <div class="max-w-2xl mx-auto text-center">
        <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
            <?php esc_html_e('Sorry, the page you are looking for could not be found. It might have been moved, deleted, or the URL might be incorrect.', 'techpulse'); ?>
        </p>
        
        <div class="space-y-4">
            <?php get_search_form(); ?>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                <?php esc_html_e('Go to Homepage', 'techpulse'); ?>
            </a>
        </div>
        
        <!-- Popular Posts -->
        <div class="mt-12 text-left">
            <h2 class="text-2xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Popular Posts', 'techpulse'); ?></h2>
            <?php
            $popular_query = techpulse_get_trending_posts(5);
            if ($popular_query->have_posts()) :
                echo '<ul class="space-y-3">';
                while ($popular_query->have_posts()) :
                    $popular_query->the_post();
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 font-semibold">
                            <?php the_title(); ?>
                        </a>
                    </li>
                    <?php
                endwhile;
                echo '</ul>';
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>

