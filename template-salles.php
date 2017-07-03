<?php /* Template Name: Salles */ get_header(); ?>


		<!-- section -->
		<section>




		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php include('section-loop.php'); ?>


			<?php echo do_shortcode('[jazz_membres_map]'); ?>

			<section class="section  section_colonnes">



<div class="container-fluid section2col">
	<div class="row">
		<div class="sectioncol col-sm-6 stripes colnmb1">
			<div class="title">
				<h2><strong>Salles en France</strong></h2>
			</div>
			<div class="content">
			<?php
				$args = array( 'orderby'=>'post_title', 'order'=>'ASC', 'post_type' => 'membre', 'posts_per_page' => -1, 'meta_key'	=> 'country', 'meta_value'	=> 'france' );
				$loop = new WP_Query( $args );
				$i=1;
				while ( $loop->have_posts() ) : $loop->the_post();
				if($i>1){echo '<hr>';}
				  echo '<a class="member_link" href="'. get_permalink() . '"> <div id="' . basename(get_permalink())  . '">';
				  echo '<h4>'; the_title(); echo '</h4>';
				  echo '<p class="membre_ville">' . get_field('ville') . '</p>';
				  echo '</div></a>';
				 $i++;
				endwhile;

			?>

			</div>
		</div>
		<div class="sectioncol col-sm-6 checkers colnmb2">
			<div class="title">
				<h2><strong>Salles en Suisse</strong></h2>
			</div>
			<div class="content">

						<?php
				$args = array( 'orderby'=>'post_title', 'order'=>'ASC',  'post_type' => 'membre', 'posts_per_page' => -1, 'meta_key'	=> 'country', 'meta_value'	=> 'suisse' );
				$loop = new WP_Query( $args );
				$i=1;
				while ( $loop->have_posts() ) : $loop->the_post();
				if($i>1){echo '<hr>';}
				  echo '<a class="member_link" href="'. get_permalink() . '"> <div id="' . basename(get_permalink())  . '">';
				  echo '<h4>'; the_title(); echo '</h4>';
				  echo '<p class="membre_ville">' . get_field('ville') . '</p>';
				  echo '</div></a>';
				 $i++;
				endwhile;

			?>

			</div>
		</div>
	</div> <!-- END OF ROW -->


</div><!--  END OF CONTAINER -->

	</section>


				<div class="clear"></div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php endif; ?>

		</section>
		<!-- /section -->




<?php get_footer(); ?>
