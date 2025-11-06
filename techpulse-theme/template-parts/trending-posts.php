<?php
/**
 * Trending Posts Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$trending_query = techpulse_get_trending_posts(4);
?>

<!-- Trending Tech & AI Articles -->
<section class="bg-gray-50 dark:bg-gray-800/50 py-12 -mx-4 lg:-mx-6 px-4 lg:px-6">
    <div>
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="mr-3">🔥</span>
                <?php esc_html_e('Trending in Tech', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 font-semibold hidden md:block">
                <?php esc_html_e('View All', 'techpulse'); ?>
            </a>
        </div>
        
        <?php if ($trending_query->have_posts()) : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                while ($trending_query->have_posts()) :
                    $trending_query->the_post();
                    $categories = get_the_category();
                    ?>
                    <article class="post-card group">
                        <div class="relative overflow-hidden rounded-xl h-48 mb-4">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($categories)) : ?>
                                <div class="absolute top-3 right-3">
                                    <span class="px-2 py-1 bg-blue-500 text-white text-xs font-semibold rounded-full"><?php echo esc_html($categories[0]->name); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-2">
                            <span><?php echo esc_html(techpulse_get_post_views()); ?> <?php esc_html_e('views', 'techpulse'); ?></span>
                            <span class="mx-2">•</span>
                            <span><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php esc_html_e('ago', 'techpulse'); ?></span>
                        </div>
                        <h3 class="text-lg font-bold font-space-grotesk mb-2 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
            <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

