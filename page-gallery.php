<?php
/*
Template Name: Galería
*/
get_header(); ?>

<div class="ui stackable container top-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/visual.svg">
            </div>
            <div class="nine wide column">
                <!-- Contenido adicional si es necesario -->
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui container">

                <?php the_content(); ?>

    </div> <!-- Cierra grid text-description -->
</div>


<?php get_footer(); ?>