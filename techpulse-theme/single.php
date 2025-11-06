<?php
/**
 * The template for displaying single posts
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
        techpulse_set_post_views(get_the_ID());
        ?>
        
        <!-- Breadcrumbs -->
        <nav class="container mx-auto px-4 lg:px-6 py-4 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-gray-500 dark:text-gray-400">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-blue-500 dark:hover:text-blue-400"><?php esc_html_e('Home', 'techpulse'); ?></a></li>
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                    ?>
                    <li><span>/</span></li>
                    <li><a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="hover:text-blue-500 dark:hover:text-blue-400"><?php echo esc_html($categories[0]->name); ?></a></li>
                    <?php
                endif;
                ?>
                <li><span>/</span></li>
                <li class="text-gray-900 dark:text-gray-100"><?php the_title(); ?></li>
            </ol>
        </nav>
        
        <!-- Main Content -->
        <div class="container mx-auto px-4 lg:px-6 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Article Content -->
                <article class="lg:col-span-2">
                    <!-- Hero Image -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="relative overflow-hidden rounded-2xl h-96 mb-8">
                            <?php the_post_thumbnail('techpulse-featured-large', array('class' => 'w-full h-full object-cover lazy-load', 'alt' => get_the_title())); ?>
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                                ?>
                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-full"><?php echo esc_html($categories[0]->name); ?></span>
                                </div>
                                <?php
                            endif;
                            ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Article Header -->
                    <header class="mb-8">
                        <h1 class="text-4xl lg:text-5xl font-bold font-space-grotesk mb-4 leading-tight"><?php the_title(); ?></h1>
                        
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                            <div class="flex items-center gap-2">
                                <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', array('class' => 'w-10 h-10 rounded-full object-cover')); ?>
                                <span class="font-semibold text-gray-900 dark:text-gray-100"><?php the_author(); ?></span>
                            </div>
                            <span>•</span>
                            <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <span>•</span>
                            <span><?php echo esc_html(techpulse_get_reading_time()); ?> <?php esc_html_e('min read', 'techpulse'); ?></span>
                            <span>•</span>
                            <span><?php echo esc_html(techpulse_get_post_views()); ?> <?php esc_html_e('views', 'techpulse'); ?></span>
                        </div>
                        
                        <!-- Social Share Buttons -->
                        <div class="flex items-center gap-4 pt-6 border-t border-gray-200 dark:border-gray-800">
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300"><?php esc_html_e('Share:', 'techpulse'); ?></span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-share-btn" aria-label="<?php esc_attr_e('Share on Facebook', 'techpulse'); ?>">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="social-share-btn" aria-label="<?php esc_attr_e('Share on Twitter', 'techpulse'); ?>">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="social-share-btn" aria-label="<?php esc_attr_e('Share on WhatsApp', 'techpulse'); ?>">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="social-share-btn" aria-label="<?php esc_attr_e('Share on LinkedIn', 'techpulse'); ?>">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                            </a>
                        </div>
                    </header>
                    
                    <!-- Article Body -->
                    <div class="prose prose-lg dark:prose-invert max-w-none mb-12">
                        <?php the_content(); ?>
                    </div>
                    
                    <!-- Tags -->
                    <?php
                    $tags = get_the_tags();
                    if ($tags) :
                        ?>
                        <div class="flex flex-wrap gap-2 mb-12">
                            <?php foreach ($tags as $tag) : ?>
                                <span class="px-4 py-2 bg-gray-100 dark:bg-gray-800 rounded-full text-sm font-semibold">#<?php echo esc_html($tag->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php
                    endif;
                    ?>
                    
                    <!-- Author Box -->
                    <?php get_template_part('template-parts/author', 'box'); ?>
                    
                    <!-- Comments Section -->
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                    
                    <!-- Related Posts -->
                    <?php get_template_part('template-parts/related', 'posts'); ?>
                    
                </article>
                
                <!-- Sidebar -->
                <?php get_sidebar('trending'); ?>
                
            </div>
        </div>
        
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
?>

