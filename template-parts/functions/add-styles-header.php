
<?php

function my_custom_menu_classes($classes, $item, $args) {
    // Agregar clase personalizada al <li>
    $classes[] = 'mi-clase-li'; // Cambia 'mi-clase-li' por el nombre de tu clase

    // Verifica si el menú es el que deseas modificar
    if( $args->theme_location == 'primary' ) { // Cambia 'primary' según sea necesario
        $classes[] = 'custom-class'; // Otra clase para <li>
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'my_custom_menu_classes', 10, 3);
