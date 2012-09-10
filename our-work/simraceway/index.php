
<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); ?>

<style type="text/css">
	#hero-graphic{
		position:absolute;
		bottom:-90px;
		left:20px;
		margin: 0 auto;
	}
	
	
	.hero{
		background:#000 url(../../imgs/projects/simraceway-hero-background.jpg) no-repeat center top;
	}
	
	@media all and (max-width: 940px) and (min-width: 0px) {
		.hero{ background-size: cover; }
		#hero-graphic{
			position:relative;
			/*bottom:-45px;*/
			margin:-25px 0 0 0;
			margin:0 0 -11%	 0;
			bottom:0;
			left:0;
			/*left:0;*/
		}
	}
	

</style>

<div class="hero dark">
	<div class="container project header">
		<div class="span-9">
			<h2>Simraceway</h2>
			<h3>Ever wanted to drive a McLaren F1 on the hottest tracks around the world? Well, now you can get pretty dang close with Simraceway. We created a new web platform for Ignite Game Technologies to integrate with their game, Simraceway.</h3>
		</div>
	
		<div class="span-3 last what-it-is">
			<p>What it is</p>
			<abbr class="tablet" title="Touch devices"></abbr>
			<abbr class="mobile" title="Mobile devices"></abbr>
			<abbr class="web on" title="Web"></abbr>
		</div>
		
		<img src="../../imgs/projects/simraceway-mclaren.png" id="hero-graphic" />
		
	</div>	
</div>

<div class="container copy project">
	
	<div class="shim-80"></div>
	
	<div class="span-5 prepend-7 last more-pad relative" style="height:573px;">
		
		<div class="shim-80"></div>
		
		<h4>Bring it All Back Home</h4>

		<p>Simraceway is a downloadable game. The site we designed serves as a marketing vehicle to drive game downloads and an administrative hub where users login to buy cars and tracks, enter races, and manage their profile. We developed an information architecture that kept the data flowing between the game and the web in one simple interface.</p>
		
		
		<img class="absolute posLeft posTop" src="../../imgs/projects/simraceway-1.png">
		
	</div>
	
	<div class="shim-80"></div>
	
	<!-- row -->
	
	<div class="span-4 append-8 last no-pad relative" style="height:568px;" >
		
		<div class="shim-80"></div>
		
		<h4>Ready, Set, Race</h4>

		<p>We designed a visual system to clearly show race results, upcoming events, cars owned, transaction details. It looks so sweet you’ll want to race for days.</p>
		
		<img src="../../imgs/projects/simraceway-2.png" class="absolute posRight posTop" />
		
	</div>
	
	<div class="shim-80"></div>
	
	<!-- row -->

	<div class="prepend-6 last span-5 append-1 no-pad relative" style="height:334px;">
		
		<div class="shim-120"></div>
		
		<h4>And the winner is&hellip;</h4>

		<p>These killer custom achievement badges and racer plates, of course. We developed a set of custom graphics used throughout the game and the site. It's just something we do.</p>
		
		<img src="../../imgs/projects/simraceway-3.png" class="absolute posLeft posTop" />
		
	</div>
	
	<div class="shim-80"></div>

	<div class="clear"></div>
	
	
	<?php 
	$currentProject = 'simraceway';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>