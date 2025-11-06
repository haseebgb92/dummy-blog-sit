<?php
/**
 * The template for displaying category archives
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- Category Header -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
    <div class="container mx-auto px-4 lg:px-6">
        <h1 class="text-4xl lg:text-5xl font-bold font-space-grotesk mb-4"><?php single_cat_title(); ?></h1>
        <?php
        $category_description = category_description();
        if ($category_description) :
            ?>
            <p class="text-xl text-blue-50 max-w-3xl">
                <?php echo wp_kses_post($category_description); ?>
            </p>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- Filters -->
<section class="container mx-auto px-4 lg:px-6 py-8">
    <div class="flex flex-wrap items-center gap-4 mb-8">
        <span class="font-semibold text-gray-700 dark:text-gray-300"><?php esc_html_e('Filter by:', 'techpulse'); ?></span>
        <button class="filter-btn active px-4 py-2 bg-blue-500 text-white rounded-full font-semibold hover:bg-blue-600 transition-colors" data-filter="recent"><?php esc_html_e('Most Recent', 'techpulse'); ?></button>
        <button class="filter-btn px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" data-filter="popular"><?php esc_html_e('Most Popular', 'techpulse'); ?></button>
        <button class="filter-btn px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors" data-filter="editors"><?php esc_html_e('Editor\'s Pick', 'techpulse'); ?></button>
    </div>
    
    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'card');
            endwhile;
        else :
            ?>
            <div class="col-span-full">
                <p class="text-center text-gray-600 dark:text-gray-400 py-12"><?php esc_html_e('No posts found in this category.', 'techpulse'); ?></p>
            </div>
            <?php
        endif;
        ?>
    </div>
    
    <!-- Pagination -->
    <?php
    the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('Previous', 'techpulse'),
        'next_text' => __('Next', 'techpulse'),
    ));
    ?>
</section>

<?php
get_footer();
?>

