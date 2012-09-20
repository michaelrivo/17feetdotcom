<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	
	.graphic1{ max-width: 265%; float:right; }
	.graphic2{ max-width: 185%; margin-left: -5%; z-index:0; }
	.graphic3{ max-width: 120%; float:right; }
	.graphic4{  }
	
	.padLeft{ padding-left:40px; }
	
	.padLeft *{ padding-left:0 !important; }
	
	.awards{ margin-left:0; }
	
	@media all and (max-width: 959px){
		.graphic1{ margin-top:30%; }
		.padLeft{ padding-left:0; }
	}

	@media all and (max-width: 767px){
		.graphic1{ max-width:110%; margin:-10% 0 0 -5% !important; display:block; }
	}
	
	@media all and (max-width: 600px){
	}
	
	@media all and (max-width: 480px){
	}
	
	@media all and (max-width: 320px){

	}
	
</style>


<div class="container project header">
	<div class="row-fluid">
		<div class="span9">
			<h2>Greatest Hits</h2>
			<h3>Over the years we've been able to do some really fun work, from a website <br/>that talks back to you, to &ldquo;the worlds stupidest website.&rdquo; All in a days work.</h3>
		</div>
	
		<div class="span3 last what-it-is header">
			<p>What it is</p>
			<abbr class="tablet" title="Touch devices"></abbr>
			<abbr class="mobile " title="Mobile devices"></abbr>
			<abbr class="web on" title="Web"></abbr>
		</div>
	</div>
</div>

<div class="container copy project">
	
	<div class="row-fluid width-tablet">
	
		<div class="span7 append-5 last no-pad relative" style="z-index:10">
			
			<div class="absolute posTop posLeft">
				
				<h4>Mike's Hard Lemonade</h4>

				<p>He's loud. He's brash. He's a bottle. Using the hand-held film style of the commercials as our guide, we used scrap-book inspired graphics incorporating hand drawn elements to give him a home on the web.</p>

				<p>With a cast of crazy characters and tons of video content the concept was a no brainer &mdash; road trip! Well, that was also the concept of TV campaign led by Creative Directors John Zissimos and Greg Rowan at McCann Erickson San Francisco. <a href="http://clients.17feet.com/mikeshard/" class="carat" target="_blank">Launch Site</a></p>
		
				<ul class="awards" style="margin-left:0;">
					<li class="horizon">2007 Gold Medal Award</li>
				</ul>
			
			</div>
		</div>
		
		<div class="span5 relative" style="z-index:1;">
			<img src="../../imgs/projects/mikes-lemonade.png" class="graphic1" />
		</div>
	</div>
	
	<div class="row-fluid width-lg-tablet">
		
		<div class="span6 last right relative" style="z-index:10">
			
			<div class="padLeft">
				
				<div class="shim-80 hide-tablet"></div>
				
				<h4>Eagle Eye</h4>
		
				<p>A breakthrough in online Alternate Reality Gaming, Eagle Eye Free Fall is an immersive experience integrating voice recognition and Flash that served as a prequel to the Paramount Pictures feature film Eagle Eye. After entering your phone number, the site calls you and the journey to find the fleeing Phil Mourra begins. We won't spoil the ending but it doesn't look good for Phil&hellip;</p>
		
				<ul class="awards" >
					<li class="comm-arts">2009 Interactive Annual</li>
					<li class="ima">2009 Best in Class</li>
				</ul>
			</div>
		</div>
		
		<div class="span6 left">
			<img src="../../imgs/projects/eagle-eye.png" class="graphic2" />
		</div>
		
	</div>

	<!-- row -->
	
	<div class="shim-40 hide-lg-tablet"></div>
	
	<div class="row-fluid width-lg-tablet">
	
		<div class="span6 more-pad">
			<h4>The Spanish Quarter</h4>

			<p>Working with branding and design agency Voicebox Creative, we created an immersive experience for the launch of the Spanish Quarter Wine from Spanish wine giant Cordineu. Voicebox created a whimsical label that captured the warmth and friendliness of Spain with a richly illustrated storybook square incorporating unique Spanish icons such as the Columbus Statue as focal points. <a href="http://thespanishquarter.com/" target="_blank" class="external">Launch Site</a></p>
		
			<ul class="awards" style="margin-left:0;">
				<li class="ima">2007 Outstanding Achievement</a>
				<li class="horizon">2007 Flash Site of the Year</a>
			</ul>
			
		</div>
		
		<div class="span6">
			<div class="shim-40 hide-lg-tablet" style="height:20px;"></div>
			<img src="../../imgs/projects/spanish-quarter.png" class="graphic3"/>
		</div>
		
	</div>
		
	<!-- row -->
	
	<div class="shim-120"></div>
	
	<div class="row-fluid width-tablet">
	
		<div class="span5 right last no-pad" >
			<h4>Yahoo!</h4>

			<p>Video mash-ups may be very 2006 &mdash; but hey, it was 2006! When Olgivy Interactive and Ogilvy New York teamed up for an interactive microsite to accompany their &ldquo;Be a Better&rdquo; campaign they came to 17FEET.</p>

			<p>We built an editing interface allowing the user to pick a set-up and then add a punch line to create new &ldquo;directors cuts&rdquo; of the commercials. A simple idea executed simply.</p>
	
		</div>
		
		<div class="span7 left">
			<img src="../../imgs/projects/yahoo.png" class="graphic4" />
		</div>
	</div>
	
	<div class="shim-80"></div>
	
	<?php 
	$currentProject = 'greatest-hits';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>