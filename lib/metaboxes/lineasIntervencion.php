<?php

// =============================================================================
// 5TO METABOX
// LINEAS DE INTERVENCION
// =============================================================================

// funcion para generar y rellenar las lineas de intervencion
function llenar_lineas($post)
{
    // creacion del campo NONCE
    wp_nonce_field('v_send_llenar_lineas', 'send_llenar_lineas');

    // helpers
    $array_helper = new arrayOperators();
    
    // obtiene todas las lineas checkeadas
    $valor = get_post_meta($post->ID, 'lineas', true);
    
    
    // todas las lineas segun el area de intervencion 
    $areas = $array_helper->get_all_taxonomies();

?>
<!-- vista de las lineas -->
<p>Seleccione las lineas de intervencion del evento:</p>
<table>
    <tr>
    <!-- itera sobre las area de intervencion para separar las lineas -->
    <?php foreach($areas as $area => $lineas): ?>
		<td>
            <p>
                <?=$area?> : 
            </p>
        </td>
        <td>
            <!-- generar checkboxes segun las lineas de intervencion -->
            <?php foreach ($lineas as $value => $linea): ?>
            <input 
                type="checkbox" 
                name="<?=$area?>_<?=$value?>" 
                value="<?=$area?>_<?=$linea?>" 
                <?php 
                // comprobar ana area ya ha sido checkeada
                if(!empty($valor)):
                    if(array_key_exists($area, $valor) && !empty($valor[$area])):
                        checked( in_array($linea, $valor[$area]) ? $area.'_'.$linea : '', $area.'_'.$linea ); 
                    endif;
                endif;
                ?>
            >
                <?=$linea?> <br>
            <?php endforeach; ?>
            <hr>
        </td>
    </tr>
    <tr>
    <?php endforeach;?>
    </tr>
</table>

<?php
}

// funcion para guardar las lineas checkeadas
function guardar_lineas($post_id)
{
    // helpers
    $array_helper = new arrayOperators();
    
    // verificar si el campo nonce esta instanciado.
    if ( !isset( $_POST['send_llenar_lineas'] ) ) {
        return;
    }
    // verificar si el campo nonce es valido.
    if ( !wp_verify_nonce( $_POST['send_llenar_lineas'], 'v_send_llenar_lineas' ) ) {
            return;
    }
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
    }
    // Verificar permisos de usuario.
    if ( !current_user_can( 'edit_post', $post_id ) ) {
            return;
    }

    // obtener todas las lineas
    $areas = $array_helper->get_all_taxonomies();
    // array con el conenido de los checkboxes
    $lines = array();
    // iteracion de las areas exitentes
    foreach($areas as $area => $lineas) {
        $checkboxes = array();
        // iteracion de las lineas exitentes
        foreach ($lineas as $value => $linea){
            // comprobacion si el area existente fue enviada por POST
            if(isset( $_POST[$area.'_'.$value] )){
                // la linea checkeada es adicionada al array de checkboxes
                array_push($checkboxes, $linea);
            } 
        }
        $lines[$area] = $checkboxes;
        unset($checkboxes);
    }
    // actualizamos el POST META  con el array de las lineas checkeadas
    update_post_meta( $post_id, 'lineas', $lines );
}
// hook para guardar lineas
add_action('save_post', 'guardar_lineas');

// funcion para crear los metaboxes
function lineas_metabox()
{
    add_meta_box('id_lineas', 'lINEAS DE INTERVENCION:', 'llenar_lineas', 'piu_evento', 'normal', 'high');
}
// hook de metaboxes
add_action('add_meta_boxes', 'lineas_metabox');

?>