<?php

// =============================================================================
// 2DA TAXONOMIA
// CATEGORIA
// =============================================================================

/**
 * Usar namespace para evitar comflictos
 */

/**
 * Class Tax_Categoria
 * @package PostType
 *
 */
class Tax_Categoria {

    /**
     * @var string
     *
     * Setea parametros del custom post
     */
    private $type               = 'iicca_categoria';
    private $slug               = 'iicca_categoria_slug';
    private $plural             = 'Categorias';
    private $singular           = 'Categoria';

    /**
     * Constructor
     *
     * Cuando la clase es instanciada
     */
    public function __construct()
    {
        // Registra la taxonomia
        add_action('init', [$this, 'register']);
        // unregister_taxonomy(iicca_publicaciones)
    }

    /**
     * Registra la taxonomia
     */
    public function register() {

        // Etiquetas
        $labels = array(
            'plural'                => $this->plural,
            'singular'              => $this->singular,
            'add_new'               => 'Agregar ' . $this->singular,
            'add_new_item'          => 'Agregar ' . $this->singular,
            'edit_item'             => 'Editar ' . $this->singular,
            'new_item'              => 'Nueva ' . $this->singular,
            'all_items'             => 'Todas las ' . $this->plural,
            'view_item'             => 'Ver ' . $this->plural,
            'search_items'          => 'Buscar ' . $this->singular,
            'not_found'             =>  strtolower($this->singular) . ' no encontrada',
            'not_found_in_trash'    =>  strtolower($this->singular) . ' no encontrada en la papelera',
            'parent_item_colon'     => '',
            'menu_name'             => $this->plural
        );

        // argumentos
        $args = array(
            'label'             => $this->plural,
            'labels'            => $labels,
            'rewrite'           => array(
                'slug'          => 'iicca-galerias-categorias'
            ),
            'show_admin_column' => true,
            'hierarchical'      => false
        );

        // registro de la taxonomia
        register_taxonomy( $this->type, 'iicca_imagenes', $args);
    }

}
