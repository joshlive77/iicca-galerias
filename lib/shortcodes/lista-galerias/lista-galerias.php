<?php
// =============================================================================
// 1ER SHORTCODE 
// LISTA DE GALERIAS
// =============================================================================

/**
 * Objero que genera el shortcode de la lsita de galerias
 */
class IiccaListaGaleriasSc
{
    /**
     * Constructor: Instancia las clases que arman al shortcode
     */
    function __construct()
    {
        // genera el template
        add_shortcode('iicca_lista_galerias_sc', [$this, 'html']);
        // Carga los estilos css
        add_action('wp_enqueue_scripts', [$this, 'styles']);
        // Carga de scripts
        add_action('wp_enqueue_scripts', [$this, 'scripts']);
    }

    static function data()
    {

    }

    static function wp_bakery_menu()
    {

    }

    static function html()
    {
        // require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera.php';
        // wp_enqueue_style('iicca_cabecera_galeria_style');
        require_once plugin_dir_path( __FILE__ ) . 'templates/galerias.php';
        wp_enqueue_style('iicca_lista_galerias_style');
        // require_once plugin_dir_path( __FILE__ ) . 'templates/galeria.php';
        // wp_enqueue_style('iicca_lista_galeria_style');
    }

    static function styles()
    {
        wp_register_style('iicca_cabecera_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/cabecera.css');
        wp_register_style('iicca_lista_galerias_style', plugin_dir_url( __FILE__ ). 'assets/css/galerias.css');
        wp_register_style('iicca_lista_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/galeria.css');
    }

    static function scripts()
    {
        wp_register_script('iicca_lista_geleria_main', plugin_dir_url( __FILE__ ). 'assets/js/main.js', array('jquery'),'1.1', true);
    }
}
