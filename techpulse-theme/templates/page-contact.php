<?php
/**
 * Template Name: Contact Page
 * 
 * Custom page template for the Contact page
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
    <div class="container mx-auto px-4 lg:px-6 text-center">
        <h1 class="text-5xl lg:text-6xl font-bold font-space-grotesk mb-6"><?php the_title(); ?></h1>
        <?php if (get_the_excerpt()) : ?>
            <p class="text-xl lg:text-2xl text-blue-50 max-w-3xl mx-auto">
                <?php echo esc_html(get_the_excerpt()); ?>
            </p>
        <?php else : ?>
            <p class="text-xl lg:text-2xl text-blue-50 max-w-3xl mx-auto">
                <?php esc_html_e('Have a question, suggestion, or want to collaborate? We\'d love to hear from you.', 'techpulse'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Contact Section -->
<section class="container mx-auto px-4 lg:px-6 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div>
            <h2 class="text-3xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Send us a Message', 'techpulse'); ?></h2>
            
            <?php
            // Check if Contact Form 7 is active
            if (function_exists('wpcf7_contact_form')) {
                // Display Contact Form 7 shortcode if available
                $contact_form_id = get_theme_mod('techpulse_contact_form_id', '');
                if ($contact_form_id) {
                    echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]');
                } else {
                    // Default form
                    ?>
                    <form id="contactForm" class="space-y-6" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <?php wp_nonce_field('techpulse_contact_form', 'techpulse_contact_nonce'); ?>
                        <input type="hidden" name="action" value="techpulse_contact_form">
                        
                        <div>
                            <label for="name" class="block text-sm font-semibold mb-2"><?php esc_html_e('Name', 'techpulse'); ?></label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold mb-2"><?php esc_html_e('Email', 'techpulse'); ?></label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-semibold mb-2"><?php esc_html_e('Subject', 'techpulse'); ?></label>
                            <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-semibold mb-2"><?php esc_html_e('Message', 'techpulse'); ?></label>
                            <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all">
                            <?php esc_html_e('Send Message', 'techpulse'); ?>
                        </button>
                    </form>
                    <?php
                }
            } else {
                // Simple form without Contact Form 7
                ?>
                <form id="contactForm" class="space-y-6" method="post" action="mailto:<?php echo esc_attr(get_theme_mod('techpulse_contact_email', get_option('admin_email'))); ?>">
                    <div>
                        <label for="name" class="block text-sm font-semibold mb-2"><?php esc_html_e('Name', 'techpulse'); ?></label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold mb-2"><?php esc_html_e('Email', 'techpulse'); ?></label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-semibold mb-2"><?php esc_html_e('Subject', 'techpulse'); ?></label>
                        <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-semibold mb-2"><?php esc_html_e('Message', 'techpulse'); ?></label>
                        <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all">
                        <?php esc_html_e('Send Message', 'techpulse'); ?>
                    </button>
                </form>
                <?php
            }
            ?>
        </div>
        
        <!-- Contact Info -->
        <div>
            <h2 class="text-3xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Contact Information', 'techpulse'); ?></h2>
            
            <div class="space-y-6 mb-8">
                <!-- Email -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold mb-1"><?php esc_html_e('Email', 'techpulse'); ?></h3>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('techpulse_contact_email', get_option('admin_email'))); ?>" class="text-blue-500 hover:text-blue-600 dark:text-blue-400">
                            <?php echo esc_html(get_theme_mod('techpulse_contact_email', get_option('admin_email'))); ?>
                        </a>
                    </div>
                </div>
                
                <!-- Location -->
                <div class="flex items-start gap-4">
                    <div class="p-3 bg-emerald-100 dark:bg-emerald-900 rounded-lg">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold mb-1"><?php esc_html_e('Location', 'techpulse'); ?></h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            <?php echo esc_html(get_theme_mod('techpulse_location', __('Dubai, United Arab Emirates', 'techpulse'))); ?>
                        </p>
                    </div>
                </div>
                
                <!-- Phone -->
                <?php
                $phone = get_theme_mod('techpulse_phone', '');
                if ($phone) :
                    ?>
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold mb-1"><?php esc_html_e('Phone', 'techpulse'); ?></h3>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="text-gray-600 dark:text-gray-400 hover:text-blue-500">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            
            <!-- Map Placeholder -->
            <div class="bg-gray-100 dark:bg-gray-800 rounded-2xl h-64 mb-8 flex items-center justify-center">
                <?php
                $map_embed = get_theme_mod('techpulse_map_embed', '');
                if ($map_embed) {
                    echo wp_kses_post($map_embed);
                } else {
                    ?>
                    <div class="text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400"><?php esc_html_e('Map placeholder for location', 'techpulse'); ?></p>
                        <p class="text-sm text-gray-400 dark:text-gray-500 mt-2"><?php esc_html_e('(Integrate Google Maps or Mapbox in Customizer)', 'techpulse'); ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <!-- Social Links -->
            <div>
                <h3 class="font-bold mb-4"><?php esc_html_e('Follow Us', 'techpulse'); ?></h3>
                <div class="flex items-center space-x-4">
                    <?php
                    $social_links = array(
                        'twitter' => get_theme_mod('techpulse_twitter_url', ''),
                        'linkedin' => get_theme_mod('techpulse_linkedin_url', ''),
                        'instagram' => get_theme_mod('techpulse_instagram_url', ''),
                        'facebook' => get_theme_mod('techpulse_facebook_url', ''),
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
                    
                    if ($social_links['facebook']) :
                        ?>
                        <a href="<?php echo esc_url($social_links['facebook']); ?>" class="social-icon" aria-label="Facebook" target="_blank" rel="noopener noreferrer">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>



