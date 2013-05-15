
<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); ?>

<style type="text/css">
	
	.graphic1{
		/*margin:-4% 0 0 0; */
		z-index:1;
		max-width: 112% !important;
	}
	
	#hero-graphic{ max-width:105%; }
	
	@media all and (max-width: 979px){
		.project .uber-sched .span6{
			position:relative;
			margin-left:25%;
			width:65%;
		}
		.graphic1{ margin-left: -4% !important; }
		
	}
	
	@media all and (max-width: 767px){}
	
	@media all and (max-width: 600px){		
		.project .tcenter{ text-align:left; }
	}
	
	@media all and (max-width: 480px){
		.project.copy{ padding-top:25px;}
		
		.chalkboard{ display:none; }
		
		.graphic1{  }
		.t-center{ }
	}

</style>

<div class="container project header">
	<h2>Pac-12</h2>
	<h3>An award-winning web experience for a an ambitious<br> new college sports network.</h3>
	
	<img src="../../imgs/projects/pac12-hero.png" id="hero-graphic" />
	
</div>	

<div class="container copy project">
				
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
		<div class="span4 " >
			
			<div class="shim-80"></div>
			
			<h4>The Spread Formation</h4>

			<p>We started with the basics - schedule &amp; scores and opened-up the format from there by integrating social feeds from Facebook and Twitter along with original and syndicated content. We then integrated exclusive video throughout the site to drive users to the Pac-12 digital Network.</p>
		</div>
		
		<div class="span8 last">
			<img src="../../imgs/projects/pac12-2.png">
		</div>
		
	</div>	
		
	<div class="shim-80 "></div>
	
	<img src="../../imgs/projects/pac12-1.png" class="chalkboard"/>
	
	<div class="shim-80"></div>
	
	<div class="row-fluid relative uber-sched" style="z-index:2">
		
		<div class="offset2 span8 more-pad last" >
			
			<h4>One &Uuml;ber Schedule</h4>
			
			<p>With 6 Cable Network channels and multiple digital channels, finding content was one of the key challenges of the new network. We developed a comprehensive schedule that simplifies the process. Using a big, clean design language, along with filters and schedule modules placed contextually throughout the site as well as syndicated on other sites, it's easy to find the game you’re looking for. </p> 
			
			<!-- <p>Navigating 12 teams across 21 sports created infinite complexity. The solution lorem ipsum dolar blah lorem in the end with outstanding results. <a href="" class="bold">See the video<span class="icn-play"></span></a></p> -->
			
		</div>
		
	</div>
	
	<img src="../../imgs/projects/pac12-3.png" class="graphic1 relative" />
				
	<div class="shim-40 "></div>
	
	
	<div class="shim-80 hide-tablet"></div>
	
	<div class="row-fluid width-tablet">
		
		<div class="span5 offset1">
						
			<h4>It&lsquo;s a Game of Pixels</h4>

			<p>We developed a custom set of elegant graphics and icons to reinforce the brand and differentiate the Pac-12 site from all other conference sites. Plus these are really fun to make and we geek-out on that kinda thing.</p>
		
		</div>
	
		<div class="span6 last">
					
			<img class="graphic" src="../../imgs/projects/pac12-4.png" />
		
		</div>
	</div>

	<div class="clear"></div>
	
	
	<?php 
	$currentProject = 'pac-12';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>