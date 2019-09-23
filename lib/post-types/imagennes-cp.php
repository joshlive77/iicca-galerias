<?php

// =============================================================================
// CUSTOM POST DE GALERIAS DE IMAGENES
// =============================================================================

/**
 * Objeto que genera el custom post de galerias
 */
class IiccaImagenesCP
{
    /**
     * parametros por defecto del custom post
     *
     * @var string
     */
    private $type       = 'iicca_imagenes';
    private $slug       = 'iicca_imagenes_slug';
    private $plural     = 'Imagenes';
    private $singular   = 'Imagen';

    /**
     * contructor
     */
    function __construct()
    {
        // Registra el post type
        add_action('init', [$this, 'register']);
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
            // 'all_items'             => 'Todas las ' . $this->plural,
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
            'iicca_galeria',
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

    static function set_columns()
    {

    }

    static function edit_column()
    {

    }

}
