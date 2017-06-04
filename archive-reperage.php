<?php get_header(); ?>




<!-- section -->
<section class="container">


	<div class="row">
		<div class="col-sm-8">

			<h1><?php _e( 'Repérage', 'webfactor' ); ?></h1>



			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
		<div class="col-sm-4">

				<p><a href="<?php echo  site_url('/reperage-admin'); ?>">New Reperage</a></p>

			<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
				<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'webfactor' ); ?>">
				<input type="hidden" name="post_type" value="reperage">
				<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'webfactor' ); ?></button>
			</form>

		</div>
	</div>


</section>
<!-- /section -->


<?php get_footer(); ?>
