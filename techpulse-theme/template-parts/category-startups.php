<?php
/**
 * Startups Category Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$startups_query = techpulse_get_posts_by_category('startups', 2);
?>

<?php if ($startups_query->have_posts()) : ?>
    <!-- Startups Section - Zigzag Layout -->
    <section class="bg-gray-50 dark:bg-gray-800/50 py-12 -mx-4 lg:-mx-6 px-4 lg:px-6">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="w-1 h-8 bg-gradient-to-b from-purple-500 to-pink-500 mr-3 rounded-full"></span>
                <?php esc_html_e('Startup Spotlight', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('startups'))); ?>" class="text-purple-500 hover:text-purple-600 dark:text-purple-400 dark:hover:text-purple-300 font-semibold">
                <?php esc_html_e('View All Startups →', 'techpulse'); ?>
            </a>
        </div>
        
        <!-- Zigzag layout -->
        <div class="space-y-8">
            <?php
            $alternate = false;
            while ($startups_query->have_posts()) :
                $startups_query->the_post();
                $alternate = !$alternate;
                ?>
                <article class="post-card group flex flex-col md:flex-row<?php echo $alternate ? '-reverse' : ''; ?> items-center gap-6">
                    <div class="relative overflow-hidden rounded-xl w-full md:w-80 h-64 flex-shrink-0">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                            </a>
                        <?php endif; ?>
                        <div class="absolute top-3 left-3">
                            <span class="px-3 py-1 bg-purple-500 text-white text-sm font-semibold rounded-full"><?php esc_html_e('Startups', 'techpulse'); ?></span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                            <span><?php esc_html_e('By', 'techpulse'); ?> <?php the_author(); ?></span>
                            <span class="mx-2">•</span>
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('M j, Y')); ?></time>
                        </div>
                        <h3 class="text-2xl font-bold font-space-grotesk mb-3 group-hover:text-purple-500 dark:group-hover:text-purple-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-purple-500 hover:text-purple-600 dark:text-purple-400 font-semibold">
                            <?php esc_html_e('Read More', 'techpulse'); ?>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();
?>

