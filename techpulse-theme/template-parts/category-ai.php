<?php
/**
 * AI Insights Category Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$ai_query = techpulse_get_posts_by_category('ai', 5);
?>

<?php if ($ai_query->have_posts()) : ?>
    <!-- AI Insights Section - Masonry Layout -->
    <section class="bg-gray-50 dark:bg-gray-800/50 py-12 -mx-4 lg:-mx-6 px-4 lg:px-6">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="w-1 h-8 bg-gradient-to-b from-blue-500 to-emerald-500 mr-3 rounded-full"></span>
                <?php esc_html_e('AI Insights', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('ai'))); ?>" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                <?php esc_html_e('View All AI Articles →', 'techpulse'); ?>
            </a>
        </div>
        
        <!-- Masonry-style grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $ai_query->the_post();
            // Large card
            ?>
            <article class="md:col-span-2 post-card group">
                <div class="relative overflow-hidden rounded-xl h-64 mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('techpulse-featured-large', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                        </a>
                    <?php endif; ?>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full"><?php esc_html_e('AI Insights', 'techpulse'); ?></span>
                    </div>
                </div>
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
                    <span><?php esc_html_e('By', 'techpulse'); ?> <?php the_author(); ?></span>
                    <span class="mx-2">•</span>
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('M j, Y')); ?></time>
                </div>
                <h3 class="text-2xl font-bold font-space-grotesk mb-3 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-blue-500 hover:text-blue-600 dark:text-blue-400 font-semibold">
                    <?php esc_html_e('Read More', 'techpulse'); ?>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </article>
            
            <?php
            // Small cards
            while ($ai_query->have_posts() && $ai_query->current_post < 3) :
                $ai_query->the_post();
                ?>
                <article class="post-card group">
                    <div class="relative overflow-hidden rounded-xl h-40 mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('techpulse-featured-small', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg font-bold font-space-grotesk mb-2 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?> <?php esc_html_e('ago', 'techpulse'); ?></p>
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

