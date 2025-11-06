<?php
/**
 * The main template file
 *
 * @package TechPulse
 * @since 1.0.0
 */

get_header();
?>

<main id="main-content" class="site-main">
    <!-- Main Content with Sidebar -->
    <div class="container mx-auto px-4 lg:px-6 py-12 lg:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Content Area -->
            <div class="lg:col-span-3 space-y-12">
                
                <?php get_template_part('template-parts/hero', 'featured'); ?>
                
                <?php get_template_part('template-parts/trending', 'posts'); ?>
                
                <?php get_template_part('template-parts/latest', 'posts'); ?>
                
                <?php get_template_part('template-parts/category', 'ai'); ?>
                
                <?php get_template_part('template-parts/category', 'gadgets'); ?>
                
                <?php get_template_part('template-parts/category', 'startups'); ?>
                
                <?php get_template_part('template-parts/category', 'reviews'); ?>
                
                <?php get_template_part('template-parts/category', 'robotics'); ?>
                
            </div>
            
            <?php get_sidebar('trending'); ?>
            
        </div>
    </div>
    
    <?php get_template_part('template-parts/newsletter', 'section'); ?>
    
    <?php get_template_part('template-parts/about', 'highlight'); ?>
    
</main>

<?php
get_footer();
?>

