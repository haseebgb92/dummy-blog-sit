<?php
/**
 * Hero Featured Posts Section
 *
 * @package TechPulse
 * @since 1.0.0
 */

// Get featured posts
$featured_query = new WP_Query(array(
    'posts_per_page' => 4,
    'post_type'      => 'post',
    'meta_query'     => array(
        array(
            'key'     => '_thumbnail_id',
            'compare' => 'EXISTS',
        ),
    ),
    'orderby'        => 'date',
    'order'          => 'DESC',
));

if ($featured_query->have_posts()) :
    $featured_query->the_post();
    $main_post = get_post();
    $featured_query->rewind_posts();
    ?>
    <!-- Hero Section (Featured Blogs) -->
    <section>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Featured Post -->
            <?php
            $featured_query->the_post();
            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : '';
            ?>
            <article class="lg:col-span-2 featured-card group">
                <div class="relative overflow-hidden rounded-2xl h-full min-h-[400px] lg:min-h-[500px]">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('techpulse-featured-large', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 lg:p-8 text-white">
                        <?php if ($category_name) : ?>
                            <span class="inline-block px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full mb-3"><?php echo esc_html($category_name); ?></span>
                        <?php endif; ?>
                        <h1 class="text-3xl lg:text-4xl font-bold font-space-grotesk mb-3 group-hover:text-blue-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h1>
                        <p class="text-gray-200 mb-4 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-white font-semibold hover:text-blue-400 transition-colors">
                            <?php esc_html_e('Read More', 'techpulse'); ?>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            
            <!-- Side Featured Posts -->
            <div class="space-y-6">
                <?php
                $colors = array('emerald', 'purple', 'orange');
                $i = 0;
                while ($featured_query->have_posts() && $i < 3) :
                    $featured_query->the_post();
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : '';
                    $color = $colors[$i] ?? 'blue';
                    ?>
                    <article class="featured-card group">
                        <div class="relative overflow-hidden rounded-2xl h-48">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                <?php if ($category_name) : ?>
                                    <span class="inline-block px-2 py-1 bg-<?php echo esc_attr($color); ?>-500 text-white text-xs font-semibold rounded-full mb-2"><?php echo esc_html($category_name); ?></span>
                                <?php endif; ?>
                                <h2 class="text-lg font-bold font-space-grotesk mb-2 group-hover:text-<?php echo esc_attr($color); ?>-400 transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </div>
                        </div>
                    </article>
                    <?php
                    $i++;
                endwhile;
                ?>
            </div>
        </div>
    </section>
    <?php
endif;
wp_reset_postdata();
?>

