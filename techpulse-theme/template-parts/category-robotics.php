<?php
/**
 * Robotics Category Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$robotics_query = techpulse_get_posts_by_category('robotics', 3);
?>

<?php if ($robotics_query->have_posts()) : ?>
    <!-- Robotics Section - Grid with Featured -->
    <section class="bg-gray-50 dark:bg-gray-800/50 py-12 -mx-4 lg:-mx-6 px-4 lg:px-6">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="w-1 h-8 bg-gradient-to-b from-cyan-500 to-blue-500 mr-3 rounded-full"></span>
                <?php esc_html_e('Robotics & Automation', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('robotics'))); ?>" class="text-cyan-500 hover:text-cyan-600 dark:text-cyan-400 dark:hover:text-cyan-300 font-semibold">
                <?php esc_html_e('View All Robotics →', 'techpulse'); ?>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            $robotics_query->the_post();
            // Featured large card
            ?>
            <article class="md:col-span-2 lg:col-span-2 post-card group">
                <div class="relative overflow-hidden rounded-xl h-80 mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('techpulse-featured-large', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                        </a>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <span class="inline-block px-3 py-1 bg-cyan-500 text-white text-sm font-semibold rounded-full mb-3"><?php esc_html_e('Robotics', 'techpulse'); ?></span>
                        <h3 class="text-2xl font-bold font-space-grotesk mb-2 group-hover:text-cyan-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="text-gray-200 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                    </div>
                </div>
            </article>
            
            <?php
            // Small cards
            while ($robotics_query->have_posts()) :
                $robotics_query->the_post();
                ?>
                <article class="post-card group">
                    <div class="relative overflow-hidden rounded-xl h-40 mb-4">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('techpulse-featured-small', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg font-bold font-space-grotesk mb-2 group-hover:text-cyan-500 dark:group-hover:text-cyan-400 transition-colors">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
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

