<?php

// =============================================================================
// CONSTRUCTOR DE CONSULTAS A LA BASE DE DATOS
// =============================================================================

require_once plugin_dir_path(__FILE__) . 'tools.php';

/**
 * Objeto de metodos estaticos que arman consultas
 */
class IiccaGaleriaQuieryBuilder
{
    /**
     * devulde un objeto con todas las consultas echas por taxonomia y termino
     *
     * @param string $tax
     * @param string $term
     * @return object WP_query
     */
    public static function galeriasPorCat($term = '', $num = -1){
        /**
         * Obtiene la fecha actual de la zona horaria de la paz bolivia
         */
        $fechActual = IiccaTools::fechaActual();
        /**
         * Array de argumentos de la consulta
         */
        $query_args = array(
            'post_type'      => 'iicca_publicaciones',
            'order'          => 'DESC',
            'orderby'        => '_fecha_publicacion_key',   //ordenado por custom metabox
            'meta_key'       => '_fecha_publicacion_key',   //metakey = custom metabox
            'posts_per_page' => $num,
            'meta_query'     => array(                      //array con argumentos de comparacion para el custom metabox
                'key'        => '_fecha_publicacion_key',
                'value'      => $fechActual,
                'compare'    => '>=',
                'type'       => 'NUMBER'
            ),
            'tax_query'      => array(                      //array de arrays de argumentos de comparacion de taxonomias
                array(
                    'taxonomy'  => 'iicca_gal_cat',
                    'field'     => 'slug',
                    'terms'     => $term,
                )
            )
        );
        /**
         * Devuelve la consulta
         */
        return new WP_Query($query_args);
    }

}

?>