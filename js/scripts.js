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






		// MEMBERS MAP
		if (typeof $member_locations != 'undefined') {



			var map_theme = [{"featureType":"all","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20},{"visibility":"off"},{"saturation":"100"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#292929"}]},{"featureType":"landscape.man_made","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#000000"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ff0000"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#fcea1d"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"lightness":"-10"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#fcea1d"},{"lightness":"-52"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"},{"color":"#fcea1d"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#fcea1d"},{"lightness":17},{"visibility":"on"},{"saturation":"-60"}]}];

			var map_options = {
				zoom: 13,
				mapTypeControl: true,
				scrollwheel: false,
				draggable: true,
				navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
				mapTypeId: google.maps.MapTypeId.ROADMAP,
		//		styles: map_theme
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
			member_map.initialZoom = true;
			member_map.fitBounds(member_bounds);




		};








	});

})(jQuery, this);






function addPointToMap(map,  location, bounds, infowindow, markers ) {
	var latitude = location.lat;
	var longitude = location.lng;
	var customMarker = {
		url: document.location.origin + '/jazzcontraband/wp-content/themes/jazzcontraband/img/marker.svg',
		size: new google.maps.Size(30, 45),
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
		infowindow.setContent(this.title +  '<br><a href="' + this.url + '">Voir</a>'     );
		infowindow.open(map, this);
	});

	markers.push(marker);

	bounds.extend(latlng);


};
