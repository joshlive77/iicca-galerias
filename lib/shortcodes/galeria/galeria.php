<?php
// =============================================================================
// 1ER SHORTCODE 
// LISTA DE GALERIAS
// =============================================================================

/**
 * Objero que genera el shortcode de la lsita de galerias
 */
class IiccaGaleriaSc
{
    /**
     * Constructor: Instancia las clases que arman al shortcode
     */
    function __construct()
    {
        // genera el template
        add_shortcode('iicca_galeria_sc', [$this, 'html']);
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
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('tingle_style');
        // wp_enqueue_script('tingle_script');
        wp_enqueue_script('iicca_geleria_main');
    }

    static function styles()
    {
        wp_register_style('iicca_cabecera_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/cabecera.css');
        wp_register_style('iicca_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/galeria.css');
        wp_register_style('tingle_style', plugin_dir_url( __FILE__ ). 'assets/css/tingle.css');
    }

    static function scripts()
    {
        wp_register_script('iicca_geleria_main', plugin_dir_url( __FILE__ ). 'assets/js/main.js', array('jquery'),'1.1', true);
        wp_register_script('tingle_script', plugin_dir_url( __FILE__ ). 'assets/js/tingle.js', array('jquery'),'1.1', true);
    }
}
