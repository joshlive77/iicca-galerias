<?php

// =============================================================================
// 1ER METABOX
// FECHA
// =============================================================================

class MB_fecha
{
    
    function __construct()
    {
        // Agraga el metabox
        add_action('add_meta_boxes', [$this, 'add']);
        add_action('save_post', [$this, 'save']);
    }

    public function add()
    {
        // Array de custom posts
        $post = ['iicca_galerias', 'iicca_imagenes'];
        foreach ($post as $post) {
            add_meta_box(
                // Unique ID
                'iicca_imagenes_fecha_imagen',
                // Box title
                'Fecha: ',
                // Content callback, must be of type callable
                [self::class, 'html'],
                // Post type
                $post,
                'normal',
                'high'
            );
        }
    }

    public function save()
    {
        $post_id = get_the_ID();

        // verificar si el campo nonce esta instanciado.
        if (!isset($_POST['fecha_imagen_metabox_nonce'])) return;

        // bajar el campo NONCE a una variable
        $nonce = $_POST['fecha_imagen_metabox_nonce'];

        // verificar si el campo NONCE es valido
        if (!wp_verify_nonce($nonce, 'fecha_imagen_metabox')) return;

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        // verificar permisos de usuario
        if (!current_user_can('edit_post', $post_id)) return;

        // si ls url no esta vacia se actualiza el post_meta
        if (array_key_exists('campo_fecha_imagen', $_POST)) {
            update_post_meta(
                $post_id,
                '_fecha_imagen_key',
                $_POST['campo_fecha_imagen']
            );
        } else {
            //  si la url esta vacia elimina el contenido del port_meta
            delete_post_meta($post_id, 'campo_fecha_imagen');
        }
    }

    public static function html()
    {
        $post_id = get_the_ID();

        // obtiene la url guardada
        $fecha = get_post_meta($post_id, '_fecha_imagen_key', true);
        
        // var_dump($fecha);

        // comprobamos si el metabox esta vacio
        !empty($fecha) ? $fecha = $fecha : '';

        // crea el campo NONCE
        wp_nonce_field('fecha_imagen_metabox', 'fecha_imagen_metabox_nonce');

        // vista de la url
        $field  = '<p>';
        $field .= '    <input type="date" name="campo_fecha_imagen" ';
        $field .= '    value="'.$fecha.'"/>';
        $field .= '</p>';

        echo $field;

    }
}

?>