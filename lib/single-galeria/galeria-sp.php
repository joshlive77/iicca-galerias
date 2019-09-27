<?php
// =============================================================================
// CONTRUCTOR DEL SINGLE PAGE
// =============================================================================

define('IICCA_GALERIA_SP', plugin_dir_path( __FILE__ ));

require_once IICCA_GALERIAS . '/include/helpers/queryBuilder.php';
require_once IICCA_GALERIAS . '/include/helpers/tools.php';

require_once IICCA_GALERIAS . '/include/models/imagen.php';

class IiccaGaleriaSingle
{
    function __construct()
    {
        self::data();
    }

    public function data()
    {
        $imagenes = IiccaGaleriaQuieryBuilder::todasImagenes();
        $imagenes_ids = IiccaGaleriaTools::filtrarImagenes(get_the_ID(), $imagenes->posts);
        unset($imagenes);
        $imagenes = array();
        foreach ($imagenes_ids as $imagen_id) {
            $img_object = new ImagenModel();
            $img_object->setId($imagen_id);
            $img_object->setTitulo(get_the_title($imagen_id));
            $img_object->setImagen(get_the_post_thumbnail_url($imagen_id));
            $img_object->setDescripcion(get_the_content(null,false,$imagen_id));
            $img_object->setGalerias(get_post_meta($imagen_id, '_galerias_imagen_key', true));
            $img_object->setFecha(get_post_meta($imagen_id, '_fecha_imagen_key', true));
            array_push($imagenes, $img_object);
            unset($img_object);
        }

        // $imagenes = IiccaGaleriaTools::orderImagenes($imagenes);

        self::html($imagenes);
    }

    public function html( $data )
    {
        
        if(!empty($data)){
    
            require IICCA_GALERIA_SP . 'templates/cabecera.php';
            require IICCA_GALERIA_SP . 'templates/galeria.php';
    
            wp_enqueue_style('iicca_cabecera_single_style');
            wp_enqueue_style('iicca_galeria_single_style');
            wp_enqueue_style('modal_single_style');  

        } else {
            echo '<h1> No existen imagenes en esta galeria </h1>';
        }
    }

}
