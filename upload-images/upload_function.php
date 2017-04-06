function my_upload_function( $file, $post_id = 0 , $set_as_featured == false ) {
    $upload = wp_upload_bits( $file['name'], null, file_get_contents( $file['tmp_name'] ) );

    $wp_filetype = wp_check_filetype( basename( $upload['file'] ), null );

    $wp_upload_dir = wp_upload_dir();

    $attachment = array(
        'guid' => $wp_upload_dir['baseurl'] . _wp_relative_upload_path( $upload['file'] ),
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/\.[^.]+$/', '', basename( $upload['file'] )),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    
    $attach_id = wp_insert_attachment( $attachment, $upload['file'], $post_id );

    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    if( $set_as_featured == true ) {
        update_post_meta( $post_id, '_thumbnail_id', $attach_id );
    }

}
