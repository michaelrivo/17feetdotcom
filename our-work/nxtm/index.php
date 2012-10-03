<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	
	.rockstar-graphic{ margin-left:5%;display:block; }
	
	
	@media all and (max-width: 959px){
		
	}

	@media all and (max-width: 767px){
		.rockstar-graphic{ margin-left:-5%;display:block;max-width:110%; }
	}

	@media all and (max-width: 480px){
	}
	
	@media all and (max-width: 320px){

	}

</style>



<div class="container project header">
	<div class="row-fluid">
		<div class="span9 ">
			<h2>NXTM</h2>
			<h3>NXTM's WhoozNXT is a web application designed to help bands get more fans. We developed the user experience and visual presentation as well as the strategy for engaging new users.</h3>
		</div>

		<div class="span3 last what-it-is">
			<p>What it is</p>
			<abbr class="tablet" title="Touch devices"></abbr>
			<abbr class="mobile" title="Mobile devices"></abbr>
			<abbr class="web on" title="Web"></abbr>
		</div>
	</div>
</div>

<div class="container copy project">
	
	<img src="../../imgs/projects/nxtm-1.png" />
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
		<div class="span5 offset1 relative" >
			<div class="absolute span12">
				<h4>Quick Iteration</h4>

				<p>To start, we used an iterative process to sketch designs quickly and get them in front of stakeholders and early testers, allowing us to rapidly develop an interaction model that mapped to the user experience and business goals.</p>
			</div>
		</div>
		<div class="shim-80 hide-mobile hide-tablet"></div>
		<img src="../../imgs/projects/nxtm-2.png" class="right relative hide-tablet hide-mobile">
	</div>
	
	
	<div class="shim-160 hide-tablet"></div>
	
	<div class="row-fluid width-tablet">
		<div class="span5 last no-pad right">
			<h4>Interactive Prototypes</h4>

			<p>Once the system was established, we created clickable prototypes preserving the flexibility of&nbsp;sketching while moving into an actionable wireframe&nbsp;system for testing and for development&nbsp;documentation.</p>
	
		</div>
		<div class="span7 left">
			<img src="../../imgs/projects/nxtm-3.png" style="margin-left:auto; margin-right:auto;display:block;"/>
		</div>
	</div>
	
	<div class="shim-80 hide-mobile hide-tablet" style="height:100px;"></div>
	
	<!-- row -->
	
	<div class="row-fluid width-tablet">

		<div class="offset1 span9 last">
	
			<h4>Rock Star Visuals</h4>
	
			<p>One of the coolest parts of the experience was the instant feedback provided by simply putting a band name in the input field. Just put in your band name and see which songs were performing best, who your top fans are and where they are located. All of this presented in a simple container that makes the band truly look like rockstars with social streams, photos, reviews and popular songs pulled from available sources like Twitter, MySpace, SoundCloud, Last.fm and Facebook.</p>
	
		</div>
	</div>
	
	<img src="../../imgs/projects/nxtm-4.png" class="rockstar-graphic" />
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
	
		<div class="span9 offset1 last">
			<div>
			<h4>Data &mdash; Hot Rockin&rsquo; Data</h4>
		
			<p>Data is not something that basement-dwelling aspiring rock stars are accustomed to digging into. But at its core, this project is about presenting data. To keep things simple, we developed a fun and uncomplicated data presentation technique. We focused on the big picture items and created a persistent module to emphasize fans, plays and sales with easy access to a deeper dive.</p>
			</div>
		</div>
	</div>
	
	<img src="../../imgs/projects/nxtm-5.png" />
	
	
	<!-- row -->
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-tablet">
		<div class="span5 hide-tablet hide-mobile">
			<img src="../../imgs/projects/nxtm-6.png" style="margin-left:4px;" />
		</div>
		<div class="span6 last" >
		
			<h4>Documenting the Design</h4>
		
			<p>As with any startup, getting to a minimum viable product takes a lot of discipline. Working with NXTM product management and technical teams we built a set of requirements and brand style guide to get them to market quickly and give them flexibility to iterate over time.</p>
		
		</div>
	</div>
	
	<div class="shim-40" style="height:10px;"></div>
	
	<img src="../../imgs/projects/nxtm-7.png" />
	
	<div class="shim-80"></div>
	
	<?php 
	$currentProject = 'nxtm';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>