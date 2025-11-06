<?php
/**
 * Template Name: About Page
 * 
 * Custom page template for the About page
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-20">
    <div class="container mx-auto px-4 lg:px-6 text-center">
        <h1 class="text-5xl lg:text-6xl font-bold font-space-grotesk mb-6"><?php the_title(); ?></h1>
        <?php if (get_the_excerpt()) : ?>
            <p class="text-xl lg:text-2xl text-blue-50 max-w-3xl mx-auto">
                <?php echo esc_html(get_the_excerpt()); ?>
            </p>
        <?php else : ?>
            <p class="text-xl lg:text-2xl text-blue-50 max-w-3xl mx-auto">
                <?php esc_html_e('Empowering readers to stay ahead in AI, tech, and innovation', 'techpulse'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Mission Statement -->
<section class="container mx-auto px-4 lg:px-6 py-16">
    <div class="max-w-4xl mx-auto">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
        
        <?php if (!get_the_content()) : ?>
            <!-- Default Content if page is empty -->
            <h2 class="text-4xl font-bold font-space-grotesk mb-8 text-center"><?php esc_html_e('Our Mission', 'techpulse'); ?></h2>
            <p class="text-xl text-gray-700 dark:text-gray-300 leading-relaxed mb-6 text-center">
                <?php echo esc_html(get_bloginfo('name')); ?> <?php esc_html_e('is your trusted source for cutting-edge insights into artificial intelligence, technology innovations, and startup ecosystems. Founded in the UAE, we\'re dedicated to empowering readers with expert analysis, in-depth reviews, and the latest trends shaping the future of tech.', 'techpulse'); ?>
            </p>
            <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed text-center">
                <?php esc_html_e('We believe that staying informed about technology is essential in today\'s rapidly evolving digital landscape. Our mission is to make complex tech topics accessible, provide actionable insights, and connect our readers with the innovations that matter most.', 'techpulse'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Team Section -->
<section class="bg-gray-50 dark:bg-gray-800/50 py-16">
    <div class="container mx-auto px-4 lg:px-6">
        <h2 class="text-4xl font-bold font-space-grotesk mb-12 text-center"><?php esc_html_e('Meet Our Team', 'techpulse'); ?></h2>
        
        <div class="max-w-4xl mx-auto">
            <!-- Founder/Editor -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 lg:p-12 flex flex-col lg:flex-row items-center gap-8 mb-12">
                <div class="flex-shrink-0">
                    <?php
                    $founder_image = get_theme_mod('techpulse_founder_image', '');
                    if ($founder_image) {
                        echo wp_get_attachment_image($founder_image, 'medium', false, array('class' => 'w-48 h-48 rounded-full object-cover border-4 border-blue-500'));
                    } else {
                        echo '<div class="w-48 h-48 rounded-full bg-gradient-to-r from-blue-500 to-emerald-500 flex items-center justify-center text-white text-4xl font-bold">' . substr(get_bloginfo('name'), 0, 1) . '</div>';
                    }
                    ?>
                </div>
                <div class="text-center lg:text-left">
                    <h3 class="text-3xl font-bold font-space-grotesk mb-4">
                        <?php echo esc_html(get_theme_mod('techpulse_founder_name', get_bloginfo('name') . ' ' . __('Team', 'techpulse'))); ?>
                    </h3>
                    <p class="text-xl text-blue-500 mb-4">
                        <?php echo esc_html(get_theme_mod('techpulse_founder_title', __('Founder & Editor-in-Chief', 'techpulse'))); ?>
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                        <?php echo esc_html(get_theme_mod('techpulse_founder_bio', __('With extensive experience in technology journalism and AI research, we\'re dedicated to bridging the gap between complex technological innovations and everyday understanding.', 'techpulse'))); ?>
                    </p>
                    <div class="flex items-center justify-center lg:justify-start space-x-4">
                        <?php
                        $social_links = array(
                            'twitter' => get_theme_mod('techpulse_twitter_url', ''),
                            'linkedin' => get_theme_mod('techpulse_linkedin_url', ''),
                            'instagram' => get_theme_mod('techpulse_instagram_url', ''),
                        );
                        
                        if ($social_links['twitter']) :
                            ?>
                            <a href="<?php echo esc_url($social_links['twitter']); ?>" class="social-icon" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                            </a>
                            <?php
                        endif;
                        
                        if ($social_links['linkedin']) :
                            ?>
                            <a href="<?php echo esc_url($social_links['linkedin']); ?>" class="social-icon" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                            </a>
                            <?php
                        endif;
                        
                        if ($social_links['instagram']) :
                            ?>
                            <a href="<?php echo esc_url($social_links['instagram']); ?>" class="social-icon" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Contributing Authors -->
            <?php
            // Get authors with published posts
            $authors = get_users(array(
                'has_published_posts' => array('post'),
                'number' => 3,
            ));
            
            if (!empty($authors)) :
                ?>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                    <?php
                    $colors = array('emerald', 'purple', 'orange');
                    $i = 0;
                    foreach ($authors as $author) :
                        $color = $colors[$i % 3];
                        ?>
                        <div class="text-center">
                            <?php echo get_avatar($author->ID, 128, '', '', array('class' => 'w-32 h-32 rounded-full object-cover mx-auto mb-4 border-4 border-' . $color . '-500')); ?>
                            <h4 class="text-xl font-bold font-space-grotesk mb-2"><?php echo esc_html($author->display_name); ?></h4>
                            <p class="text-<?php echo esc_attr($color); ?>-500 mb-2">
                                <?php
                                $author_role = get_user_meta($author->ID, 'author_role', true);
                                echo $author_role ? esc_html($author_role) : esc_html__('Contributing Writer', 'techpulse');
                                ?>
                            </p>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">
                                <?php
                                $author_specialty = get_user_meta($author->ID, 'author_specialty', true);
                                echo $author_specialty ? esc_html($author_specialty) : esc_html__('Tech Writer', 'techpulse');
                                ?>
                            </p>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="container mx-auto px-4 lg:px-6 py-16">
    <div class="max-w-4xl mx-auto text-center bg-gradient-to-r from-blue-500 to-emerald-500 rounded-3xl p-12 text-white">
        <h2 class="text-3xl lg:text-4xl font-bold font-space-grotesk mb-4"><?php esc_html_e('Join Our Community', 'techpulse'); ?></h2>
        <p class="text-lg text-blue-50 mb-8"><?php esc_html_e('Follow us on social media for daily tech updates, exclusive content, and community discussions.', 'techpulse'); ?></p>
        <div class="flex items-center justify-center space-x-6">
            <?php
            $social_links = array(
                'twitter' => get_theme_mod('techpulse_twitter_url', ''),
                'linkedin' => get_theme_mod('techpulse_linkedin_url', ''),
                'instagram' => get_theme_mod('techpulse_instagram_url', ''),
                'facebook' => get_theme_mod('techpulse_facebook_url', ''),
            );
            
            if ($social_links['twitter']) :
                ?>
                <a href="<?php echo esc_url($social_links['twitter']); ?>" class="social-icon-large" aria-label="Twitter" target="_blank" rel="noopener noreferrer">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                </a>
                <?php
            endif;
            
            if ($social_links['linkedin']) :
                ?>
                <a href="<?php echo esc_url($social_links['linkedin']); ?>" class="social-icon-large" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                        <circle cx="4" cy="4" r="2"></circle>
                    </svg>
                </a>
                <?php
            endif;
            
            if ($social_links['instagram']) :
                ?>
                <a href="<?php echo esc_url($social_links['instagram']); ?>" class="social-icon-large" aria-label="Instagram" target="_blank" rel="noopener noreferrer">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <?php
            endif;
            
            if ($social_links['facebook']) :
                ?>
                <a href="<?php echo esc_url($social_links['facebook']); ?>" class="social-icon-large" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <?php
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>



