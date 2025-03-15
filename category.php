<?php
/*
Template Name: Post por categoria
*/
get_header(); ?>

<div class="ui stackable container post-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title-blog">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/categoria.svg">
            </div>
            <div class="ui nine wide column type-post">
                <!-- Contenido adicional si es necesario -->
                <?php
                $category = get_queried_object(); // Obtiene la categoría actual desde la URL

                if ($category && isset($category->term_id)) {
                    echo '<h2 class="post-category">' . esc_html($category->name) . '</h2>';
                }
                ?>
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui three stackable cards">
    <?php include_once get_template_directory() . '/template-parts/pages/page-category.php';?>
    </div> <!-- Cierra grid text-description -->
    
    <?php include_once get_template_directory() . '/template-parts/parts/aside-categories.php';?>

</div>

<?php get_footer(); ?>