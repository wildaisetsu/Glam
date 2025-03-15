
        
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>




<div class="ui container">
        <div class="ui grid">
            <!-- Primera fila -->
            <div class="two column row">
                <div class="column">
                    <div class="ui segment">
                    <?php the_post_thumbnail('medium', ['class' => 'img-responsive', 'alt' => get_the_title()]); ?> 

                    </div>
                </div>
                <div class="column">
                    <div class="ui segment">

                    </div>
                </div>
            </div>
            
            <!-- Segunda fila -->
            <div class="two column row">
                <div class="ten wide column">
                    <div class="ui segment">

                    </div>
                </div>
                <div class="six wide column">
                    <div class="ui segment">

                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No hay publicaciones disponibles.</p>';
        endif;
        ?>


        
