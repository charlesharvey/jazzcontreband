(function ($, root, undefined) {

	$(function () {

		'use strict';







		$('.forgottenpassword').on('click', function(){
			$('.loginform').hide();
			$('.lostpasswd').show();
		})

		$('.notforgotten').on('click', function(){
			$('.lostpasswd').hide();
			$('.loginform').show();
		})

		$('.lostpasswd, .loginform').on('click', function(event){
			event.stopPropagation();
		})

		$('a.login').on('click', function(event){
			event.preventDefault();
			$('.loginformcontainer').show();
		})

		$('.loginformcontainer').on('click', function(){
			$(this).hide();
			$('body').css({'height' : 'auto'});
		})

		var $navigation_menu = $('#navigation_menu');
		var $menu_button = $('#menu_button');

		$menu_button.on('click', function(){

			$navigation_menu.toggleClass('menu_visible');

		});

		// if press escape key, hide menu
		$(document).on('keydown', function(e){

			if(e.keyCode == 27 ){
				$navigation_menu.removeClass('menu_visible');

				$('.search_box').removeClass('visible');
			}

		})

		$('.section_colonnes').each(function(){
			$(this).find('.sectioncol').matchHeight();
			$(this).find('.content').matchHeight();

		})

		var left_height = $('.nexttomap').outerHeight();
		console.log(left_height);
		$('.single-membre #member_map_container').css({
			'height' : left_height
		})


		$('#partner_slider').bxSlider({
			minSlides:3,
			maxSlides:3,
			slideWidth:300,
			slideMargin:10,
			auto:!0,
			controls:!1,
			autoControls:!1,
			pager:!1
		});




		// CALENDAR
		if (typeof calendar_api_url != 'undefined'){



			var $events_container = $('#events_container');
			var $show_all_events = $('#show_all_events');
			var $events_template = $('#events_template').html();




			var $calendar_template = $('#calendar_template').html();
			var $events_calendar = $('#events_calendar');
			var now = moment().startOf('month');
			var start = now.format("YYYY-MM-DD");
			var end =  now.add(1, 'months').subtract(1, 'day').format("YYYY-MM-DD");


			console.log(calendar_api_url);

			$.ajax({
				url: calendar_api_url,
				data: {start: start, end: end }
			}).done(function( data ) {

				// ORIGINAL SET OF EVENTS
				var events = processEvents(data);
				var original_events = events;

				var compiled =  _.template($events_template);


				displayEvents(events, $events_container, compiled)

				var cal1 = $events_calendar.clndr({
					template: $calendar_template,
					forceSixRows: true,
					events: data,
					multiDayEvents: {
						singleDay: 'date',
						endDate: 'endDate',
						startDate: 'startDate'
					},
					clickEvents: {
						click: function (target) {
								var target_date = target.date._i;
								var processed_events = processEvents(original_events, target_date);
								displayEvents(processed_events, $events_container, compiled);

								$show_all_events.show();
						}

					}
				});

				$show_all_events.on('click', function(e){
					  e.preventDefault();
						displayEvents(original_events, $events_container, compiled);
						$show_all_events.hide();

				})








			});




		}



















		// MEMBERS MAP
		if (typeof $member_locations != 'undefined') {



			// var map_theme = [{"featureType":"all","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20},{"visibility":"off"},{"saturation":"100"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#292929"}]},{"featureType":"landscape.man_made","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ff0000"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#fcea1d"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"lightness":"-10"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":"-52"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"},{"color":"#fcea1d"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":17},{"visibility":"on"},{"saturation":"-60"}]}];

			// var map_theme = [{"featureType":"all","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#e5c163"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#c4c4c4"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#e5c163"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"landscape","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21},{"visibility":"on"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":"0"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#000000"},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":"-37"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":"-84"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#999999"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":"-30"},{"saturation":"-100"}]}];

			var map_theme = [{"featureType":"all","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":-30}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#353535"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#656565"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"lightness":"-31"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#505050"},{"lightness":"-14"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"color":"#808080"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#454545"}]},{"featureType":"transit","elementType":"labels","stylers":[{"saturation":100},{"lightness":-40},{"invert_lightness":true},{"gamma":1.5},{"color":"#000000"}]},{"featureType":"transit","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#fcea1d"}]}];

			var map_options = {
				zoom: 13,
				mapTypeControl: true,
				scrollwheel: false,
				draggable: true,
				navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				styles: map_theme
			};


			var member_map_container = $('#member_map_container');
			member_map_container.css({
				width : '100%',
				//height: 560
			})

			var member_map = new google.maps.Map(member_map_container.get(0), map_options);
			var member_bounds = new google.maps.LatLngBounds();
			var member_infowindow = new google.maps.InfoWindow({content: '...'});
			var member_markers = [];

			for (var  i = 0;  i < $member_locations.length ;i++) {
				var member_location = $member_locations[i];
				if (member_location != null) {
					addPointToMap(member_map, member_location, member_bounds, member_infowindow, member_markers);
				}

			}

			// This is needed to set the zoom after fitbounds,
			google.maps.event.addListener(member_map, 'zoom_changed', function() {

				if (this.getZoom() > 15 && this.initialZoom == true) {
					// Change max/min zoom here
					this.setZoom(15);
					this.initialZoom = false;
				}

			});
			member_map.initialZoom = true;
			member_map.fitBounds(member_bounds);


		};








	});

})(jQuery, this);




function displayEvents(events, events_container, compiled){


	var $s_events =  processEvents(events);

	events_container.html(  compiled({ events:   $s_events  })  );


	$('#back_to_top').on('click', function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, 500);
	});


}


function processEvents(events, date){

	if (date && date != '' ){
		var events = _.filter(  events ,  function(e) {

			if ( Array.isArray(e.date)) {
				 return  e.date.indexOf( date ) > -1  ;
			} else {
				return  e.date == date ;
			}


		});
	}



	var events_array =  _.toArray(events) ;

	// PROCESS ARRAY
	for (var i = 0; i < events_array.length ; i++) {
		var event = events_array[i];
	}
	return events_array;
}



function addPointToMap(map,  location, bounds, infowindow, markers ) {
	var latitude = location.lat;
	var longitude = location.lng;
	var customMarker = {
		url: document.location.origin + '/jazzcontreband/wp-content/themes/jazzcontreband/img/marker.svg',
		size: new google.maps.Size(20, 20),
		origin: new google.maps.Point(0, 0),
		anchor: new google.maps.Point(15, 22)
	};

	var latlng = new google.maps.LatLng(  latitude , longitude);
	var marker = new google.maps.Marker({
		map: map,
		position: latlng,
		title: location.title,
		url: location.url,
		id: location.id,
		icon: customMarker
	});

	marker.addListener('click', function() {
		infowindow.setContent('<a class="map_link" href="'  + this.url + '">' + this.title + '</a>'  );
		infowindow.open(map, this);
	});

	markers.push(marker);

	bounds.extend(latlng);


};
