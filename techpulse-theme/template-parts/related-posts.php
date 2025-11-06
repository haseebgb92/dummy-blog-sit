<?php
/**
 * Related Posts Template Part
 *
 * @package TechPulse
 * @since 1.0.0
 */

$current_post_id = get_the_ID();
$categories = wp_get_post_categories($current_post_id);

if (!empty($categories)) {
    $related_query = new WP_Query(array(
        'category__in'   => $categories,
        'post__not_in'   => array($current_post_id),
        'posts_per_page' => 3,
        'orderby'        => 'rand',
    ));
    
    if ($related_query->have_posts()) :
        ?>
        <!-- Related Posts -->
        <section class="border-t border-gray-200 dark:border-gray-800 pt-8 mt-12">
            <h3 class="text-2xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Related Articles', 'techpulse'); ?></h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php
                while ($related_query->have_posts()) :
                    $related_query->the_post();
                    ?>
                    <article class="group">
                        <div class="relative overflow-hidden rounded-xl h-40 mb-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <h4 class="font-bold font-space-grotesk group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
        </section>
        <?php
        wp_reset_postdata();
    endif;
}
?>

