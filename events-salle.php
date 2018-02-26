
<?php
	$event_type = get_field('type_devenement', 'option');
	$cat = get_field('saison_a_afficher_sur_les_salles', 'option');
 	$id = get_the_ID();
	$today = date("Ymd");

	$args = array(
		'post_type' => $event_type,
		'posts_per_page' => -1,
		'meta_key'   => 'dates_0_date',
		'orderby'    => 'meta_value_num',
		'order'      => 'ASC',
		'meta_query' => array(
			array(
				'key'     => 'members',
				'value'   => $id,
				'compare' => '=',
			)
		),
		'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => $cat,
		),
	),
);
	$loop = new WP_Query( $args );
	$post_count = $loop->post_count;
?>
<?php if($post_count >0) : ?>

	<div class="black">
	<div class="container-fluid">
	<h2 style="background: white; display: inline-block; padding: 0 20px; color: black; margin: 0 0 20px;">Au programme</h2><br><br>
		<div class="row">

		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="col-sm-4">
			<a href="<?php the_permalink(); ?>">
				<div class="reperage_box stripes upcoming">
					<div class="white">
					<div class="event_thumb" style="padding: 30%; background-image:url(<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url(); } else {echo get_template_directory_uri() . '/img/placeholder.jpg';} ?>); background-size:cover;"></div>
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

		</div>


	</div>
</div>
<?php endif; ?>
<?php wp_reset_query(); ?>
