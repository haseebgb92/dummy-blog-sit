<?php
/**
 * Gadgets Category Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$gadgets_query = techpulse_get_posts_by_category('gadgets', 4);
?>

<?php if ($gadgets_query->have_posts()) : ?>
    <!-- Gadgets Section - Horizontal Scroll -->
    <section class="py-12">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="w-1 h-8 bg-gradient-to-b from-emerald-500 to-purple-500 mr-3 rounded-full"></span>
                <?php esc_html_e('Latest Gadgets', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('gadgets'))); ?>" class="text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-300 font-semibold">
                <?php esc_html_e('View All Gadgets →', 'techpulse'); ?>
            </a>
        </div>
        
        <!-- Horizontal Scroll Container -->
        <div class="overflow-x-auto scrollbar-hide pb-4">
            <div class="flex gap-6" style="min-width: max-content;">
                <?php
                while ($gadgets_query->have_posts()) :
                    $gadgets_query->the_post();
                    ?>
                    <article class="post-card group flex-shrink-0" style="width: 320px;">
                        <div class="relative overflow-hidden rounded-xl h-48 mb-4">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                            <div class="absolute top-3 left-3">
                                <span class="px-3 py-1 bg-emerald-500 text-white text-sm font-semibold rounded-full"><?php esc_html_e('Gadgets', 'techpulse'); ?></span>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold font-space-grotesk mb-2 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-3"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php esc_html_e('ago', 'techpulse'); ?></p>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();
?>

