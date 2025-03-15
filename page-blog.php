<?php
/*
Template Name: Página de Blog
*/
get_header(); ?>

<div class="ui stackable container blog-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title-blog">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/blog.svg">
            </div>
            <div class="nine wide column">
                <!-- Contenido adicional si es necesario -->
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui three stackable cards">
    <?php include_once get_template_directory() . '/template-parts/pages/page-blog-posts.php';?>
    </div> <!-- Cierra grid text-description -->

    <?php include_once get_template_directory() . '/template-parts/parts/aside-categories.php';?>

</div>

<?php get_footer(); ?>