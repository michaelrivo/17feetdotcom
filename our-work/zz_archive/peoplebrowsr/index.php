<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); 
?>


<style type="text/css">
	#hero-graphic{ margin:-40% 0 0 0 !important; }
	.hero{
		background:#131313 url(../../imgs/projects/peoplebrowsr-bg.png) repeat 0 center;
		position:relative;
	}
	.graphic2{ max-width:145% !important; }
	
	@media all and (max-width: 979px){
		.graphic2{ max-width:105% !important; }
		#hero-graphic{ margin:-45% 0 30px 0 !important; }
	}

	@media all and (max-width: 767px){
		.hero{ margin-bottom:80px; }
		.graphic2{ max-width:100% !important; float:none; }
		#hero-graphic{ margin:-55% 0 30px 0 !important; }
	}
	
	@media all and (max-width: 600px){
	/*	#hero-graphic{ margin:-20% 0 30px 0 !important; } */
	}
	
	@media all and (max-width: 480px){
		#hero-graphic{ margin:-48% 0 30px 0 !important; }
	}
	
	@media all and (max-width: 320px){
		#hero-graphic{ margin:-60% 0 30px 0 !important; }
	}
		
		
</style>


<div class="container project header responsive-transition">

	<h2>PeopleBrowsr</h2>
	<h3>We helped PeopleBrowsr transform Research.ly, a B-to-B social analytics product into a consumer-facing tablet App.</h3>
	
</div>


<div class="container copy project relative">
	
	<img id="hero-graphic" src="../../imgs/projects/peoplebrowsr-1.png" />
	
	<div class="shim-80 hide-lg-tablet"></div>

	<div class="row-fluid width-tablet first-row">
	
		<div class="span10 last no-pad" style="margin:0 0 50px 0;">
		
			<h4>Search Gets Social</h4>
		
			<p>Research.ly is great for marketers, but for consumers it needed to be simpler. Emphasizing local search and communities the app guides users to popular restaurants, movies and events in their area. In the user's first encounter with the application, the three primary columns gives product highlights. Once a search runs, search results data replaces the columns.</p>
	
		</div>
	
	</div>

	<div class="row-fluid width-tablet">
		<div class="span4 last no-pad" />
			<h4 style="margin-top:40px;">Filter by interest</h4>

			<p style="padding:0 28px 0 0;">Because of the quantity and variety of results, filtering is critical to the product. We developed a filtering strategy to help people find what is most important to them. Want to see what the tech community in New York thinks of the latest blockbuster? No problem.</p>
		</div>
		<div class="span8">
			<img class="right graphic2" src="../../imgs/projects/peoplebrowsr-2.png" />
		</div>
	</div>
	
	<div class="shim-40"></div>
	<div class="shim-80 hide-lg-tablet"></div>
	
	<div class="row-fluid width-lg-tablet">
		
		<div class="span4 last right">
			<div class="shim-40" style="height:60px"></div>
			<h4>See the Conversation</h4>

			<p>We developed a data hierarchy starting with an overview. From there, users go deeper to see realtime user-generated content from Twitter, Facebook friends, and blogs including photos, associated words, and top retweets within specific communities.</p>	
		</div>
		<div class="span8 left">
			<img src="../../imgs/projects/peoplebrowsr-3.png" style="max-width:105%;" />
		</div>
	</div>

	
	<div class="shim-80"></div>
	
	<?php 
	$currentProject = 'peoplebrowsr';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>