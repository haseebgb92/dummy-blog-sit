<?php
/**
 * Template Name: Write for Us Page
 * 
 * Custom page template for the Write for Us page
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
                <?php esc_html_e('Share your expertise and insights with our tech-savvy audience', 'techpulse'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Guidelines Section -->
<section class="container mx-auto px-4 lg:px-6 py-16">
    <div class="max-w-4xl mx-auto">
        <!-- Page Content -->
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <div class="prose prose-lg dark:prose-invert max-w-none mb-12">
                    <?php the_content(); ?>
                </div>
                <?php
            endwhile;
        endif;
        ?>
        
        <!-- Default Guidelines if page is empty -->
        <?php if (!get_the_content()) : ?>
            <div class="mb-12">
                <h2 class="text-3xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Submission Guidelines', 'techpulse'); ?></h2>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <p class="mb-4">
                        <?php esc_html_e('We welcome guest contributors who are passionate about technology, AI, innovation, and startups. If you have expertise in these areas and want to share your insights with our readers, we\'d love to hear from you.', 'techpulse'); ?>
                    </p>
                    
                    <h3 class="text-2xl font-bold font-space-grotesk mt-8 mb-4"><?php esc_html_e('What We\'re Looking For', 'techpulse'); ?></h3>
                    <ul class="list-disc pl-6 space-y-2 mb-6">
                        <li><?php esc_html_e('Original, well-researched articles on AI, technology, startups, gadgets, or innovation', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Articles between 1,000-2,500 words', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Unique perspectives and actionable insights', 'techpulse'); ?></li>
                        <li><?php esc_html_e('High-quality content with proper citations and references', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Articles that haven\'t been published elsewhere', 'techpulse'); ?></li>
                    </ul>
                    
                    <h3 class="text-2xl font-bold font-space-grotesk mt-8 mb-4"><?php esc_html_e('Topics We Cover', 'techpulse'); ?></h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <h4 class="font-bold mb-2">🤖 <?php esc_html_e('Artificial Intelligence', 'techpulse'); ?></h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><?php esc_html_e('Machine learning, deep learning, AI applications', 'techpulse'); ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <h4 class="font-bold mb-2">🚀 <?php esc_html_e('Startups & Innovation', 'techpulse'); ?></h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><?php esc_html_e('Tech startups, funding, entrepreneurship', 'techpulse'); ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <h4 class="font-bold mb-2">📱 <?php esc_html_e('Gadgets & Reviews', 'techpulse'); ?></h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><?php esc_html_e('Product reviews, tech gadgets, devices', 'techpulse'); ?></p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <h4 class="font-bold mb-2">🔬 <?php esc_html_e('Emerging Technologies', 'techpulse'); ?></h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><?php esc_html_e('Blockchain, quantum computing, AR/VR', 'techpulse'); ?></p>
                        </div>
                    </div>
                    
                    <h3 class="text-2xl font-bold font-space-grotesk mt-8 mb-4"><?php esc_html_e('Content Requirements', 'techpulse'); ?></h3>
                    <ul class="list-disc pl-6 space-y-2 mb-6">
                        <li><?php esc_html_e('Articles must be original and not published elsewhere', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Include relevant images (with proper attribution or free-to-use)', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Use proper heading hierarchy (H2, H3, etc.)', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Include at least 3-5 external links to authoritative sources', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Ensure proper grammar and spelling', 'techpulse'); ?></li>
                        <li><?php esc_html_e('Include a brief author bio (50-100 words)', 'techpulse'); ?></li>
                    </ul>
                    
                    <h3 class="text-2xl font-bold font-space-grotesk mt-8 mb-4"><?php esc_html_e('What to Expect', 'techpulse'); ?></h3>
                    <ul class="list-disc pl-6 space-y-2 mb-6">
                        <li><?php esc_html_e('We review all submissions within 5-7 business days', 'techpulse'); ?></li>
                        <li><?php esc_html_e('We may request edits or revisions before publication', 'techpulse'); ?></li>
                        <li><?php esc_html_e('You\'ll receive credit as the author with a bio and social links', 'techpulse'); ?></li>
                        <li><?php esc_html_e('We reserve the right to edit for clarity, grammar, and SEO', 'techpulse'); ?></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <!-- Submission Form -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 lg:p-12">
                <h2 class="text-3xl font-bold font-space-grotesk mb-6"><?php esc_html_e('Submit Your Article', 'techpulse'); ?></h2>
                
                <?php
                // Check if Contact Form 7 is active
                if (function_exists('wpcf7_contact_form')) {
                    $submission_form_id = get_theme_mod('techpulse_submission_form_id', '');
                    if ($submission_form_id) {
                        echo do_shortcode('[contact-form-7 id="' . esc_attr($submission_form_id) . '"]');
                    } else {
                        // Default form
                        ?>
                        <form id="submissionForm" class="space-y-6" method="post" action="mailto:<?php echo esc_attr(get_theme_mod('techpulse_contact_email', get_option('admin_email'))); ?>">
                            <div>
                                <label for="authorName" class="block text-sm font-semibold mb-2"><?php esc_html_e('Your Name', 'techpulse'); ?></label>
                                <input type="text" id="authorName" name="authorName" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="authorEmail" class="block text-sm font-semibold mb-2"><?php esc_html_e('Email Address', 'techpulse'); ?></label>
                                <input type="email" id="authorEmail" name="authorEmail" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="authorBio" class="block text-sm font-semibold mb-2"><?php esc_html_e('Author Bio (50-100 words)', 'techpulse'); ?></label>
                                <textarea id="authorBio" name="authorBio" rows="3" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                            </div>
                            <div>
                                <label for="articleTitle" class="block text-sm font-semibold mb-2"><?php esc_html_e('Article Title', 'techpulse'); ?></label>
                                <input type="text" id="articleTitle" name="articleTitle" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="articleCategory" class="block text-sm font-semibold mb-2"><?php esc_html_e('Category', 'techpulse'); ?></label>
                                <select id="articleCategory" name="articleCategory" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value=""><?php esc_html_e('Select a category', 'techpulse'); ?></option>
                                    <?php
                                    $categories = get_categories();
                                    foreach ($categories as $category) {
                                        echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="articleContent" class="block text-sm font-semibold mb-2"><?php esc_html_e('Article Content', 'techpulse'); ?></label>
                                <textarea id="articleContent" name="articleContent" rows="12" required placeholder="<?php esc_attr_e('Paste your article content here (1,000-2,500 words)...', 'techpulse'); ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                            </div>
                            <div>
                                <label for="articleLinks" class="block text-sm font-semibold mb-2"><?php esc_html_e('Reference Links (one per line)', 'techpulse'); ?></label>
                                <textarea id="articleLinks" name="articleLinks" rows="4" placeholder="https://example.com/source1&#10;https://example.com/source2" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                            </div>
                            <div class="flex items-start">
                                <input type="checkbox" id="agreeTerms" name="agreeTerms" required class="mt-1 mr-3">
                                <label for="agreeTerms" class="text-sm text-gray-600 dark:text-gray-400">
                                    <?php esc_html_e('I confirm that this article is original, hasn\'t been published elsewhere, and I grant', 'techpulse'); ?> <?php echo esc_html(get_bloginfo('name')); ?> <?php esc_html_e('the right to edit and publish it.', 'techpulse'); ?>
                                </label>
                            </div>
                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all">
                                <?php esc_html_e('Submit Article', 'techpulse'); ?>
                            </button>
                        </form>
                        <?php
                    }
                } else {
                    // Simple form without Contact Form 7
                    ?>
                    <form id="submissionForm" class="space-y-6" method="post" action="mailto:<?php echo esc_attr(get_theme_mod('techpulse_contact_email', get_option('admin_email'))); ?>">
                        <div>
                            <label for="authorName" class="block text-sm font-semibold mb-2"><?php esc_html_e('Your Name', 'techpulse'); ?></label>
                            <input type="text" id="authorName" name="authorName" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="authorEmail" class="block text-sm font-semibold mb-2"><?php esc_html_e('Email Address', 'techpulse'); ?></label>
                            <input type="email" id="authorEmail" name="authorEmail" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="authorBio" class="block text-sm font-semibold mb-2"><?php esc_html_e('Author Bio (50-100 words)', 'techpulse'); ?></label>
                            <textarea id="authorBio" name="authorBio" rows="3" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                        </div>
                        <div>
                            <label for="articleTitle" class="block text-sm font-semibold mb-2"><?php esc_html_e('Article Title', 'techpulse'); ?></label>
                            <input type="text" id="articleTitle" name="articleTitle" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="articleCategory" class="block text-sm font-semibold mb-2"><?php esc_html_e('Category', 'techpulse'); ?></label>
                            <select id="articleCategory" name="articleCategory" required class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value=""><?php esc_html_e('Select a category', 'techpulse'); ?></option>
                                <?php
                                $categories = get_categories();
                                foreach ($categories as $category) {
                                    echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="articleContent" class="block text-sm font-semibold mb-2"><?php esc_html_e('Article Content', 'techpulse'); ?></label>
                            <textarea id="articleContent" name="articleContent" rows="12" required placeholder="<?php esc_attr_e('Paste your article content here (1,000-2,500 words)...', 'techpulse'); ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                        </div>
                        <div>
                            <label for="articleLinks" class="block text-sm font-semibold mb-2"><?php esc_html_e('Reference Links (one per line)', 'techpulse'); ?></label>
                            <textarea id="articleLinks" name="articleLinks" rows="4" placeholder="https://example.com/source1&#10;https://example.com/source2" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                        </div>
                        <div class="flex items-start">
                            <input type="checkbox" id="agreeTerms" name="agreeTerms" required class="mt-1 mr-3">
                            <label for="agreeTerms" class="text-sm text-gray-600 dark:text-gray-400">
                                <?php esc_html_e('I confirm that this article is original, hasn\'t been published elsewhere, and I grant', 'techpulse'); ?> <?php echo esc_html(get_bloginfo('name')); ?> <?php esc_html_e('the right to edit and publish it.', 'techpulse'); ?>
                            </label>
                        </div>
                        <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-emerald-500 text-white font-semibold rounded-lg hover:shadow-lg transition-all">
                            <?php esc_html_e('Submit Article', 'techpulse'); ?>
                        </button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

<?php
get_footer();
?>



