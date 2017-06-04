<?php get_header(); ?>



<!-- section -->
<section class="container">

	<div class="row">
		<div class="col-sm-6">

			<h1><?php _e( 'Membres', 'webfactor' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
		</div>
		<div class="col-sm-6">

			<?php echo do_shortcode('[jazz_membres_map]'); ?>

						<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
							<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'webfactor' ); ?>">
							<input type="hidden" name="post_type" value="membre">
							<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'webfactor' ); ?></button>
						</form>



		</div>
	</div>



</section>
<!-- /section -->


<?php get_footer(); ?>
