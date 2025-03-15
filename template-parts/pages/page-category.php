
        
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'cat'           => $category->term_id, // Filtra por la categoría actual
        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
            <div class="card">
                <div class="extra">
                    <!-- Post Header -->
                    <p class="post-meta">                            
                        <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>">
                            <?php echo get_the_date(); ?>
                        </a>
                    </p>

                    <p class="post-category">
                        <?php the_category(',&nbsp;'); ?>
                    </p>
                    
                </div>
                <a class="image" href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail"> 
                            <?php the_post_thumbnail('medium', ['class' => 'img-responsive', 'alt' => get_the_title()]); ?> 
                        </div>
                    <?php endif; ?>
                </a>
                <div class="content">
                    <h2 class=""> <?php the_title(); ?> </h2>
                    <p class=""> <?php echo get_the_excerpt(); ?> </p>
                </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No hay publicaciones disponibles.</p>';
        endif;
        ?>


        
