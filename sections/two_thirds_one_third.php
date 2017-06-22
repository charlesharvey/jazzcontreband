<?php //$image =  get_sub_field('one_third_image'); ?>
<?php //$image_position = get_sub_field('image_position'); ?> 
<?php $image_position = 'right'; ?>
<?php  $classes = ($image_position == 'right') ?  [ 'col-sm-8 col-sm-text-right', 'col-sm-4' ]  :  [ 'col-sm-8 col-sm-push-4', 'col-sm-4 col-sm-pull-8' ]  ; ?> 

<div class="container white">
	<div class="row">


		<div class="<?php echo $classes[0]; ?>">
		<?php echo get_sub_field('big_col'); ?>
		</div>


		<div class="<?php echo $classes[1]; ?>">
		<?php echo get_sub_field('small_col'); ?>
		</div>

	</div> <!-- END OF ROW -->

</div><!--  END OF CONTAINER -->
