<div class="black fadeout">
	<div class="container ">
	<?php if(!empty(get_sub_field('introduction'))){ ?>
		<div class="introduction"><?php echo get_sub_field('introduction'); ?></div>
	<?php } ?>
		<div class="row">
		<?php $i=1; ?>
		<?php while ( have_rows('documents') ) : the_row(); ?>
			<div class="col-sm-4">
				<p><a target="_blank" href="<?php echo get_sub_field('document'); ?>"><i class="fa fa-download" aria-hidden="true"></i> <?php echo get_sub_field('nom_affiche'); ?></a></p>
			</div>
		<?php if($i % 3 == 0){echo '</div><div class="row">';} ?>
		<?php $i++; ?>
		<?php endwhile; ?>
		</div> <!-- END OF ROW -->


	</div><!--  END OF CONTAINER -->
</div>