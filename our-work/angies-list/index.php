
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
	<h3>17FEET built a comprehensive mobile Business Center for the <br>leader in consumer ratings for local service companies.</h3>
	
	<img src="../../imgs/projects/angies-1.png" id="hero-graphic" class="center" />
	
</div>	

<div class="container copy project">
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-lg-tablet">
		
		<div class="span7 right more-pad last" >
			
			<div class="shim-80"></div>
		
			<h4 class="">It's Business Time</h4>

			<p class="">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh eu ismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
			
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