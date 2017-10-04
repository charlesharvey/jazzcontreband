<!-- FOR REFERENCE ONLY - THIS IS THE TEMPLATE USED IN THE PLUGIN AJAX LOAD MORE IN CASE THAT GETS DELETED. LAST SAVED ON OCTOBER 4TH 2017 -->

<?php $author_id = get_the_author_meta('ID'); ?>
<?php $link1 = get_field('lien_1'); ?>
<?php $link2 = get_field('lien_2'); ?>
<?php $link3 = get_field('lien_3'); ?>
<?php $style = get_field('style'); ?>
<?php $origin = get_field('origine'); ?>
<?php $number = get_field('numbre'); ?>
<?php if ($number > 1){ $s = 's';} else {$s = '';} ?>
<?php $contact = get_field('contact'); ?>
<?php $tel1 = get_field('tel_1'); ?>
<?php $tel2 = get_field('tel_2'); ?>
<?php $email1 = get_field('artist_email'); ?>
<?php $email1 = get_field('artist_email'); ?>
<?php $adresse = get_field('adresse'); ?>


<li class="reperage_box stripes">
<div class="white">
	<h3><?php the_title(); ?></h3>
<div class="links">
<a class="<?php if(get_field('country') =='Suisse'){ echo 'flag suisse_flag';}elseif(get_field('country') =='France'){echo 'flag france_flag';} else{echo 'flag suisse_flag"></a><a class="flag france_flag';} ?>"></a>
<?php if(!empty($link1)){ ?>
<?php if (strpos($link1, 'http') === false) {$link1 = '//' . $link1;} ?>
<a href="<?php echo $link1; ?>" target="_blank">
	<?php if (strpos($link1, 'youtube') !== false) { echo '<i class="fa fa-youtube-play" aria-hidden="true"></i>';}
	elseif (strpos($link1, 'soundcloud') !== false) { echo '<i class="fa fa-soundcloud" aria-hidden="true"></i>';}
	elseif (strpos($link1, 'facebook') !== false) { echo '<i class="fa fa-facebook" aria-hidden="true"></i>';}
	else { echo '<i class="fa fa-link" aria-hidden="true"></i>';} ?>
</a>
<?php } ?>
<?php if(!empty($link2)){ ?>
<?php if (strpos($link2, 'http') === false) {$link2 = '//' . $link2;} ?>
<a href="<?php echo $link2; ?>" target="_blank">
	<?php if (strpos($link2, 'youtu') !== false) { echo '<i class="fa fa-youtube-play" aria-hidden="true"></i>';}
	elseif (strpos($link2, 'soundcloud') !== false) { echo '<i class="fa fa-soundcloud" aria-hidden="true"></i>';}
	elseif (strpos($link2, 'facebook') !== false) { echo '<i class="fa fa-facebook" aria-hidden="true"></i>';}
	else { echo '<i class="fa fa-link" aria-hidden="true"></i>';} ?>
</a>
<?php } ?>
<?php if(!empty($link3)){ ?>
<?php if (strpos($link3, 'http') === false) {$link3 = '//' . $link3;} ?>
<a href="<?php echo $link3; ?>" target="_blank">
	<?php if (strpos($link3, 'youtube') !== false) { echo '<i class="fa fa-youtube-play" aria-hidden="true"></i>';}
	elseif (strpos($link3, 'soundcloud') !== false) { echo '<i class="fa fa-soundcloud" aria-hidden="true"></i>';}
	elseif (strpos($link3, 'facebook') !== false) { echo '<i class="fa fa-facebook" aria-hidden="true"></i>';}
	else { echo '<i class="fa fa-link" aria-hidden="true"></i>';} ?>
</a>
<?php } ?>
</div>
<div class="clear"></div>
<p class="info-group">
<span class="added">Ajouté le <?php the_time("d F Y"); ?> par <a href="?auteur=<?php echo $author_id; ?>"><?php echo get_the_author(); ?></a></span>
<?php if(!empty($style)){echo '<span class="style"><em>Style</em>: ' . $style . '</span>'; } ?>
<?php if(!empty($origin)){echo '<span class="origine"><em>Origine</em>: ' . $origin . '</span>'; } ?>
<?php if(!empty($number)){echo '<span class="musiciens">' . $number . ' musicien' . $s . '</span>'; } ?>
</p>
<hr>
<div class="description"><?php echo wpautop(get_field('commentaires')); ?></div>
<hr>
<div class="contact">
<?php if(!empty($contact)){echo '<span><i class="fa fa-user" aria-hidden="true"></i> ' . $contact . '</span>'; } ?>
<?php if(!empty($tel1)){echo '<span><i class="fa fa-phone" aria-hidden="true"></i> ' . $tel1 . '</span>'; } ?>
<?php if(!empty($tel2)){echo '<span><i class="fa fa-phone" aria-hidden="true"></i> ' . $tel2 . '</span>'; } ?>
<?php if(!empty($email1)){echo '<span><i class="fa fa-at" aria-hidden="true"></i> ' . $email1 . '</span>'; } ?>
<?php if(!empty($email2)){echo '<span><i class="fa fa-at" aria-hidden="true"></i> ' . $email2 . '</span>'; } ?>
<?php if(!empty($adresse)){echo '<span class="adresse"><i class="fa fa-map-marker" aria-hidden="true"></i> ' . $adresse . '</span>'; } ?>
</div>
<?php if( current_user_made_reperage()  ) : ?>
	<?php echo  edit_reperage_link( get_the_ID()  ); ?>
<?php endif; ?>
<div class="clear"></div>
</li>
