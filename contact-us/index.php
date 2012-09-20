<?php 
$parentPage = 'mobile-menu';
require('../inc/header.php'); 
?>


<style type="text/css">	

	@media all and (max-width: 959px){
		
	}

	@media all and (max-width: 767px){
		.contact-us hr.up{ margin-bottom: 10px; }
		.contact-us form{ margin-bottom: 40px; }
	}

	@media all and (max-width: 480px){
		
	}
	
	@media all and (max-width: 320px){

	}

</style>

<div class="container project contact-us">
	
	<div class="header">
	<h2>Contact Us</h2>
	</div>
	<hr class="up" />
	
	<div class="row-fluid width-tablet">
		
		<div class="span6 last right" >
			<p class="address relative"><img src="../imgs/map-pin.png" class="pin" />
				<strong><img src="../imgs/17feet-logo-black.png" width="76" height="13" alt="17feet Logo Black"></strong><br class="hold"/>
				256 Sutter Street, 5th Floor<br class="hold"/>
				San Francisco CA 94108<br class="hold"/>
				Tel: 415.896.1738<br class="hold"/>
				Fax: 415.896.1738<br class="hold"/>
				<script type="text/javascript">
				//<![CDATA[
				<!--
				var x="function f(x){var i,o=\"\",l=x.length;for(i=0;i<l;i+=2) {if(i+1<l)o+=" +
				"x.charAt(i+1);try{o+=x.charAt(i);}catch(e){}}return o;}f(\"ufcnitnof x({)av" +
				" r,i=o\\\"\\\"o,=l.xelgnhtl,o=;lhwli(e.xhcraoCedtAl(1/)3=!84{)rt{y+xx=l;=+;" +
				"lc}tahce({)}}of(r=i-l;1>i0=i;--{)+ox=c.ahAr(t)i};erutnro s.buts(r,0lo;)f}\\" +
				"\"(0),1\\\"\\\\GC\\\\M\\\\\\\\V\\\\3M02\\\\\\\\L^02\\\\01\\\\00\\\\\\\\16\\" +
				"\\0B\\\\37\\\\07\\\\01\\\\\\\\14\\\\06\\\\01\\\\\\\\WP1%00\\\\\\\\16\\\\05\\"+
				"\\00\\\\\\\\17\\\\0t\\\\\\\\\\\\`/77\\\\10\\\\00\\\\\\\\)zx,?;94p6\\\\rm\\\\"+
				"\\\\*\\\\\\\"9\\\\?%kj24\\\\0*\\\\&)7j$'0&01\\\\\\\\17\\\\0}\\\\VYW]GQ14\\\\"+
				"0Z\\\\_@P[r]\\\\\\\\0r02\\\\\\\\NJAX10\\\\0F\\\\32\\\\07\\\\00\\\\\\\\14\\\\"+
				"0M\\\\DNvTjlm5pyd~bl\\\\o(\\\"}fo;n uret}r);+)y+^(i)t(eAodrCha.c(xdeCoarCho" +
				"mfrg.intr=So+7;12%=;y++)y10i<f({i+)i+l;i<0;i=r(foh;gten.l=x,l\\\"\\\\\\\"\\" +
				"\\o=i,r va){,y(x fontincfu)\\\"\")"                                          ;
				while(x=eval(x));
				//-->
				//]]>
				</script>
				<br class="hold"/><a href="http://maps.google.com/maps?q=17feet+256+Sutter+St+%235+San+Francisco,+CA+94108&um=1&ie=UTF-8&sa=N&hl=en&tab=wl" title="17feet on Google Maps"><img class="map"  src="http://maps.google.com/maps/api/staticmap?center=37.789824,-122.404788&zoom=16&markers=icon:http://17feet.com/imgs/map-pin-4.png%7Cshadow:false|37.789824,-122.404788&size=350x140&sensor=false" /></a>
			</p>
			
			<!-- <div id="map_canvas"></div> -->
			
			
				
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



<script type="text/javascript">
// function initialize() {
//   var mapOptions = {
//     zoom: 8,
//     center: new google.maps.LatLng(-34.397, 150.644),
//     mapTypeId: google.maps.MapTypeId.ROADMAP
//   }
//   var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
// }

function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyBOYdo64MsVvVLX2ATEga_lwDsl3vZsFmg&sensor=false&callback=initializeMap";
  document.body.appendChild(script);
}

//window.onload = loadScript;


// Google Maps API
function initializeMap() {
	var latlng = new google.maps.LatLng(37.789824,-122.404788);
	var settings = {
		zoom: 13,
		center: latlng,
		scrollwheel: false,
		navigationControl: false,
		scaleControl: false,
		streetViewControl: false,
		draggable: true, 
		mapTypeControl: true,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: true,
		navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
		mapTypeId: google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
var point = new google.maps.LatLng(37.789824,-122.404788);


// var image = new google.maps.MarkerImage(
//   'img/icon_marker.png',
//   new google.maps.Size(42,62),
//   new google.maps.Point(0,0),
//   new google.maps.Point(21,62)
// );
// 
// var shadow = new google.maps.MarkerImage(
//   'img/icon_marker_shadow.png',
//   new google.maps.Size(76,62),
//   new google.maps.Point(0,0),
//   new google.maps.Point(21,62)
// );
// 
// 
// 
// var shape = {
//   coord: [27,0,29,1,31,2,33,3,34,4,35,5,36,6,37,7,38,8,38,9,39,10,39,11,40,12,40,13,40,14,41,15,41,16,41,17,41,18,41,19,41,20,41,21,41,22,41,23,41,24,41,25,41,26,40,27,40,28,40,29,40,30,39,31,39,32,39,33,38,34,38,35,37,36,37,37,37,38,36,39,36,40,35,41,35,42,34,43,34,44,33,45,33,46,32,47,31,48,31,49,30,50,30,51,29,52,28,53,28,54,27,55,26,56,26,57,25,58,24,59,23,60,22,61,20,61,18,60,17,59,17,58,16,57,15,56,14,55,14,54,13,53,12,52,12,51,11,50,11,49,10,48,9,47,9,46,8,45,8,44,7,43,7,42,6,41,6,40,5,39,5,38,4,37,4,36,4,35,3,34,3,33,2,32,2,31,2,30,2,29,1,28,1,27,1,26,1,25,1,24,0,23,0,22,0,21,0,20,0,19,0,18,0,17,1,16,1,15,1,14,1,13,2,12,2,11,3,10,3,9,4,8,5,7,6,6,7,5,8,4,9,3,10,2,12,1,15,0,27,0],
//   type: 'poly'
// };

// var marker = new google.maps.Marker({
//   draggable: true,
//   raiseOnDrag: false,
//   icon: image,
//   shadow: shadow,
//   shape: shape,
//   map: map,
//   position: point
// });


var red_road_styles = [
  {
    featureType: "all",
    stylers: [
	  { hue: "#69AABA" },
      { saturation: -25 }
    ]
  }// ,
  //   {
  //     featureType: "road.highway",
  //     stylers: [
  //       { hue: "#69AABA" },
  //       { saturation: 0 }
  //     ]
  //   }
];

//map.setOptions({styles: red_road_styles});
}

</script>


<?php require('../inc/footer.php'); ?>