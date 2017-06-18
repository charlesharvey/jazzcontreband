

<div class="white" id="programme_container">

	<div class="container">

		<h2 style="text-align:center; margin-bottom:50px">Programme</h2>


		<div class="row">
			<div class="col-sm-8">

				<div id="events_container">
					<span class="loading glyphicon glyphicon-cog"></span>
				</div>


			</div>
			<div class="col-sm-4">


				<aside>

					<div id="events_calendar">
						<span class="loading glyphicon glyphicon-cog"></span>
					</div>
					<a href="#" id="show_all_events">Show all events</a>


				</aside>


			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var calendar_api_url = '<?php echo home_url(); ?>/api/v1/?evenement_festival=true';
</script>


<script id="calendar_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/calendar.underscore'); ?>
</script>
<script id="events_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/events_festival.underscore'); ?>
</script>
