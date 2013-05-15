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
		<h2>Say hello!</h2>
		<div class="map-info-wrap">
			<p id="map_contact">256 Sutter Street, 5th Floor<br class="hold"/>
			San Francisco CA 94108<br class="hold"/>
			Tel: 415.896.1738<br class="hold"/>
			<a href="mailto:pingme@17feet">pingme@17feet.com</a></p>
		</div>
	</div>
	
	<div class="row-fluid width-tablet">
		
		<div class="span6 offset3 relative" >
		
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOYdo64MsVvVLX2ATEga_lwDsl3vZsFmg&sensor=false"></script>

<script type="text/javascript" src="../js/infobox.js"></script>

<script type="text/javascript">

// Google Maps API
function initializeMap() {
	var latlng = new google.maps.LatLng(37.795824,-122.404788);
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
	  animation: google.maps.Animation.DROP,
	  map: map,
	  position: point,
	  zIndex: 2
	});	
	
	var infowindow = new InfoBox({
	    content: document.getElementById("map_contact"),
		disableAutoPan: false,
		closeBoxURL: '',
		alignBottom: true,

		boxClass: "map-box"
		
	});
	
	setTimeout(function(){
		infowindow.open(map,marker);
	},500)
	
	

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