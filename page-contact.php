<?php
/**
 * Template Name: Contacto
 */
get_header(); ?>

<div class="ui stackable container top-content">
    <div class="ui stackable grid">
        <div class="row">
            <div class="ui seven wide column title-hablemos">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hablemos.svg">
            </div>
            <div class="ui nine wide column">
                <!-- Contenido adicional si es necesario -->
            </div>
        </div>
    </div> <!-- Cierra grid -->

    <div class="ui stackable grid hablemos-form">
        <div class="row">
            <div class="seven wide column">
            <?php the_content(); ?>
            </div>
            <div class="ui nine wide column contact" itemprop="mainContentOfPage">
                <div class="single-form">
                    <?php echo do_shortcode('[contact-form-7 id="aae6ead" title="hablemos"]'); ?>
                </div>
            </div>
        </div>
    </div> <!-- Cierra grid text-description -->
</div>

<?php get_footer(); ?>