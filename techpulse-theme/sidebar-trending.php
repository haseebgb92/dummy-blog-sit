<?php
/**
 * Trending Sidebar Template
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<!-- Sticky Trending Sidebar -->
<aside class="hidden lg:block lg:col-span-1">
    <div class="sticky top-24 space-y-6">
        <!-- Trending Posts -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold font-space-grotesk mb-4 flex items-center">
                <span class="mr-2">🔥</span>
                <?php esc_html_e('Trending Now', 'techpulse'); ?>
            </h3>
            <div class="space-y-4">
                <?php
                $trending_query = techpulse_get_trending_posts(5);
                if ($trending_query->have_posts()) :
                    $trending_colors = array('blue', 'emerald', 'purple', 'orange', 'red');
                    $trending_num = 1;
                    while ($trending_query->have_posts()) :
                        $trending_query->the_post();
                        $color = $trending_colors[$trending_num - 1] ?? 'blue';
                        ?>
                        <article class="group flex gap-3 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-0">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="relative overflow-hidden rounded-lg w-20 h-20 flex-shrink-0">
                                    <?php the_post_thumbnail('techpulse-thumbnail', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
                                </div>
                            <?php endif; ?>
                            <div class="flex-1 min-w-0">
                                <span class="text-xs text-<?php echo esc_attr($color); ?>-500 font-semibold">#<?php echo esc_html($trending_num); ?> <?php esc_html_e('Trending', 'techpulse'); ?></span>
                                <h4 class="font-bold font-space-grotesk text-sm mb-1 group-hover:text-<?php echo esc_attr($color); ?>-500 dark:group-hover:text-<?php echo esc_attr($color); ?>-400 transition-colors line-clamp-2">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    <?php echo esc_html(techpulse_get_post_views()); ?> <?php esc_html_e('views', 'techpulse'); ?>
                                </span>
                            </div>
                        </article>
                        <?php
                        $trending_num++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        
        <!-- Newsletter Sidebar -->
        <div class="bg-gradient-to-r from-blue-500 to-emerald-500 rounded-2xl p-6 text-white">
            <h3 class="text-xl font-bold font-space-grotesk mb-3"><?php esc_html_e('Stay Updated', 'techpulse'); ?></h3>
            <p class="text-sm text-blue-50 mb-4"><?php esc_html_e('Get the latest tech news delivered to your inbox weekly.', 'techpulse'); ?></p>
            <?php
            if (function_exists('mc4wp_show_form')) {
                mc4wp_show_form();
            } else {
                ?>
                <form class="space-y-3" method="post" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="email" name="email" placeholder="<?php esc_attr_e('Your email', 'techpulse'); ?>" class="w-full px-4 py-2 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                    <button type="submit" class="w-full px-4 py-2 bg-white text-blue-500 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                        <?php esc_html_e('Subscribe', 'techpulse'); ?>
                    </button>
                </form>
                <?php
            }
            ?>
        </div>
        
        <!-- Popular Categories -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h3 class="text-xl font-bold font-space-grotesk mb-4"><?php esc_html_e('Popular Categories', 'techpulse'); ?></h3>
            <div class="space-y-2">
                <?php
                $popular_categories = get_categories(array(
                    'orderby' => 'count',
                    'order'   => 'DESC',
                    'number'  => 5,
                    'hide_empty' => true,
                ));
                
                $category_colors = array('blue', 'emerald', 'purple', 'orange', 'cyan');
                $cat_index = 0;
                
                foreach ($popular_categories as $category) :
                    $color = $category_colors[$cat_index % count($category_colors)];
                    ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                        <span class="font-semibold group-hover:text-<?php echo esc_attr($color); ?>-500 dark:group-hover:text-<?php echo esc_attr($color); ?>-400"><?php echo esc_html($category->name); ?></span>
                        <span class="text-sm text-gray-500 dark:text-gray-400"><?php echo esc_html($category->count); ?> <?php esc_html_e('articles', 'techpulse'); ?></span>
                    </a>
                    <?php
                    $cat_index++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</aside>

