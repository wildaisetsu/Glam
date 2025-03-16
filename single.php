<?php get_header(); ?>

    <div class="ui container blog-single">
        <main id="primary" class="site-main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="info-single">
                        <p class="post-meta">
                            <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>">
                                <?php echo get_the_date(); ?>
                            </a>
                        </p>
                        <p class="post-category">
                            <?php the_category(', '); ?>
                        </p>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                
                <footer class="entry-footer">

            </footer>
            </article>
        <?php endwhile; endif; ?>
    </main> 
    
    <?php include_once get_template_directory() . '/template-parts/parts/aside-categories.php';?>

</div>


<?php get_footer(); ?>