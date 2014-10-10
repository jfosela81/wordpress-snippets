jQuery(document).ready(function() {

    current_id = '';

// Fijamos el media uploader al elemento que deseemos
    jQuery('.upload_image').click(function() {
        // Capturamos su ID para usarlo después
        current_id = jQuery(this).attr('id');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        if(jQuery(imgurl).length == 0) {
                imgurl = jQuery(html).attr('href'); // We do this to get Links like PDF's
        }
        // El ID capturado antes, lo usamos para encontrar el input text "asociado". En mi caso, le puse el mismo
        // ID pero añadiendo al final '_url'
        jQuery('#'+current_id+'_url').val(imgurl);
        tb_remove();
    }

});
