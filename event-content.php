
<!-- SHARED TEMPLATE BEWEEN FESTIVAL AND SAISON EVENEMENTS -->

<!-- article -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $ticketing_link = get_field('ticketing_link'); ?>
	<?php $practical_info = get_field('information'); ?>
	<?php $date = get_field('date'); ?>
	<?php $members = get_field('members'); ?>

	<div class="row">
		<div class="col-sm-8">
			<h1> <?php the_title(); ?></h1>

			<dl>
				<dt>Date:</dt>
				<dd><?php echo $date; ?></dd>
				<dt>Practical Info:</dt>
				<dd><?php echo $practical_info; ?></dd>
				<dt>Ticketing link:</dt>
				<dd><a href="<?php echo $ticketing_link; ?>"><?php echo $ticketing_link; ?></a></dd>
				<dt>Members:</dt>
				<dd><?php echo show_members($members); ?></dd>
			</dl>


		</div>
		<div class="col-sm-4">

			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<div class="member_image">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</div>
			<?php endif; ?>


		</div>
	</div>









</article>
