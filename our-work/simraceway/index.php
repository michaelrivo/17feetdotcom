<?php 
$parentPage = 'our-work-btn';
$pageTitle = '';
require('../../inc/header.php'); ?>

<style type="text/css">
	#hero-graphic{
		/*position:absolute;
		bottom:-19%;
		left:2%;*/
		margin:15px 0 15px auto;
		display:block;
	}
	
	@media all and (max-width: 979px){
		#hero-graphic{ max-width:100%; left: 0; }
	}
	
	@media all and (max-width: 767px){ }
	
	@media all and (max-width: 480px){
		#hero-graphic{ max-width:105% !important; }
		.project.copy{ padding-top:25px;}
	}

</style>

<div class="container project header">
		
	<h2>Simraceway</h2>
	<h3>We created a new web platform for the hottest simulated racing game made and played by Pros.</h3>	
		
</div>	

<div class="container copy project">
	
	<img src="../../imgs/projects/simraceway-mclaren.png" id="hero-graphic" />
	
	<div class="shim-40"></div>
	
	<div class="row-fluid relative">
			
			<div class="span5 right no-pad">
					
				<h4>Bringing it All Back Home</h4>

				<p>Simraceway is revolutionizing the racing world by blurring the line between sim racing and reality. Drivers compete in a wide range of events to win big prizes, including racing hardware, cash, and unforgettable automotive experiences. The site serves as a marketing vehicle to drive game downloads and an administrative hub where users login to buy cars, tracks, enter races, and manage their profile. The information architecture keeps the data flowing between the PC game and the web in one simple interface.</p>
				
				<div class="shim-40"></div>
				
				<img src="../../imgs/projects/simraceway-2.png" class="hide-lg-tablet right" style="max-width: 115%; position: relative; margin-left: -4%;" />		
				
			</div>
			
			<div class="span7 left">
				<img src="../../imgs/projects/simraceway-1.png" style="position:relative; left:-10%" />
			</div>
			
			
		</div>
	
	<div class="shim-160 hide-lg-tablet"></div>
	<div class="shim-40"></div>
	
	
	<div class="row-fluid relative">
		
			<div class="span5 last relative width-lg-tablet" >
			
				<div class="shim-40"></div>
			
				<h4>Visual System</h4>

				<p>We designed a visual system to clearly present all the game attributes - from sexy cars and tracks to detailed race data. We focused on creating a design system rooted in the real-world of racing, leveraging the best of the racing world with modern web standards.</p>
				
				<p>We were psyched to partner with <a href="http://pivotallabs.com" class="external">Pivotal Labs</a> on the development of the site.</p>
			
			</div>
			
			<div class="span7 width-lg-tablet">
				<img src="../../imgs/projects/simraceway-3.png" class="right relative width-lg-tablet" style="max-width:135%; " />
			</div>
		</div>
	
	<div class="shim-80"></div>
	<?php /*
	<!-- row -->
	
		<div class="row relative">

			<div class="offset6 last span5 no-pad relative" style="height:334px;">
			
				<div class="shim-120"></div>
			
				<h4>And the winner is&hellip;</h4>

				<p>These killer custom achievement badges and racer plates, of course. We developed a set of custom graphics used throughout the game and the site. It's just something we do.</p>			
			
			</div>
			
			<img src="../../imgs/projects/simraceway-3.png" class="absolute posLeft posTop" />
			
		</div>
	
	<div class="shim-80"></div> */
		?>

	<div class="clear"></div>
	
	
	<?php 
	$currentProject = 'simraceway';
    require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?> 