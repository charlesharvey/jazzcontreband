

<div class="white" id="programme_container">

	<div class="container">

		<!-- <h2 id="events_title" data-title="Programme" style="text-align:center; margin-bottom:50px">Programme</h2> -->


		<div class="row">

			<div class="col-sm-4 col-sm-push-8">


				<aside style="padding: 15px 30px 35px; text-align: center;">

				<h4>Rechercher</h4>

					<div id="events_calendar">
						<span class="loading"></span>
					</div>
					<div class="clear"></div>
					<h6  id="show_all_events"><a href="#">Tout le programme</a></h6>


				</aside>


			</div>
			<div class="col-sm-8 col-sm-pull-4">

				<div id="events_container">
					<span class="loading"></span>
				</div>


			</div>
		</div>
	</div>
</div>

<?php $event_type = get_sub_field('event_type'); ?>
<?php if($event_type=='evenement_festival'){
	$category = get_sub_field('year_festival');
} else {
	$category = get_sub_field('year_season');
} ?>
<script type="text/javascript">
	var calendar_api_url = '<?php echo home_url(); ?>/api/v1/?<?php echo ($event_type); ?>=true&category=<?php echo $category; ?> ';
</script>


<script id="calendar_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/calendar.underscore'); ?>
</script>
<script id="events_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/events_festival.underscore'); ?>
</script>
