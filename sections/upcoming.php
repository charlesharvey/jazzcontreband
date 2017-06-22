<div class="black">
	<div class="container"  style="text-align: center;">
	<h2><a href ="<?php echo get_sub_field('link'); ?>">Prochainement</a></h2>
	<p class="seeall"><a href ="<?php echo get_sub_field('link'); ?>">ou consultez notre programme complet ici</a></p>

		<div class="row">
			<?php 
				$event_type = get_sub_field('event_type');
				$args = array( 'post_type' => $event_type, 'posts_per_page' => 3 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
			?>

			<div class="col-sm-4">
			<a href="<?php the_permalink(); ?>">
				<div class="reperage_box stripes upcoming">
					<div class="white">
					<div class="event_thumb" style="padding: 30%; background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); background-size:cover;"></div>
						<div class="upcoming_description">
							 <h3><?php the_title(); ?></h3>
							 <br>
							 <div class="event_date">
								<?php $id = get_the_ID(); ?>
								<?php $numrows = count(get_field( 'dates' ) );?>
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
							</div>
						</div>
					</div>
				</div>
			</a>
			</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>

		
	</div>
</div>