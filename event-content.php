
<!-- SHARED TEMPLATE BEWEEN FESTIVAL AND SAISON EVENEMENTS -->


<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $ticketing_link = get_field('ticketing_link'); ?>
	<?php $practical_info = get_field('information'); ?>
	<?php $date = get_field('date'); ?>
	<?php $members = get_field('members'); ?>





	<section class="section  image_section" style="background-image: url(<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url(); } else {echo get_template_directory_uri() . '/img/placeholder.jpg';} ?>)">
		<div class="content_image_section">
			<h1> <?php the_title(); ?></h1><br>
			<?php if(get_field('styles')){ ?><p class="event_styles">
				<?php  $styles = get_field('styles');
				$i = 1;
					foreach( $styles as $style ):
						if($i==1) { echo '<i class="fa fa-tags" aria-hidden="true"></i> ';}
						else {echo ' - '; }
						 echo $style;
						$i++;
					endforeach; ?>

			</p><br><?php } ?>
			<?php $id = get_the_ID(); ?>
			<?php if(have_rows('dates', $id)){?>
			<p class="event_info">
				<?php $numrows = count(get_field( 'dates' ) );?>
				<?php if($numrows != 0){?><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php } ?>
				<?php $i=1; ?>
				<?php while ( have_rows('dates', $id) ) : the_row() ; ?>
					<?php if($i == $numrows ){
						echo get_sub_field('date');
					} else {
						$pieces = explode(" ",  get_sub_field('date'));
						echo $pieces['0'] . ' - ';
					} ?>
					<?php $i++; ?>
				<?php endwhile; ?>
				</span> |
				<?php if (get_field('time')){?><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo get_field('time'); ?></span> | <?php } ?>
				<?php if (!empty($members)){?><span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $members->post_title; ?> - <?php echo get_field('ville', $members->ID); ?></span><?php } ?>
			</p>
			<?php } ?>
		</div>
	</section>



<section class="section  section_colonnes ">
	<div class="container section2col">
		<div class="row">
			<div class="sectioncol col-sm-6 colnmb1 white ">
				<div class="content event_membres_details">
					<h2> <?php the_title(); ?><?php if(get_field('artist_name')){ ?> - <?php echo get_field('artist_name'); ?><br><?php } ?></h2>
					<?php if(get_field('countries')){ ?><p class="event_countries"> <i class="fa fa-globe" aria-hidden="true"></i>  <?php echo get_field('countries'); ?></p><?php } ?>
					<?php echo get_field('description') ?>
					<?php if(get_field('line-up')){?><div class="line-up"><p>Line-up: </p><?php echo get_field('line-up');?></div><?php } ?>
					<?php if(get_field('website')){?><div class="website"><p><a class="event_website" href="<?php echo get_field('website'); ?>" target="_blank" ><i class="fa fa-link" aria-hidden="true"></i>  <?php echo get_field('website');?></a></p></div><?php } ?>

				</div>
			</div>
			<div class="sectioncol col-sm-6 colnmb2 white event_featured_image">
			<?php the_post_thumbnail(); ?>
			</div>
		</div> <!-- END OF ROW -->
	</div><!--  END OF CONTAINER -->
</section>

<?php if(get_field('artist_name_minor')){ ?>

<section class="section  section_colonnes " style="background-color: black;">
	<div class="container section2col">
		<div class="row">
			<div class="sectioncol col-sm-6 colnmb1 black ">
				<div class="content event_membres_details">
					<h2> <?php echo get_field('artist_name_minor'); ?></h2><br>
					<?php if(get_field('countries_minor')){ ?><p class="event_countries"> <i class="fa fa-globe" aria-hidden="true"></i>  <?php echo get_field('countries_minor'); ?></p><?php } ?>
					<?php echo get_field('description_minor') ;?>
					<?php if(get_field('line-up_minor')){?><div class="line-up"><p>Line-up: </p><?php echo get_field('line-up_minor');?></div><?php } ?>
					<?php if(get_field('website_minor')){?><div class="website"><p><a class="event_website" href="<?php echo get_field('website_minor'); ?>" target="_blank" ><i class="fa fa-link" aria-hidden="true"></i>  <?php echo get_field('website_minor');?></a></p></div><?php } ?>

				</div>
			</div>
			<div class="sectioncol col-sm-6 colnmb2 black event_featured_image">
			<img src="<?php echo get_field('photo_minor'); ?>">
			</div>
		</div> <!-- END OF ROW -->
	</div><!--  END OF CONTAINER -->
</section>
<?php } ?>


<section class="section  section_colonnes ">



<div class="container-fluid section2col">
	<div class="row">
		<div class="sectioncol col-sm-6 stripes colnmb1 nexttomap">
			<div class="title">
				<h2><strong>Tarifs</strong></h2>
			</div>
			<div class="content">
			<?php
			if(!get_field('tarif_plein')) {echo "<p>Pas encore défini</p>";}
			elseif(!get_field('tarifs_reduits') AND !get_field('tarif_passe-partout_jcb')) { ?>
				<p><?php echo get_field('tarif_plein');?></p>
			<?php } else { ?>
			<div class=" pricing">
				<p><strong>Tarif plein</strong>: <?php echo get_field('tarif_plein');?></p>
				<?php if(get_field('tarifs_reduits')){ ?>
					<div class="pp_jcb"><p><strong>Tarif réduit</strong>: <?php echo get_field('tarifs_reduits');?></p></div>
				<?php } ?>
				<?php if(get_field('tarif_passe-partout_jcb')){ ?>
					<div class="pp_jcb"><p><strong>Tarif passe-partout JCB</strong>: <?php echo get_field('tarif_passe-partout_jcb');?></p></div>
					<h6><a href="#">Acheter le passe-partout</a></h6>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(get_field('ticketing_link')){ ?>
			<br>
			<br>
				<p>
					<strong>Billeterie</strong>: <br>
					<a class="event_website" href ="<?php echo get_field('ticketing_link');?>" target ="_blank"><i class="fa fa-ticket" aria-hidden="true"></i>  Acheter vos tickets en ligne</a>
				</p>
			<?php } ?>

			</div>
		</div>
		<div class="sectioncol col-sm-6 colnmb2 map_half_section">
			<?php if ($members) {
				echo do_shortcode('[jazz_membres_map]');
			}
			 ?>
		</div>
	</div> <!-- END OF ROW -->


</div><!--  END OF CONTAINER -->

	</section>












</article>
