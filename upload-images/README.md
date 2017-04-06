Function provided for upload images and attach them to Wordpress posts from a frontend form.
Previously you should have to insert the post through wp_insert_post() and get a post_id.
Then you can pass this function, and magic comes true.

@params: $_FILES, $post_id, $set_as_featured
