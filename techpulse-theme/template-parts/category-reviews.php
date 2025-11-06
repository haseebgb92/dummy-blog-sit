<?php
/**
 * Reviews Category Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

$reviews_query = techpulse_get_posts_by_category('reviews', 3);
?>

<?php if ($reviews_query->have_posts()) : ?>
    <!-- Reviews Section - Card Stack Layout -->
    <section class="py-12">
        <div class="mb-8 flex items-center justify-between">
            <h2 class="text-3xl font-bold font-space-grotesk flex items-center">
                <span class="w-1 h-8 bg-gradient-to-b from-orange-500 to-red-500 mr-3 rounded-full"></span>
                <?php esc_html_e('Tech Reviews', 'techpulse'); ?>
            </h2>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('reviews'))); ?>" class="text-orange-500 hover:text-orange-600 dark:text-orange-400 dark:hover:text-orange-300 font-semibold">
                <?php esc_html_e('View All Reviews →', 'techpulse'); ?>
            </a>
        </div>
        
        <!-- Stacked cards with different sizes -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $reviews_query->the_post();
            // Large card
            ?>
            <article class="post-card group md:col-span-2">
                <div class="relative overflow-hidden rounded-xl h-72 mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('techpulse-featured-large', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                        </a>
                    <?php endif; ?>
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-orange-500 text-white text-sm font-semibold rounded-full"><?php esc_html_e('Reviews', 'techpulse'); ?></span>
                    </div>
                </div>
                <h3 class="text-2xl font-bold font-space-grotesk mb-3 group-hover:text-orange-500 dark:group-hover:text-orange-400 transition-colors">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
            </article>
            
            <div class="space-y-6">
                <?php
                while ($reviews_query->have_posts()) :
                    $reviews_query->the_post();
                    ?>
                    <article class="post-card group">
                        <div class="relative overflow-hidden rounded-xl h-32 mb-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('techpulse-featured-small', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-base font-bold font-space-grotesk group-hover:text-orange-500 dark:group-hover:text-orange-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
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

