<?php get_header(); ?>




<!-- section -->
<section class="container">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>



		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $artist_email = get_field('artist_email'); ?>
			<?php $artist_file = get_field('file_upload'); ?>
			<?php $file_url =  ( is_numeric($artist_file) ) ? wp_get_attachment_url($artist_file) :  $artist_file['url']; ?>
			<?php $owner = get_userdata( $post->post_author ); ?>


			<div class="row">
				<div class="col-sm-8">
					<h1> <?php the_title(); ?></h1>
					<dl>

						<?php if ( get_the_content() != '' ) : ?>
							<dt>Description:</dt>
							<dd><?php echo get_the_content(); ?></dd>
						<?php endif; ?>


						<?php foreach (  reperage_fields()  as $field => $translation) : ?>
								<?php $acf_field =  get_field($field); ?>
								<?php if ($acf_field && $acf_field !='') : ?>
									<dt><?php echo $translation; ?>:</dt>
									<dd><?php echo $acf_field; ?></dd>
									<?php endif; ?>
						<?php endforeach; ?>



						<?php if ($file_url): ?>
							<dt>File:</dt>
							<dd><a href="<?php echo $file_url; ?>"><?php echo $file_url; ?></a></dd>
						<?php endif; ?>

						<dt>Added by:</dt>
						<dd><?php echo $owner->display_name; ?></dd>
					</dl>


					<?php // acf_form(); ?>

				</div>
				<div class="col-sm-4">

					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<div class="member_image">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</div>
					<?php endif; ?>


				</div>
			</div>



		</article>


	<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>

		<h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>

	</article>
	<!-- /article -->

<?php endif; ?>

</section>
<!-- /section -->




<?php get_footer(); ?>
