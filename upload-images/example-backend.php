add_action( 'wp_ajax_nopriv_submit_content', 'ks_upload_content' );
add_action( 'wp_ajax_submit_content', 'ks_upload_content' );

function ks_upload_content() {
    // Handle the form in here

    $post_id = wp_insert_post(array(
        'post_title' => $_REQUEST['content_title'],
        'post_content' => $_REQUEST['content_description'],
        'post_category' => array($_REQUEST['content_category']),
        'tags_input' => $_REQUEST['content_tags'],
        'meta_input' => array(
            'tm_embed_content' => $_REQUEST['content_embed']
        )
    ));

    $upload = wp_upload_bits( $_FILES['content_featured_image']['name'], null, file_get_contents( $_FILES['content_featured_image']['tmp_name'] ) );

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

    update_post_meta( $post_id, '_thumbnail_id', $attach_id );

    wp_redirect( site_url() . '/thank-you/' );
    wp_die();
}
