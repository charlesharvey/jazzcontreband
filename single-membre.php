<?php get_header(); ?>


<!-- section -->
<section class="container">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $phone = get_field('phone'); ?>
			<?php $address = get_field('address'); ?>
			<?php $country = get_field('country'); ?>
			<?php $website = get_field('website'); ?>
			<?php // add http:// if not included in the url  ?>
			<?php $website_http = ( strpos($website, '//') > 0  ) ?  $website :  'http://' . $website   ; ?>

			<div class="row">
				<div class="col-sm-8">
					<h1>Membre: <?php the_title(); ?></h1>

					<dl>
						<dt>Addresse:</dt>
						<dd><?php echo $address; ?></dd>
						<dt>Country:</dt>
						<dd><?php echo $country; ?></dd>

						<?php if ($phone != ''): ?>
							<dt>Telephone:</dt>
							<dd><?php echo $phone; ?></dd>
						<?php endif; ?>
						<?php if ($website != ''): ?>
							<dt>Website:</dt>
							<dd><a href="<?php echo $website_http; ?>"><?php echo $website; ?></a></dd>
						<?php endif; ?>
					</dl>





				</div>
				<div class="col-sm-4">

					<?php echo do_shortcode('[jazz_membres_map]'); ?>


					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<div class="member_image">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</div>
					<?php endif; ?>


				</div>
			</div>




		</article>
		<!-- /article -->

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
