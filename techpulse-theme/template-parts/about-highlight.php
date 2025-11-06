<?php
/**
 * About Highlight Section
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<!-- Featured Author / About Highlight -->
<section class="container mx-auto px-4 lg:px-6 py-12">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 lg:p-12 flex flex-col lg:flex-row items-center gap-8">
            <div class="flex-shrink-0">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                if ($custom_logo_id) {
                    echo wp_get_attachment_image($custom_logo_id, 'medium', false, array('class' => 'w-32 h-32 rounded-full object-cover border-4 border-blue-500'));
                } else {
                    echo '<div class="w-32 h-32 rounded-full bg-gradient-to-r from-blue-500 to-emerald-500 flex items-center justify-center text-white text-2xl font-bold">' . substr(get_bloginfo('name'), 0, 1) . '</div>';
                }
                ?>
            </div>
            <div class="text-center lg:text-left">
                <h2 class="text-2xl font-bold font-space-grotesk mb-3"><?php esc_html_e('About', 'techpulse'); ?> <?php echo esc_html(get_bloginfo('name')); ?></h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                    <?php echo esc_html(get_bloginfo('description')); ?>
                </p>
                <div class="flex items-center justify-center lg:justify-start space-x-4">
                    <?php
                    // Add social media links here or via customizer
                    $social_links = array(
                        'twitter'   => get_theme_mod('techpulse_twitter_url', ''),
                        'linkedin'  => get_theme_mod('techpulse_linkedin_url', ''),
                        'instagram' => get_theme_mod('techpulse_instagram_url', ''),
                    );
                    
                    foreach ($social_links as $platform => $url) {
                        if ($url) {
                            echo '<a href="' . esc_url($url) . '" class="social-icon" aria-label="' . esc_attr(ucfirst($platform)) . '" target="_blank" rel="noopener noreferrer">';
                            // SVG icons would go here
                            echo '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

