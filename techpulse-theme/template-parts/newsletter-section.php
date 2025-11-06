<?php
/**
 * Newsletter Subscription Section
 *
 * @package TechPulse
 * @since 1.0.0
 */
?>

<!-- Newsletter Subscription Section -->
<section class="container mx-auto px-4 lg:px-6 py-16">
    <div class="max-w-3xl mx-auto text-center bg-gradient-to-r from-blue-500 to-emerald-500 rounded-3xl p-8 lg:p-12 text-white">
        <h2 class="text-3xl lg:text-4xl font-bold font-space-grotesk mb-4"><?php esc_html_e('Stay Ahead of AI & Tech Trends', 'techpulse'); ?></h2>
        <p class="text-lg mb-8 text-blue-50"><?php esc_html_e('Get weekly insights, exclusive articles, and the latest tech news delivered to your inbox.', 'techpulse'); ?></p>
        
        <?php
        if (function_exists('mc4wp_show_form')) {
            mc4wp_show_form();
        } else {
            ?>
            <form id="newsletterForm" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto" method="post" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="email" name="email" placeholder="<?php esc_attr_e('Enter your email address', 'techpulse'); ?>" required class="flex-1 px-6 py-4 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-white">
                <button type="submit" class="px-8 py-4 bg-white text-blue-500 font-semibold rounded-full hover:bg-gray-100 transition-colors">
                    <?php esc_html_e('Subscribe', 'techpulse'); ?>
                </button>
            </form>
            <p class="text-sm text-blue-50 mt-4"><?php esc_html_e('We respect your privacy. Unsubscribe at any time.', 'techpulse'); ?></p>
            <?php
        }
        ?>
    </div>
</section>

