<?php $images =  get_sub_field('images'); ?>

<?php if ($images) : ?>


	<br>
	<div class="img_gallery ">
		<?php foreach($images as $image): ?>
			<a class="gallery" href="<?php echo ($image['url']); ?>"><img src="<?php echo ($image['url']); ?>" alt="" /></a>
		<?php endforeach; ?>
	</div>
	<br>
	<br>
<?php endif; ?>
<div class="clear"></div>
