<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	#hero-graphic{
		margin:4% auto 0 auto;
		display:block;
	}
	
	.hero{
		background:#2C3263 url(../../imgs/projects/luna-bg.png) repeat 0 center;
		position:relative;
	}
	
	@media all and (max-width: 959px){

/*		.hero{ background-size: cover; }
		#hero-graphic{ max-width:100%; left: 0; }*/
	}

	@media all and (max-width: 767px){
		.hero{ margin-bottom:80px;	}
	}

	@media all and (max-width: 480px){
/*		#hero-graphic{ max-width:105% !important; }
		.project.copy{ padding-top:25px;}*/
	}	
	
	
</style>

<div class="hero dark">
	<div class="container project header responsive-transition">
		<div class="row-fluid">			
			<div class="span9">
				<h2>Team LunaChix</h2>
				<h3>We created a platform for CLIF Bar &amp; Company's Team LUNA Chix to promote wellness and empower anyone to ride like a pro. <a href="http://www.teamlunachix.com" class="external" target="_blank">Launch Site</a></h3>
			</div>
	
			<div class="span3 last what-it-is header">
				<p>What it is</p>
				<abbr class="tablet" title="Touch devices"></abbr>
				<abbr class="mobile " title="Mobile devices"></abbr>
				<abbr class="web on" title="Web"></abbr>
			</div>
		</div>
		<img src="../../imgs/projects/luna-1.png" id="hero-graphic" />
	</div>
	
</div>

<div class="container copy project">
	
	<div class="shim-160" ></div>
	<div class="shim-80 hide-lg-tablet" ></div>
	
	<div class="row-fluid">
		<div class="span9 append-2 offset1 last">
			<h4>Many Teams. One Site.</h4>

			<p>Started in 2001, Team LUNA Chix has grown into a national organization committed to encouraging all women to get involved, stay active and be healthy. From the original sponsorship of a Pro Mountain Bike Team the program has grown to sponsor 26 local running, biking, and triathlon teams across the county.</p>

			<p>With that growth came the challenge of creating a cohesive digital home for all the teams. Our platform allowed each team to publish its own content while still existing under the umbrella of one site<!-- &mdash; <a href="http://www.teamlunachix.com" class="external" target="_blank">teamlunachix.com</a> -->.</p>

		</div>
	</div>
	
	<div class="shim-40" ></div>
	
	<img class="graphic" src="../../imgs/projects/luna-2.png" />
	
	<!-- row -->
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
	
		<div class="span6 right last more-pad" >
			
			<div class="shim-80 hide-lg-tablet" ></div>
			
			<h4>Listen and Learn</h4>

			<p>To get it right we started by listening. We interviewed Local Team Leaders, LUNA Pro Team members &amp; LUNA employees. Our research revealed that while all the members wanted to participate in creating digital content not everyone had the time or know-how to do so. We focused on creating a site with simple tools, making it easy for everyone to participate. We also knew that the site was going to be the public face of the LUNA Chix program and had to look great.</p>

			<p>Armed with our research we set out to create a publishing platform that supported community features like calendars, forums, file sharing and reporting tools. We also integrated Flickr photo and video feeds to keep the content on the site fresh.</p>	
		
		</div>
		<div class="span6 left">
			<img src="../../imgs/projects/luna-3.png" style="max-width:110%; margin-left:-5%;" />
		</div>
		
	</div>
	
	<div class="shim-80" ></div>
	
	<div class="row-fluid width-lg-tablet">
		<div class="span4 last no-pad">
			<h4 >Simple Tools for Everyone</h4>

			<p>We embraced the use of a variety of existing tools to put the site together. We used Expression Engine as the backbone which provided a built-in content management system for team members to use. Using Flickr was an efficient way to add photo and video sharing as users are already familiar with the tools and it significantly reduced costs for development. The result is an easy to use platform that's helping build the LUNA Chix community.</p>
		
		</div>
		<div class="span8">
			<img class="right" src="../../imgs/projects/luna-4.png" />
		</div>
	</div>
	
	<div class="shim-80"></div>
	<div class="shim-80 hide-lg-tablet"></div>
	
	<?php 
	$currentProject = 'clif-bar-lunachix';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>