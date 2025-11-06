<?php
/**
 * The template for displaying all pages
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <!-- Page Header -->
        <section class="bg-gradient-to-r from-blue-500 to-emerald-500 text-white py-16">
            <div class="container mx-auto px-4 lg:px-6 text-center">
                <h1 class="text-5xl lg:text-6xl font-bold font-space-grotesk mb-6"><?php the_title(); ?></h1>
            </div>
        </section>
        
        <!-- Page Content -->
        <section class="container mx-auto px-4 lg:px-6 py-12">
            <div class="max-w-4xl mx-auto prose prose-lg dark:prose-invert">
                <?php the_content(); ?>
            </div>
        </section>
        
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            ?>
            <section class="container mx-auto px-4 lg:px-6 py-12">
                <div class="max-w-4xl mx-auto">
                    <?php comments_template(); ?>
                </div>
            </section>
            <?php
        endif;
        
    endwhile;
    ?>
</main>

<?php
get_footer();
?>

