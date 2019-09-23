<?php
// =============================================================================
// 1ER SHORTCODE 
// LISTA DE GALERIAS
// =============================================================================

require_once IICCA_GALERIAS . '/include/helpers/queryBuilder.php';

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
        // Genera el menu del back
        add_action('vc_before_init', [$this, 'wp_bakery_menu']);
        // Carga los estilos css
        add_action('wp_enqueue_scripts', [$this, 'styles']);
        // Carga de scripts
        add_action('wp_enqueue_scripts', [$this, 'scripts']);
    }

    static function data( $categorias = '')
    {
        
    }

    /**
     * Genera las opciones del menu del shortcode para el wp bakery
     *
     * @return void
     */
    static function wp_bakery_menu()
    {
        $taxonomies = array('iicca_gal_cat');
        
        $args = array(
            'hide_empty' => 0
        );

        // obtiene todas las taxonomias de 'iicca_pub_tipos'
        $types = get_terms( $taxonomies, $args);
        $all_terms = array();

        // agrega cada termino de la taxonomia el array $all_terms
        foreach ($types as $type) {
            $all_terms[esc_html__( $type->name, 'iicca-galerias-lista' )] = $type->name;
        }

        // opciones del menu
        $opciones = array(
            array(
                'type'        => 'dropdown',
                'param_name'  => 'columnas',
                'heading'     => esc_html__( 'columnas', 'iicca-galerias-lista' ),
                'value'       => array(
                    esc_html__( '3', 'iicca-galerias-lista' )  => '3',
                    esc_html__( '4', 'iicca-galerias-lista' )    => '4',
                ),
                'save_always' => true,
                'group'       => esc_html__( 'Configuraciones', 'iicca-galerias-lista' )
            ),
            array(
                'type'        => 'dropdown',
                'param_name'  => 'filtro',
                'heading'     => esc_html__( 'filtrar galerias?', 'iicca-galerias-lista' ),
                'value'       => array(
                    esc_html__( 'no filtrar', 'iicca-galerias-lista' )    => 'no',
                    esc_html__( 'filtrar', 'iicca-galerias-lista' )  => 'si',
                ),
                'save_always' => true,
                'group'       => esc_html__( 'Configuraciones', 'iicca-galerias-lista' ),
                'description' => esc_html__( 'Seleccionar las categorias que desee mostrar en el shortcode, si elige no filtrar se mostraran todas las categorias.', 'iicca-galerias-lista' ),
            ),
            array(
                'type'        => 'checkbox',
                'param_name'  => 'categorias',
                'heading'     => esc_html__( 'Categorias', 'iicca-galerias-lista' ),
                'value'       => $all_terms,
                'group'       => esc_html__( 'Configuraciones', 'iicca-galerias-lista' ),
                'dependency'  => array(
                    'element' => 'filtro',
                    'value'   => array('si')
                ),
                'save_always' => true,
            )
        );
 
        // configuraciones del menu
        $config = array(
            "name"      => __("Lista de Galerias", "iicca-galerias-lista"),
            "base"      => "iicca_lista_galerias_sc",
            "icon"      => 'vc_general vc_element-icon icon-wpb-slideshow',
            "category"  => __("IICCA", "iicca-galerias-lista"),
            "params"    => $opciones
        );

        // instancia el menu de wp_bakery
        vc_map($config);
    }

    /**
     * Genera el html del shortcode
     *
     * @param [type] $atts
     * @return void
     */
    static function html($atts)
    {
        extract(shortcode_atts(array(
            'columnas'  => 3,
            'categorias'  => null
        ), $atts));

        echo $columnas;

        if(!empty($categorias) && !is_null($categorias)){
            $categorias = explode(',', $categorias);
        }
        var_dump($categorias);


        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        require_once plugin_dir_path( __FILE__ ) . 'templates/galerias.php';
        wp_enqueue_style('iicca_lista_galerias_style');
        // require_once plugin_dir_path( __FILE__ ) . 'templates/galeria.php';
        // wp_enqueue_style('iicca_lista_galeria_style');
    }

    static function styles()
    {
        wp_register_style('iicca_cabecera_galeria_style', plugin_dir_url(__FILE__) . 'assets/css/cabecera.css');
        wp_register_style('iicca_lista_galerias_style', plugin_dir_url(__FILE__) . 'assets/css/galerias.css');
        wp_register_style('iicca_lista_galeria_style', plugin_dir_url(__FILE__) . 'assets/css/galeria.css');
    }

    static function scripts()
    {
        wp_register_script('iicca_lista_geleria_main', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), '1.1', true);
    }
}
