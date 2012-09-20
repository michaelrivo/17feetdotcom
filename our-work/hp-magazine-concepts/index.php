<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">	

	.first-graphic, .second-graphic{ max-width:115%; }
	
	@media all and (max-width: 959px){
		.first-graphic{ max-width:100%; }
	}

	@media all and (max-width: 767px){

	}

	@media all and (max-width: 480px){
		
	}
	
	@media all and (max-width: 320px){

	}

</style>

<div class="container project header">
	<div class="row-fluid">
		<div class="span9">
			<h2>HP Magazine</h2>
			<h3>We developed concepts for an immersive digital magazine to<br/>highlight apps on the HP TouchPad.</h3>
		</div>
	
		<div class="span3 last what-it-is">
			<p>What it is</p>
			<abbr class="tablet on" title="Touch devices"></abbr>
			<abbr class="mobile" title="Mobile devices"></abbr>
			<abbr class="web" title="Web"></abbr>
		</div>
	</div>
</div>


<div class="container copy project">
	
	<img src="../../imgs/projects/hp-mag-1.png" />
	
	<div class="row-fluid width-tablet">
	
		<div class="span4 last no-pad" >
			<div class="shim-80"></div>
			<h4>Real-world Parallel</h4>

			<p>Starting with strategic content development, we approached the project through the lens of a real-world magazine with features, editorials, lists and reader feedback. Each of these could be valuable as potential content models for apps, from all-star developer profiles, features on the latest games, to must have apps.</p>
		</div>
		
		<div class="span8">
			<img src="../../imgs/projects/hp-mag-2.png" class="first-graphic" />
		</div>
		
	</div>


	<div class="shim-40"></div>
	
	
	<div class="row-fluid width-lg-tablet">
		<div class="span4 no-pad push-down last right" >
			<h4>Make the <br/>content relevant</h4>

			<p>With a broad range of possible content, it made sense to keep it fresh and seasonal. What are the best apps for the person on the go who wants to get in shape for the summer? We also incorporated experts from the WebOS community and staff picks as ways of giving users trusted sources to discover new apps.</p>	
	
		</div>
		
		<div class="span8 left">
			<img src="../../imgs/projects/hp-mag-3.png" class="second-graphic"/>
		</div>
		
		
	</div>
	
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-lg-tablet">
	
		<div class="offset2 span10 last no-pad">
			
			<div class="span9">
				<h4>An Immersive WebOS</h4>

				<p>Using the elegant framework created by the internal team, we took it a step further to create a richer, more immersive look for the magazine that reflected the various content types and allowed for editorial flexibility with app purchase built right in to each story.</p>
			</div>
			<div class="shim-40" style="height:20px;"></div>
			<img src="../../imgs/projects/hp-mag-4.png" />

		</div>
	</div>
	<div class="shim-40"></div>
	
	
	<?php 
	$currentProject = 'hp-magazine-concepts';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>