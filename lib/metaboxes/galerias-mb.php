<?php

// =============================================================================
// 2DO METABOX
// GALERIAS
// =============================================================================

require_once IICCA_GALERIAS . 'include/helpers/queryBuilder.php';
require_once IICCA_GALERIAS . 'include/helpers/tools.php';


class MB_galerias
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
        $post = [ 'iicca_imagenes'];
        foreach ($post as $post) {
            add_meta_box(
                // Unique ID
                'iicca_imagenes_galerias',
                // Box title
                'Galerias: ',
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
        if (!isset($_POST['galerias_imagen_metabox_nonce'])) return;

        // bajar el campo NONCE a una variable
        $nonce = $_POST['galerias_imagen_metabox_nonce'];

        // verificar si el campo NONCE es valido
        if (!wp_verify_nonce($nonce, 'galerias_imagen_metabox')) return;

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        // verificar permisos de usuario
        if (!current_user_can('edit_post', $post_id)) return;

        // obtiene los nombres y los ids de las galerias
        $galerias = IiccaGaleriaTools::nombresGalerias(IiccaGaleriaQuieryBuilder::todasGalerias()->posts);
        
        $galeria_checked = array();
        foreach ($galerias as $id => $nombre) {
            if(isset( $_POST[$id] )){
                array_push($galeria_checked, $id);
            }
        }
        // si ls url no esta vacia se actualiza el post_meta
        update_post_meta($post_id,'_galerias_imagen_key', $galeria_checked);
    }

    public static function html()
    {
        $post_id = get_the_ID();

        // obtiene las galerias guardadas
        $galerias_ids = get_post_meta($post_id, '_galerias_imagen_key', true);

        // var_dump($galerias);

        // crea el campo NONCE
        wp_nonce_field('galerias_imagen_metabox', 'galerias_imagen_metabox_nonce');

        // obtiene los nombres y los ids de las galerias
        $galerias = IiccaGaleriaTools::nombresGalerias(IiccaGaleriaQuieryBuilder::todasGalerias()->posts);
        ?>
            <p>Seleccione a que galeria pertecena la fotografia:</p>
            <table>
            <?php foreach ($galerias as $id => $nombre): ?>
                <tr>
                    <td>
                        <?=$nombre;?>
                        <input type="checkbox" name="<?=$id?>" value="<?=$id?>" 
                        <?php
                            if(in_array($id, $galerias_ids)):
                            checked($id, $id);
                            endif;
                        ?>
                        >
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php
    }
}

?>

