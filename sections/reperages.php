<?php

$rs = ( isset($_GET['search'])) ? $_GET['search'] : false;

?>

<div class="white">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-push-8">

				<aside>
					<form method="get">
					<label for="search_rep">Search Terms</label>
					<input type="text" id="search_rep" name="search" value="<?php echo $rs; ?>" />
					</form>
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

			else:
				echo do_shortcode('[ajax_load_more post_type="reperage"]');
			endif;

			?>


			</div>
		</div>
	</div>
</div>