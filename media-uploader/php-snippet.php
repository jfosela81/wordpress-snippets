/*
 * Funciones JS para activar el media uploader de WP en nuestra pagina de opciones
 * Puede ser incluido en functions.php o en tu página del plugin
 */
function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('wp-arion-upload', plugins_url().'/my-plugin/js/upload.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('wp-arion-upload');
}

function my_admin_styles() {
    wp_enqueue_style('thickbox');
}

// Solo cargamos los JS si estamos en nuestra página "my_options" creada desde el plugin.
// Cambiar 'my_options' por la página que proceda
if (isset($_GET['page']) && $_GET['page'] == 'my_options') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}
