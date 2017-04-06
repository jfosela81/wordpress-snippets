Function provided for upload images and attach them to Wordpress posts from a frontend form.
Previously you should have to insert the post through wp_insert_post() and get a post_id.
Then you can pass this function, and magic comes true.

@params: the array $_FILES with the image, the post ID you previously created, and a boolean if you want to set it as featured image or not

Thanks to Daniel Pataky, a Wordpress master contributor in WPMU DEV:

https://premium.wpmudev.org/blog/upload-file-functions/?utm_expid=3606929-101.yRvM9BqCTnWwtfcczEfOmg.0&utm_referrer=https%3A%2F%2Fwww.google.es%2F
