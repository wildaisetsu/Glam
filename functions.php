<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'appearance-tools' );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'admin_notices', 'blankslate_notice' );
function blankslate_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_11' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'blankslate' ) . '</big></a>' . wp_kses_post( __( '<big><strong>🏆 Thank you for using BlankSlate!</strong></big>', 'blankslate' ) ) . '<p>' . esc_html__( 'Powering over 10k websites! Buy me a sandwich! 🥪', 'blankslate' ) . '</p><a href="https://github.com/bhadaway/blankslate/issues/57" class="button-primary" target="_blank"><strong>' . esc_html__( 'How do you use BlankSlate?', 'blankslate' ) . '</strong></a> <a href="https://opencollective.com/blankslate" class="button-primary" style="background-color:green;border-color:green" target="_blank"><strong>' . esc_html__( 'Donate', 'blankslate' ) . '</strong></a> <a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" style="background-color:purple;border-color:purple" target="_blank"><strong>' . esc_html__( 'Review', 'blankslate' ) . '</strong></a> <a href="https://github.com/bhadaway/blankslate/issues" class="button-primary" style="background-color:orange;border-color:orange" target="_blank"><strong>' . esc_html__( 'Support', 'blankslate' ) . '</strong></a></p></div>';
}
add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_11', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'blankslate_footer' );
function blankslate_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function blankslate_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
function blankslate_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
function blankslate_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blankslate' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
unset( $sizes['281.664x177.430'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}



// Cargar fuente Abel

function cargar_fuente_abel() {
    // URL de la fuente Abel desde Google Fonts
    wp_enqueue_style('fuente-abel', 'https://fonts.googleapis.com/css2?family=Abel&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'cargar_fuente_abel');

// Registrar ruta de destino de mi compilacion PostCss

function enqueue_theme_assets() {
    // Registrar y encolar Semantic UI (CSS y JS desde el CDN)
    wp_enqueue_style(
        'semantic-ui-css', // Identificador único para el CSS
        'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css', // URL del CDN
        array(), // Dependencias
        '2.4.2' // Versión de Semantic UI
    );

    wp_enqueue_script(
        'semantic-ui-js', // Identificador único para el JS
        'https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js', // URL del CDN
        array('jquery'), // Dependencias (ej. jQuery si es necesario)
        '2.4.2', // Versión de Semantic UI
        true // Cargar en el footer
    );

    // Registrar y encolar el archivo CSS personalizado
    wp_enqueue_style(
        'custom-style', // Identificador único del CSS
        get_template_directory_uri() . '/dest/css/style.css', // Ruta del archivo
        array('semantic-ui-css'), // Dependencia de Semantic UI CSS
        filemtime(get_template_directory() . '/dest/css/style.css') // Versión basada en la última modificación
    );

    // Registrar y encolar el archivo JS personalizado
    wp_enqueue_script(
        'custom-js', // Identificador único del JS
        get_template_directory_uri() . '/dest/js/main.js', // Ruta del archivo
        array('semantic-ui-js'), // Dependencia de Semantic UI JS
        filemtime(get_template_directory() . '/dest/js/main.js'), // Versión basada en la última modificación
        true // Cargar en el footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');



    // Registrar RemixIcon
function agregar_remixicon() {
    // Registrar y cargar el archivo CSS de RemixIcon
    wp_enqueue_style(
        'remixicon', // Nombre del estilo
        'https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css', // URL del archivo RemixIcon
        array(), // Dependencias (vacío si no hay dependencias)
        null // Versión (null para no especificar una versión)
    );
}
add_action('wp_enqueue_scripts', 'agregar_remixicon');


// The proper way to enqueue GSAP script in WordPress

// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/dest/js/app.js', array('gsap-js'), false, true );
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );



function custom_excerpt_length($length) {
    return 12; // Máximo de palabras permitidas
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more) {
    return '...'; // Personaliza el indicador de que hay más contenido
}
add_filter('excerpt_more', 'custom_excerpt_more');




add_image_size('custom-size', 300, 200, true); // Recorte exacto




// Registrar gallery post type

// function crear_cpt_galeria() {
//     $labels = array(
//         'name'               => 'Galería',
//         'singular_name'      => 'Imagen de Galería',
//         'menu_name'          => 'Galería',
//         'name_admin_bar'     => 'Galería',
//         'add_new'            => 'Añadir Nueva Imagen',
//         'add_new_item'       => 'Añadir Nueva Imagen a la Galería',
//         'new_item'           => 'Nueva Imagen',
//         'edit_item'          => 'Editar Imagen',
//         'view_item'          => 'Ver Imagen',
//         'all_items'          => 'Todas las Imágenes',
//         'search_items'       => 'Buscar en Galería',
//         'not_found'          => 'No se encontraron imágenes.',
//     );

//     $args = array(
//         'labels'             => $labels,
//         'public'             => true,
//         'show_in_menu'       => true,
//         'menu_icon'          => 'dashicons-format-gallery',
//         'supports'           => array( 'title', 'thumbnail' ),
//         'has_archive'        => true,
//         'rewrite'            => array( 'slug' => 'galeria' ),
//     );

//     register_post_type( 'galeria', $args );
// }
// add_action( 'init', 'crear_cpt_galeria' );