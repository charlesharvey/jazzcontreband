<ul class="bxslider">

<?php $slide_content =  get_sub_field('texte'); ?>
	<?php while ( have_rows('slides') ) : the_row() ; ?>


		<?php $image =  get_sub_field('image'); ?>
		

		<li  class="slide_photo_background" style="background-image: url(<?php echo $image['url']; ?>);" >
			 <div class="container"><div class="slide_content"><?php echo $slide_content; ?></div></div>
		</li>
	<?php endwhile; ?>


</ul>	