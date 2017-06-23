<?php

$rs = ( isset($_GET['search'])) ? $_GET['search'] : false;
$ru = ( isset($_GET['auteur'])) ? $_GET['auteur'] : false;
$rc = ( isset($_GET['country'])) ? $_GET['country'] : false;

?>

<div class="white" id="reperages">
	<div class="container">
		<div class="row">
		<h2 style="text-align:center; margin-bottom:50px">Repérages</h2>
			<div class="col-sm-4 col-sm-push-8">

				<aside>
					<form method="get" style="margin-bottom:30px;">
					<label for="search_rep">
						<h4>Rechercher</h4>
					</label>
					<input type="text" id="search_rep" name="search" value="<?php echo $rs; ?>" />
					</form>

					<a href="?country=France" class="country_search">> France</a>
					<a href="?country=Suisse" class="country_search">> Suisse</a>
					<a href="?#reperages">> Tous les repérages</a>

					<h4>Mes repérages</h4>
					<a href="?auteur=<?php echo get_current_user_id(); ?>#reperages">> Tous mes repérages</a>
					<h6><a href="<?php echo site_url('/reperage-admin')?>">Ajouter un repérage</a></h6>


				</aside>


			</div>
			<div class="col-sm-8 col-sm-pull-4">
				<?php

			if (isset($rs) && $rs != '' ):

					// SEARCH THE META FIELDS
					$meta_keys =  implode( array_keys( reperage_fields() ) , ':' );
					$meta_values = $meta_compares = $meta_chars = array();
					for ($i=0; $i < sizeof( reperage_fields())  ; $i++) {
						array_push($meta_values ,  $rs);
						array_push($meta_compares ,  'LIKE');
						array_push($meta_chars ,  'CHAR');
					}
					$meta_values =  implode($meta_values, ':');
					$meta_compares =  implode($meta_compares, ':');
					$meta_chars =  implode($meta_chars, ':');
					echo do_shortcode('[ajax_load_more post_type="reperage" meta_key="'. $meta_keys .'" meta_value="'. $meta_values.'" meta_compare="'. $meta_compares.'" meta_type="'. $meta_chars.'" meta_relation="OR"   ]');

			elseif (isset($rc) && $rc != '' ):

						echo do_shortcode('[ajax_load_more post_type="reperage" meta_key="country" meta_value="' . $rc . '" ]');

			elseif (isset($ru) && $ru != '' ):

				echo do_shortcode('[ajax_load_more post_type="reperage" author="' . $ru . '" ]');

			else:
				echo do_shortcode('[ajax_load_more post_type="reperage"]');
			endif;

			?>


			</div>
		</div>
	</div>
</div>

<?php if ($rs || $ru || $rc) : ?>
<script>
	var scroll_to_reperage_form = true;
</script>
<?php endif; ?>
