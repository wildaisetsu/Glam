<div class="ui divider division"></div>

<aside>
        <h2>
            Categorías
        </h2>

        <?php
            $categories = get_categories();
            if (!empty($categories)) {
                echo '<div class="category-list">';
                
                $category_links = array();
                
                foreach ($categories as $category) {
                    $category_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                }
                echo implode(' ・ ', $category_links); // Une las categorías con comas
                echo '</div>';
            }
        ?>

    </aside>