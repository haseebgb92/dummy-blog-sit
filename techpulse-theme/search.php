<?php
/**
 * The template for displaying search results
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- Search Header -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
    <div class="container mx-auto px-4 lg:px-6">
        <h1 class="text-4xl lg:text-5xl font-bold font-space-grotesk mb-4">
            <?php
            printf(
                esc_html__('Search Results for: %s', 'techpulse'),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </div>
</section>

<!-- Search Results -->
<section class="container mx-auto px-4 lg:px-6 py-12">
    <?php
    if (have_posts()) :
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'card');
            endwhile;
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
        <?php
    else :
        ?>
        <div class="max-w-2xl mx-auto text-center py-12">
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-6"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'techpulse'); ?></p>
            <?php get_search_form(); ?>
        </div>
        <?php
    endif;
    ?>
</section>

<?php
get_footer();
?>

