function bindRemoveButtons() {
    jQuery('.remove-slide').click(function(){

        jQuery(this).parent().parent().remove();

        return false;
    });
}

jQuery('document').ready(function($){

    count = 1000;

    $('.add-slide').click(function(){

        $('#no-slides').parent().remove();

        row_html = '' +
            '<tr>' +
            '<td valign="top" style="padding-top:6px;">URL imagen</td>' +
            '<td>' +
            '<input type="text" name="image_url[]" id="image_'+count+'_url" value="" size="50">' +
            '<p class="description">Puedes usar una URL externa de imagen o bien subir una desde tu equipo</p>' +
            '</td>' +
            '<td valign="top">' +
            '<button type="button" class="button-primary upload-slide" id="image_'+count+'">Subir imagen <span class="dashicons dashicons-upload"></span></button>' +
            '</td>' +
            '<td valign="top"><button type="button" class="button-secondary remove-slide">Borrar imagen <span class="dashicons dashicons-dismiss" style="padding-top:4px;"></span></button></td>' +
            '<td valign="top" style="padding-top:6px;"><i>Vista previa disponible al guardar los datos</i></td>' +
            '</tr>' +
            '';

        $('#table-slider').append(row_html);

        bindUploadButtons();
        bindRemoveButtons();

        count++;

        return false;
    });

});
