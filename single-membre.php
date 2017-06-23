<?php get_header(); ?>



	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $phone = get_field('phone'); ?>
			<?php $address = get_field('address'); ?>
			<?php $country = get_field('country'); ?>
			<?php $website = get_field('website'); ?>
			<?php // add http:// if not included in the url  ?>
			<?php $website_http = ( strpos($website, '//') > 0  ) ?  $website :  'http://' . $website   ; ?>

			<section class="section  section_colonnes">
				<div class="container-fluid section1col">
					<div class="row">
						<div class="sectioncol col-sm-12 white colnmb1">
							<div class="content">
								<h1 style="text-align: center;"><?php the_title(); ?></h1>
								<br>
								<div style="text-align: center;"><?php echo get_field('description'); ?></div>
							</div>
						</div>
					</div> <!-- END OF ROW -->
				</div><!--  END OF CONTAINER -->
			</section>

<?php include('events-salle.php'); ?>



<section class="section  section_colonnes ">



<div class="container-fluid section2col">
	<div class="row">
		<div class="sectioncol col-sm-6 stripes colnmb1 nexttomap" style="height: 1049px;">
		<div class="title">
			<h2><strong>Contact</strong></h2>
		</div>
			<div class="content membres_details">

			<?php if (get_field('website')){ ?>
				<h4><i class="fa fa-link" aria-hidden="true"></i> Site web</h4>
				<p><a target="_blank" href="<?php echo $website_http; ?>"><?php echo $website; ?></a></p>
			<?php } ?>

			<?php if (get_field('phone')){ ?>
				<h4><i class="fa fa-phone" aria-hidden="true"></i> Téléphone</h4>
				<p><?php echo get_field('phone'); ?></p>
			<?php } ?>

			<?php if (get_field('address')){ ?>
				<h4><i class="fa fa-map-marker" aria-hidden="true"></i> Adresse</h4>
				<p><?php echo get_field('address'); ?><br><?php echo get_field('country'); ?></p>
			<?php } ?>

			</div>
		</div>
		<div class="sectioncol col-sm-6 colnmb2 map_half_section">
			<?php echo do_shortcode('[jazz_membres_map]'); ?>
		</div>
	</div> <!-- END OF ROW -->


</div><!--  END OF CONTAINER -->

	</section>

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





<?php get_footer(); ?>
