<?php
/**
 * Template Name: Publicar Contenido
 */


$categories = get_categories(array(
	'hide_empty' => false,
));

if (!empty($categories)) {

	$select_categories = '';
	foreach ($categories as $category) {
		$select_categories .= '<option value="'.$category->term_id.'">'.$category->name.'</option>';
	}

}

$tags = get_tags(array(
	'hide_empty' => false
));

if (!empty($tags)) {

	$tag_list = '';
	foreach ($tags as $tag) {
		$tag_list .= '<input type="checkbox" name="content_tags[]" value="'.$tag->name.'">'.$tag->name;
	}

}


get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<h2>Subir contenido</h2>

		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-0">
				<?php
				//gravity_form('Subir contenido',false,false);
				?>
				<form id="upload-content" action="<?=admin_url('admin-ajax.php')?>" method="post" name="upload_content" enctype="multipart/form-data">
					<?php wp_nonce_field( 'submit_content', 'my_nonce_field' ); ?>
					<input type="hidden" name="action" value="submit_content">
					<div class="form-group">
						<label for="content-title">Título del contenido</label>
						<input type="text" class="form-control" name="content_title" id="content-title">
					</div>

					<div class="form-group">
						<label for="content-title">Descripción del contenido</label>
						<textarea class="form-control" rows="5" name="content_description" id="content_description"></textarea>
					</div>

					<div class="form-group">
						<label for="content-title">Imagen destacada</label>
						<input type="file" name="content_featured_image" accept="image/*">
					</div>

					<div class="form-group">
						<label for="content-title">Contenido embebido</label>
						<textarea class="form-control" rows="5" name="content_embed" id="content-embed"></textarea>
					</div>

					<div class="form-group">
						<label for="content-title">Categoría</label>
						<select class="form-control" name="content_category" id="content-category">
							<option value="">Selecciona una categoría...</option>
							<?=$select_categories?>
						</select>
					</div>

					<div class="form-group">
						<p>Etiquetas</p>
						<?=$tag_list?>
					</div>

					<div class="form-group">
						<a class="btn btn-info" id="submit-content">Enviar <i class="fa fa-upload"></i></a>
					</div>
				</form>
			</div>
		</div>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<script>
	jQuery(function() {

		$('#submit-content').click(function(e){
			e.preventDefault();

			$('#upload-content').submit();
		});
</script>    
