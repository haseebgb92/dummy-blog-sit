<?php
/**
 * Post Card Template Part
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card group'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="relative overflow-hidden rounded-xl h-56 mb-4">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('techpulse-featured-medium', array('class' => 'w-full h-full object-cover lazy-load group-hover:scale-110 transition-transform duration-500', 'alt' => get_the_title())); ?>
            </a>
            <?php
            $categories = get_the_category();
            if (!empty($categories)) :
                ?>
                <div class="absolute top-3 left-3">
                    <span class="px-3 py-1 bg-blue-500 text-white text-sm font-semibold rounded-full"><?php echo esc_html($categories[0]->name); ?></span>
                </div>
                <?php
            endif;
            ?>
        </div>
    <?php endif; ?>
    
    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
        <span><?php esc_html_e('By', 'techpulse'); ?> <?php the_author(); ?></span>
        <span class="mx-2">•</span>
        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('M j, Y')); ?></time>
    </div>
    
    <h3 class="text-xl font-bold font-space-grotesk mb-3 group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    
    <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
    
    <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-blue-500 hover:text-blue-600 dark:text-blue-400 font-semibold">
        <?php esc_html_e('Read More', 'techpulse'); ?>
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
    </a>
</article>

