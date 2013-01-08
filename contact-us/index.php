<?php 
$parentPage = 'mobile-menu contact-us';
require('../inc/header.php'); 
?>


<style type="text/css">	

	@media all and (max-width: 979px){ }

	@media all and (max-width: 767px){
		.contact-us hr.up{ margin-bottom: 10px; }
		.contact-us form{ margin-bottom: 40px; }
	}

	@media all and (max-width: 480px){ }
	
	@media all and (max-width: 320px){ }

</style>

<div class="container static contact-us">
	
	<div class="header">
		<h2>Contact Us</h2>

	</div>
	
	<div class="row-fluid width-tablet">
		
		<div class="span6 last right" >
			<p class="address relative"><img src="../imgs/map-pin.png" class="pin" />
				<strong><img src="../imgs/17feet-logo-black.png" width="76" height="13" alt="17feet Logo Black"></strong><br class="hold"/>
				256 Sutter Street, 5th Floor<br class="hold"/>
				San Francisco CA 94108<br class="hold"/>
				Tel: 415.896.1738<br class="hold"/>
				Fax: 415.896.1738<br class="hold"/>
				
				<br class="hold"/><!-- <a href="http://maps.google.com/maps?q=17feet+256+Sutter+St+%235+San+Francisco,+CA+94108&um=1&ie=UTF-8&sa=N&hl=en&tab=wl" title="17feet on Google Maps"><img class="map"  src="http://maps.google.com/maps/api/staticmap?center=37.789824,-122.404788&zoom=16&markers=icon:http://17feet.com/imgs/map-pin-4.png%7Cshadow:false|37.789824,-122.404788&size=350x140&sensor=false" /></a> -->
			</p>			
				
		</div>
		
		<div class="span6 left relative" >
		
			<form action="#" id="contact_form" method="POST">
				<div>
					<input type="text" name="contactName" class="type_text" title="Name" value="Name" /><br />
					<input type="text" name="contactEmail" class="type_text" title="Email" value="Email" /><br />
					<textarea  name="contactMessage" rows="8" cols="20" title="Message" class="type_text">Message</textarea>
					<div class="blueBtn">
						<input type="submit" class="submit" alt="Submit" value="Submit" title="Submit"/>
					</div>
				</div>
			</form>		
		</div>		
	
	</div>
</div>

<div id="map_canvas"></div>

<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYdo64MsVvVLX2ATEga_lwDsl3vZsFmg&sensor=false">
    </script>

<script type="text/javascript">

// Google Maps API
function initializeMap() {
	var latlng = new google.maps.LatLng(37.789824,-122.404788);
	var settings = {
		zoom: 13,
		center: latlng,
		scrollwheel: false,
		scaleControl: false,
		streetViewControl: false,
		draggable: true, 
		mapTypeControl: false,
		//mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: true,
		navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
	var point = new google.maps.LatLng(37.789824,-122.404788);

	var image = new google.maps.MarkerImage(
	  '../imgs/feeter-pin.png',
	  new google.maps.Size(62,92),
	  new google.maps.Point(0,0),
	  new google.maps.Point(30,80)
	);
	
	var marker = new google.maps.Marker({
	  draggable: true,
	  raiseOnDrag: false,
	  icon: image,
	  // shadow: shadow,
	  // shape: shape,
	  map: map,
	  position: point
	});

	
	// var red_road_styles = [
	//   {
	//     featureType: "all",
	//     stylers: [
	// 	  { hue: "#69AABA" },
	//       { saturation: 0 }
	//     ]
	//   },
	//   {
	//     featureType: "road.highway",
	//     stylers: [
	//       { hue: "#ED484E" },
	//       { saturation: 100 }
	//     ]
	//   }
	// ];

	var map_styles = [
	  {
	    "featureType": "poi",
	    "elementType": "geometry",
	    "stylers": [
	      { "hue": "#2bff00" },
	      { "lightness": 32 },
	      { "saturation": 20 }
	    ]
	  },{
	    "featureType": "landscape",
	    "stylers": [
	      { "saturation": -100 },
	      { "lightness": 58 }
	    ]
	  },{
	    "featureType": "road.highway",
	    "stylers": [
	      { "hue": "#ff6e00" }
	    ]
	  },{
	    "featureType": "road.arterial",
	    "elementType": "geometry",
	    "stylers": [
	      { "color": "#ffad55" },
	      { "saturation": 100 },
	      { "weight": 0.5 }
	    ]
	  },{
	    "featureType": "water",
	    "stylers": [
	      { "saturation": -14 },
	      { "hue": "#00ddff" },
	      { "lightness": -9 }
	    ]
	  },{
	    "featureType": "transit.line",
	    "stylers": [
	      { "visibility": "off" }
	    ]
	  },{
	    "featureType": "road.arterial",
	    "elementType": "labels.text.stroke",
	    "stylers": [
	      { "lightness": 100 },
	      { "weight": 2.7 }
	    ]
	  },{
	    "featureType": "administrative",
	    "elementType": "labels.text.stroke",
	    "stylers": [
	      { "color": "#ffffff" },
	      { "weight": 3.5 }
	    ]
	  },{
	    "featureType": "road.highway",
	    "elementType": "labels.text.stroke",
	    "stylers": [
	      { "weight": 2.3 }
	    ]
	  },{
	    "featureType": "poi",
	    "elementType": "labels",
	    "stylers": [
	      { "visibility": "off" }
	    ]
	  }
	];

	map.setOptions({styles: map_styles});
	
}

window.onload = initializeMap;

</script>


<?php require('../inc/footer.php'); ?>