<?php get_header(); ?>


<!-- section -->
<section class="container">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php get_template_part('event-content'); ?>

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
