<?php
/*
Template Name: post por fecha
*/
get_header(); ?>

<div class="ui stackable container post-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title-blog">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/fecha.svg">
            </div>
            <div class="ui nine wide column type-post">
                <!-- Contenido adicional si es necesario -->
                <?php echo '<h2 class="post-date">' . get_the_date() . '</h2>'; ?>
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui three stackable cards">
    <?php include_once get_template_directory() . '/template-parts/pages/page-date.php';?>
    </div> <!-- Cierra grid text-description -->

    <?php include_once get_template_directory() . '/template-parts/parts/aside-categories.php';?>
    
</div>

<?php get_footer(); ?>