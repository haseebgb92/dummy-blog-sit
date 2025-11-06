<?php
/**
 * Author Box Template Part
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<!-- Author Box -->
<div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 mb-12">
    <div class="flex items-start gap-6">
        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'w-20 h-20 rounded-full object-cover border-4 border-blue-500')); ?>
        <div>
            <h3 class="text-2xl font-bold font-space-grotesk mb-2"><?php the_author(); ?></h3>
            <?php
            $author_description = get_the_author_meta('description');
            if ($author_description) :
                ?>
                <p class="text-gray-600 dark:text-gray-300 mb-4">
                    <?php echo wp_kses_post($author_description); ?>
                </p>
                <?php
            endif;
            ?>
            <div class="flex items-center gap-4">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 font-semibold">
                    <?php esc_html_e('View All Posts', 'techpulse'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

