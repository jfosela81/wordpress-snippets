add_action('add_meta_boxes','arion_slider_meta_box');

function arion_slider_meta_box() {
    add_meta_box('slider_meta_box','Añadir slider a la plantilla (<i>válido en plantilla Home y Criadores</i>)','do_add_slider_meta_box','page');
}

function do_add_slider_meta_box(){

    global $post;

    $image_url = get_post_meta($post->ID,'image_url',true);

    echo '
    <input type="hidden" id="post_id" value="'.$post->ID.'">
    <table id="table-slider">
        <tr>
            <th>&nbsp;</th>
            <th>URL imagen</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>Vista previa</th>
        </tr>
    ';
    if (empty($image_url))
        echo '<tr><td id="no-slides" colspan="5" align="center" style="padding:10px;"><i>No hay slides añadidas</i></td></tr>';
    else {
        for ($i=0; $i<count($image_url); $i++) {
            echo '<tr>
            <td valign="top" style="padding-top:6px;">URL imagen</td>
            <td valign="top" >
            <input type="text" name="image_url[]" id="image_'.$i.'_url" value="'.$image_url[$i].'" size="50">
            <p class="description">Puedes usar una URL externa de imagen o bien subir una desde tu equipo</p>
            </td>
            <td valign="top"><button type="button" class="button-primary upload-slide" id="image_'.$i.'">Subir imagen <span class="dashicons dashicons-upload"></span></button></td>
            <td valign="top">
            <button type="button" class="button-secondary remove-slide">Borrar imagen <span class="dashicons dashicons-dismiss" style="padding-top:4px;"></span></button>
            <td valign="top" style="padding:0 10px 10px 10px;"><img style="border:solid 1px #ccc; border-radius:5px; padding:3px;" src="'.$image_url[$i].'" width="150"></td>
            </tr>';
        }
    }

    echo '
    </table>
    <span class="dashicons dashicons-plus-alt"></span>&nbsp;<a href="" class="add-slide">Añadir slide</a>

    ';
}

add_action('save_post','save_table_slider');
function save_table_slider($post_id) {

    //var_dump($_POST['image_url']); die;

    $arra_image_url = $_POST['image_url'];
    update_post_meta($post_id,'image_url',$arra_image_url);
}
