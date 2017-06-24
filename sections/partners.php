<div id="partner_logos">

	<div style="max-width: 80%; width:80%;margin:auto; padding: 0 30px;position:relative">
<ul id="partner_slider">


<?php
	$partners = get_posts(array('posts_per_page'=> -1, 'post_type' => 'logo')  );
	foreach ( $partners as $post ) :
			setup_postdata( $post );
			$partner_link=get_field('link');
			// $partner_link = get_field('lien');
			$partner_img = thumbnail_of_post_url($post->ID, 'full');
			 ?>
	<li>
		<?php if ($partner_link !=''): ?><a target="_blank" href="<?php echo $partner_link; ?>"><?php endif; ?>
		<div class="partenaire_inner" style="background-image:url(<?php echo $partner_img; ?>);"></div>
			<!-- <img src="<?php echo $partner_img; ?>" alt="<?php the_title(); ?>"><?php the_title(); ?> -->
		<?php if ($partner_link !=''): ?></a><?php endif; ?>
	</li>
<?php endforeach; wp_reset_postdata();?>
</ul>
<div class="clear"></div>
</div>
</div>
