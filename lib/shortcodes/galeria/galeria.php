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
        add_shortcode('iicca_galeria_sc1', [$this, 'html1']);
        add_shortcode('iicca_galeria_sc2', [$this, 'html2']);
        add_shortcode('iicca_galeria_sc3', [$this, 'html3']);
        add_shortcode('iicca_galeria_sc4', [$this, 'html4']);
        add_shortcode('iicca_galeria_sc5', [$this, 'html5']);
        add_shortcode('iicca_galeria_sc6', [$this, 'html6']);
        add_shortcode('iicca_galeria_sc7', [$this, 'html7']);
        add_shortcode('iicca_galeria_sc8', [$this, 'html8']);
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

        wp_enqueue_style('modal_style');
    }
    
    static function html1()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera1.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria1.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html2()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera2.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria2.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html3()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera3.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria3.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html4()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera4.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria4.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html5()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera5.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria5.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html6()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera6.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria6.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html7()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera7.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria7.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }
    
    static function html8()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera8.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        
        require_once plugin_dir_path( __FILE__ ) . 'templates/galeria8.php';
        wp_enqueue_style('iicca_galeria_style');

        wp_enqueue_style('modal_style');
    }

    static function styles()
    {
        wp_register_style('iicca_cabecera_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/cabecera.css');
        wp_register_style('iicca_galeria_style', plugin_dir_url( __FILE__ ). 'assets/css/galeria.css');
        wp_register_style('tingle_style', plugin_dir_url( __FILE__ ). 'assets/css/tingle.css');
        wp_register_style('modal_style', plugin_dir_url( __FILE__ ). 'assets/css/modal.css');
    }

    static function scripts()
    {
        wp_register_script('iicca_geleria_main', plugin_dir_url( __FILE__ ). 'assets/js/main.js', array('jquery'),'1.1', true);
        wp_register_script('tingle_script', plugin_dir_url( __FILE__ ). 'assets/js/tingle.js', array('jquery'),'1.1', true);
    }
}
