<?php

// =============================================================================
// CUSTOM POST DE GALERIAS DE Galerias
// =============================================================================

/**
 * Objeto que genera el custom post de galerias
 */
class IiccaGaleriasCP
{
    /**
     * parametros por defecto del custom post
     *
     * @var string
     */
    private $type       = 'iicca_galerias';
    private $slug       = 'iicca_galerias_slug';
    private $plural     = 'Galerias';
    private $singular   = 'Galeria';

    /**
     * contructor
     */
    function __construct()
    {
        // Registra el post type
        add_action('init', [$this, 'register']);
        // Admin set post columns
        add_filter( 'manage_'.$this->type.'_posts_columns', array($this, 'set_columns'), 10, 1);
        // Admin edit post columns
        add_action( 'manage_'.$this->type.'_posts_custom_column', array($this, 'edit_columns'), 10, 2 );
    }

    /**
     * Registra el post type
     */
    static function register()
    {
        // etiquetas
        $labels = array(
            'name'                  => $this->plural,
            'singular_name'         => $this->singular,
            'add_new'               => 'Agregar ' . $this->singular,
            'add_new_item'          => 'Agregar ' . $this->singular,
            'edit_item'             => 'Editar ' . $this->singular,
            'new_item'              => 'Nueva ' . $this->singular,
            'all_items'             => 'Todas las ' . $this->plural,
            'view_item'             => 'Ver ' . $this->plural,
            'search_items'          => 'Buscar ' . $this->plural,
            'not_found'             =>  strtolower($this->plural) . ' no encontrada',
            'not_found_in_trash'    =>  strtolower($this->plural) . ' no encontrada en la basura',
            'parent_item_colon'     => '',
            'menu_name'             => 'IICCA galerias'
        );

        // taxonomias
        $taxonomies = array(
            'iicca_gal_cat'
        );

        // argumentos
        $args = array(
            'labels'                => $labels,
            'taxonomies'            => $taxonomies,
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => $this->slug ),
            'capability_type'       => 'post',
            'has_archive'           => true,
            'hierarchical'          => true,
            'menu_position'         => 4,
            'menu_icon'             => 'dashicons-format-gallery',
            'supports'              => array( 
                'title',
                'editor', 
                // 'excerpt', 
                // 'author', 
                'thumbnail'),
            'yarpp_support'         => true
        );
        register_post_type( $this->type, $args );
    }

    /**
     * @param $columns
     * @return mixed
     *
     * Choose the columns you want in
     * the admin table for this post
     */
    public function set_columns($columns) {
        $columns ['iicca_imagenes_fecha_imagen'] = 'Fecha de Publicación';
        $columns ['featured_image'] = 'Portada';
        unset($columns['date']);
        return $columns;
    }

    /**
     * @param $column
     * @param $post_id
     *
     * Edit the contents of each column in
     * the admin table for this post
     */
    public function edit_columns($column_name, $post_ID) {
        // Post type table column content code here
        switch ($column_name) {

            case 'featured_image':
                $post_thumbnail_id = get_post_thumbnail_id($post_ID);
                if ($post_thumbnail_id) {
                    $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, array(50,50));
                    if($post_thumbnail_img[0]){
                        echo '<img src="' . $post_thumbnail_img[0] . '" />';
                    } 
                } else {
                    echo '<img src="' . IICCA_GALERIAS_URL . 'lib/shortcodes/lista-galerias/assets/img/image-default.png" style="width: 100px;"/>';
                }
                break;
            
            case 'iicca_imagenes_fecha_imagen':
                $fecha = get_post_meta($post_ID, '_fecha_imagen_key', true);
                $fecha = IiccaGaleriaTools::traducirFecha($fecha);
                echo $fecha['dia'].'  de '.$fecha['mes'].' de '.$fecha['anio'];
                break;
            
            default:
                break;
        }
    }

}
