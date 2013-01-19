
<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); ?>

<style type="text/css">
	
	.graphic1{
		max-width:110%;
	}
	
	@media all and (max-width: 979px){}
	
	@media all and (max-width: 767px){}
	
	@media all and (max-width: 600px){}
	
	@media all and (max-width: 480px){}

</style>

<div class="container project header">
	
	<h2>Angie&lsquo;s List</h2>
	<h3>A comprehensive Mobile Business Center for the leader in trusted reviews.</h3>
	
	<img src="../../imgs/projects/angies-1.png" id="hero-graphic" class="center" />
	
</div>	

<div class="container copy project">
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-lg-tablet">
		
		<div class="span7 right more-pad last" >
			
			<div class="shim-80"></div>
		
			<h4 class="">Helping Service Providers</h4>

			<p class="">We worked with Angie's List to design a mobile application to help Service Providers serve their customers better. Within the mobile app we designed a custom messaging application to track bids and interactions with customers. We also integrated mobile payments, building a custom interface on top of the Square API. </p>
			
			<div class="shim-40 hide-lg-tablet"></div>
			
			<img src="../../imgs/projects/angies-3.png" class="hide-lg-tablet right" >
		
		</div>
		
		<div class="span5 left">
			<img src="../../imgs/projects/angies-2.png" class="graphic1">
		</div>
		
	</div>	
		
	<div class="shim-40 "></div>
	
	
	<?php 
	$currentProject = 'angies-list';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>