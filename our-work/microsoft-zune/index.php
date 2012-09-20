<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	
	.hero-graphic{ position:absolute;  max-width:110%; margin:0px auto; }

	.hero .hero-graphic{ bottom:0; }
	.copy .hero-graphic{	top:0; }
	
	.hero{
		background-color:#262626;
		position:relative;
	}
	.ie8 #rawr, .ie7 #rawr, .ie6 #rawr{
		display:none;
	}
	#rawr{
		position:absolute;
/*		background:rgba(255,0,0,.2);
*/		top:134px;
		left:11px;
	}
	
	.graphic3{ max-width: 105%; margin-left:-2.5%;	}
	.graphic4{ margin-bottom: 0 !important; }
	
	@media all and (max-width: 959px){
		.graphic4{ margin-bottom: 0.4% !important; }
		.dark .container.project h2{ font-size: 3.5em ; margin-top:20px; }
		.dark .container.project h3{ font-size: 1.2em; } 
		.hero-graphic{ margin:0 0 0 -5% !important; }
	}

	@media all and (max-width: 767px){
		.graphic4{ margin-bottom: 1.1% !important; }
		.dark .container.project h2{ font-size: 3.4em ; }
		.dark .container.project h3{ font-size: 1.1em; }
	}
	
	@media all and (max-width: 600px){
		.graphic4{ margin-bottom: 1.5% !important; }
	}
	
	@media all and (max-width: 480px){
		/*.graphic4{ margin-bottom: 1.5% !important; }*/
		hr.up.nav-divider{ margin-top:-2.5%;}
	}
	
	@media all and (max-width: 320px){

	}
	
</style>

<div class="hero dark">
	<div class="container project header">
		<div class="row-fluid">
			<div class="span9">
				<h2>Microsoft Zune</h2>
				<h3>We designed and built a Flash application supporting both customization and commerce. We worked hand in hand with Microsoft over several product iterations, campaigns and feature sets.</h3>
			</div>
	
			<div class="span3 last what-it-is">
				<p>What it is</p>
				<abbr class="tablet" title="Touch devices"></abbr>
				<abbr class="mobile " title="Mobile devices"></abbr>
				<abbr class="web on" title="Web"></abbr>
			</div>
		</div>
		
		<img class="hero-graphic" src="../../imgs/projects/zune-1a.png" />
	
	</div>
</div>

<div class="container copy project relative" style="padding-top:0;">
	<img class="hero-graphic" src="../../imgs/projects/zune-1b.png" />
	
	<div class="shim-120"></div>
	
	<div class="row-fluid">
		<div class="offset1 span9 more-pad width-lg-tablet">
			<h4>Create Your Own</h4>
		
			<p>Zune Originals lets users customize any Zune device with their own imagery. Users upload a picture, tweak it with our application, have it instantly etched, and a week later it arrives at your doorstep. Pretty sweet. The site also supports custom &ldquo;tattoos&rdquo; that have been commissioned by Microsoft. We worked closely with the design team to focus on simplifying the interaction design and purchase process, allowing users to quickly customize and purchase a device.</p>
		
		</div>
	</div>
	
	<div class="row-fluid relative">
		<img src="../../imgs/projects/zune-2.png" />
		<div id="rawr" class="hide-lg-tablet"></div>
	</div>
	
	<audio preload="auto" id="cat">
	  <source src="../../sound/cat.ogg" type="audio/ogg"></source>
	  <source src="../../sound/cat.mp3" type="audio/mpeg"></source>
	  <source src="../../sound/cat.wav" type="audio/x-wav"></source>
	</audio>
	
	<script type="text/javascript">
	
	$(function (){
	    
		if($('body').hasClass('ie6') || $('body').hasClass('ie7') ||  $('body').hasClass('ie8')){
			} else {
				var rawr = document.getElementById('cat');

				//rawr.volume = 100;
				var hitArea = document.getElementById('rawr');

				hitArea.onmouseover = function (event){
					console.log('rawr');
					rawr.volume = .25;
					rawr.play();
			}
		}
	
	});
		
	</script>
	
	<div class="row-fluid width-lg-tablet">
	
		<div class="span4 last no-pad">
			
			<div class="shim-80"></div>
			
			<h4>Zune Store</h4>

			<p style="padding-right:45px">The success of the Zune Originals site led to the development of the Zune Store. Working with the design team in Redmond, we designed the store to work in tandem with new Zune.net. The store supports the sale of devices, accessories, Zune Points &amp; Zune passes. We also created limited edition pages for a Gears of War device and a Joy Division device that was timed with the release of a documentary on the band.</p>	
	
		</div>
		
		<div class="span8">
			<img src="../../imgs/projects/zune-3.png" class="graphic3" />
		</div>
		
	</div>

	
	<div class="shim-120 hide-lg-tablet"></div>
	
	<img src="../../imgs/projects/zune-4.png" class="graphic4" />
	
	<?php 
	$currentProject = 'microsoft-zune';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>