<?php
/**
 * The template for displaying archive pages
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<!-- Archive Header -->
<section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
    <div class="container mx-auto px-4 lg:px-6">
        <h1 class="text-4xl lg:text-5xl font-bold font-space-grotesk mb-4">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                the_author();
            } elseif (is_date()) {
                if (is_year()) {
                    echo get_the_date('Y');
                } elseif (is_month()) {
                    echo get_the_date('F Y');
                } elseif (is_day()) {
                    echo get_the_date();
                }
            } else {
                esc_html_e('Archives', 'techpulse');
            }
            ?>
        </h1>
        <?php
        $description = get_the_archive_description();
        if ($description) :
            ?>
            <p class="text-xl text-blue-50 max-w-3xl"><?php echo wp_kses_post($description); ?></p>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- Archive Content -->
<section class="container mx-auto px-4 lg:px-6 py-12">
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
                <p class="text-center text-gray-600 dark:text-gray-400 py-12"><?php esc_html_e('No posts found.', 'techpulse'); ?></p>
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

