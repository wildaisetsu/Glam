<?php
/*
Template Name: Galería
*/
get_header(); ?>

<div class="ui stackable container top-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/gloria-agudelo.svg">
            </div>
            <div class="nine wide column">
                <!-- Contenido adicional si es necesario -->
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui stackable grid text-description">
            <div class="sixteen wide column entry-content" itemprop="mainContentOfPage">
                <?php the_content(); ?>
            </div>

    </div> <!-- Cierra grid text-description -->
</div>

<?php get_footer(); ?>

<?php get_footer(); ?>