jQuery(document).ready(function() {

    current_id = '';

    jQuery('.upload_image').click(function() {
        current_id = jQuery(this).attr('id');
        // post_id se usa cuando queremos activar el media uploader en un metabox de un post
        post_id = jQuery('#post_ID').val();
        tb_show('', 'media-upload.php?post_id='+post_id+'&amp;type=image&amp;TB_iframe=true');
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        jQuery('#'+current_id+'_url').val(imgurl);
        tb_remove();
    }

});
