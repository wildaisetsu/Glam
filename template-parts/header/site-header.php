<header class="ui container site-header">
    
    <input class="side-menu" type="checkbox" id="side-menu"/>

    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>

    <nav class="nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'menu',
            'container' => 'ul',  
            'container_class' => 'nav-menu',
            // 'depth'          => 2,
        ));
        ?>
    </nav>
</header>
