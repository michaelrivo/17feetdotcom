<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	#hero-graphic{ margin:20px 0 30px 0; }

</style>
<div class="hero hero-auto">
	<div class="container project header">
		<div class="row-fluid">
			<div class="span9">
				<h2 class="long-ttl">Salesforce Customer <br/>Success Stories</h2>
				<h3>Gearing up for Dreamforce 2011, Salesforce came to 17FEET to create a more engaging experience around their customer success stories. <a class="external" href="http://www.salesforce.com/socialenterprise/showcase/" target="_blank">Launch Site</a></h3>
			</div>
	
			<div class="span3 last what-it-is">
				<p>What it is</p>
				<abbr class="tablet on" title="Touch devices"></abbr>
				<abbr class="mobile on " title="Mobile devices"></abbr>
				<abbr class="web on" title="Web"></abbr>
			</div>
		</div>
		<img src="../../imgs/projects/salesforce-1.png" id="hero-graphic" />
	</div>
</div>

<div class="container copy project" >
	
	<div class="row-fluid width-lg-tablet	">
		<div class="span4 no-pad last">
			<h4>Multi-Campaign Platform</h4>

			<p>The project began with a series of videos called &ldquo;CEOs on Chatter&rdquo;, highlighting how CEOs are using Chatter to revolutionize their companies. Rather than create a &ldquo;micros-site&rdquo; for the CEO success stories, we developed a plan to build a platform on which multiple campaigns could be developed over time to feature success stories as broad as the products Salesforce offers.</p>
		
		</div>
		<div class="span8">
			<img src="../../imgs/projects/salesforce-2.png" class="right clearfix" />
		</div>
	</div>
	
	<!-- row -->
	<div class="row-fluid">
	
		<div class="span10 last no-pad">
			<h4>Device Agnostic</h4>

			<p style="margin-bottom:0;">Well, sort of. A big imperative at Salesforce is that everything look great and work great on the iPad. Of course, it also has to look great on a desktop. We created a simple design solution that worked across screen sizes and device types. We also implemented touch functionality to maximize the experience when viewing on an iPad or iPhone. </p>	
	
		</div>
	</div>
	
	<!-- <div class="shim-40"></div> -->
	<div class="row-fluid">
		<div class="span12">
			<img class="graphic" src="../../imgs/projects/salesforce-3.png" />
		</div>
	</div>
	
</div>
	

<div class="container copy project">	

	<!-- row -->
	
	<?php 
	$currentProject = 'salesforce';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>