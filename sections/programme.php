

<div class="white" id="programme_container">

	<div class="container">

		<h2 id="events_title" data-title="Programme" style="text-align:center; margin-bottom:50px">Programme</h2>


		<div class="row">
			<div class="col-sm-8">

				<div id="events_container">
					<span class="loading"></span>
				</div>


			</div>
			<div class="col-sm-4">


				<aside>

					<div id="events_calendar">
						<span class="loading"></span>
					</div>
					<a href="#" id="show_all_events">Show all events</a>


				</aside>


			</div>
		</div>
	</div>
</div>

<?php $event_type = get_sub_field('event_type'); ?>
<script type="text/javascript">
	var calendar_api_url = '<?php echo home_url(); ?>/api/v1/?<?php echo ($event_type); ?>=true';
</script>


<script id="calendar_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/calendar.underscore'); ?>
</script>
<script id="events_template" type="x-underscore">
<?php echo file_get_contents( get_stylesheet_directory() . '/templates/events_festival.underscore'); ?>
</script>
