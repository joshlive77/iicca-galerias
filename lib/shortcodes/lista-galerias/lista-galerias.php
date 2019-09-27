<?php
// =============================================================================
// 1ER SHORTCODE 
// LISTA DE GALERIAS
// =============================================================================


define('IICCA_GALERIAS_SC_URI', plugin_dir_path( __FILE__ ));

require_once IICCA_GALERIAS . '/include/helpers/queryBuilder.php';
require_once IICCA_GALERIAS . '/include/helpers/tools.php';

require_once IICCA_GALERIAS . '/include/models/galeria.php';

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
        // Genera el menu del back
        add_action('vc_before_init', [$this, 'wp_bakery_menu']);
        // genera el template
        add_shortcode('iicca_lista_galerias_sc', [$this, 'data']);
        // Carga los estilos css
        add_action('wp_enqueue_scripts', [$this, 'styles']);
        // Carga de scripts
        add_action('wp_enqueue_scripts', [$this, 'scripts']);
    }

    /**
     * Construye los datos del shortcode
     *
     * @param [type] $atts
     * @return void
     */
    static function data( $atts )
    {
        extract(shortcode_atts(array(
            // 'columnas'   => 3,
            'categorias' => null
        ), $atts));

        // recupera todas las categorias segun el filtro en el menu del shortcode
        $categorias = IiccaGaleriaTools::categorias($categorias);

        // array de galerias segun categorias
        $galerias = array();
        foreach ($categorias as $term_id => $categoria_name) {
            if($term_id != 0){
                // recupera todas las galerias segun el term_id de la categoria
                $consulta = IiccaGaleriaQuieryBuilder::galeriaPorCat($term_id);
            } else {
                // si el term_id es 0 obtenermos todas las galerias
                $consulta = IiccaGaleriaQuieryBuilder::todasGalerias();
            }
            // obtiene los posts
            $consulta = $consulta->posts;
            // array de galeria 
            $galeria = array();
            // recorre los posts
            foreach ($consulta as $consult) {
                // guarda todos los ides de las galerias en el array de galeria
                $id = $consult->ID;
                $galeria_object = new GaleriaModel();
                $galeria_object->setId($id);
                $galeria_object->setTitulo(get_the_title($id));
                $galeria_object->setDescripcion(get_the_content(null, false, $id));
                $galeria_object->setSingle(get_permalink($id));
                $galeria_object->setImagen(get_the_post_thumbnail_url($id));
                $galeria_object->setCategorias(get_the_terms($id, 'iicca_gal_cat'));
                $galeria_object->setFecha(get_post_meta($id, '_fecha_imagen_key', true));

                array_push($galeria, $galeria_object);
            }
            // ingresa las galerias al array de galerias con el nombre de categoria como llave
            $galerias[$categoria_name] = $galeria;
        }

        self::html($galerias);
    }
    
    /**
     * Genera las opciones del menu del shortcode para el wp bakery
     *
     * @return void
     */
    static function wp_bakery_menu()
    {
        // $taxonomies = array('iicca_gal_cat', array('parent' => 0));
        
        // $args = array(
        //     'hide_empty' => 0
        // );

        // obtiene todas las taxonomias de 'iicca_pub_tipos'
        $types = get_terms( array( 'taxonomy' => 'iicca_gal_cat'));
        $all_terms = array();

        $all_terms[esc_html__( 'todas', 'iicca-galerias-lista' )] = 'todas';

        // agrega cada termino de la taxonomia el array $all_terms
        foreach ($types as $type) {
            $all_terms[esc_html__( $type->name, 'iicca-galerias-lista' )] = $type->term_id;
        }

        // opciones del menu
        $opciones = array(
            // array(
            //     'type'        => 'dropdown',
            //     'param_name'  => 'columnas',
            //     'heading'     => esc_html__( 'columnas', 'iicca-galerias-lista' ),
            //     'value'       => array(
            //         esc_html__( '3', 'iicca-galerias-lista' )  => '3',
            //         esc_html__( '4', 'iicca-galerias-lista' )    => '4',
            //     ),
            //     'save_always' => true,
            //     'group'       => esc_html__( 'Configuraciones', 'iicca-galerias-lista' )
            // ),
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
    private function html($data)
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/cabecera.php';
        wp_enqueue_style('iicca_cabecera_galeria_style');
        require_once plugin_dir_path( __FILE__ ) . 'templates/galerias.php';
        wp_enqueue_style('iicca_lista_galerias_style');
        // require_once plugin_dir_path( __FILE__ ) . 'templates/galeria.php';
        // wp_enqueue_style('iicca_lista_galeria_style');
    }

    /**
     * Obtiene las rutas para los estilos
     *
     * @return void
     */
    static function styles()
    {
        wp_register_style('iicca_cabecera_galeria_style', plugin_dir_url(__FILE__) . 'assets/css/cabecera.css');
        wp_register_style('iicca_lista_galerias_style', plugin_dir_url(__FILE__) . 'assets/css/galerias.css');
        wp_register_style('iicca_lista_galeria_style', plugin_dir_url(__FILE__) . 'assets/css/galeria.css');
    }

    /**
     * Obtiene las rutas para los scripts
     *
     * @return void
     */
    static function scripts()
    {
        wp_register_script('iicca_lista_geleria_main', plugin_dir_url(__FILE__) . 'assets/js/main.js', array('jquery'), '1.1', true);
    }
}
