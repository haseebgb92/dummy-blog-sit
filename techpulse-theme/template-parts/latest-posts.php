<?php
/**
 * Latest Posts Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$latest_query = new WP_Query(array(
    'posts_per_page' => 6,
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
));
?>

<!-- Latest Blog Posts -->
<section>
    <h2 class="text-3xl font-bold font-space-grotesk mb-8"><?php esc_html_e('Latest Articles', 'techpulse'); ?></h2>
    
    <?php if ($latest_query->have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while ($latest_query->have_posts()) :
                $latest_query->the_post();
                get_template_part('template-parts/content', 'card');
            endwhile;
            ?>
        </div>
        
        <!-- Load More Button -->
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-full hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                <?php esc_html_e('Load More Articles', 'techpulse'); ?>
            </a>
        </div>
        <?php
    endif;
    wp_reset_postdata();
    ?>
</section>

