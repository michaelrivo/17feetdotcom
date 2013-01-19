<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); 
?>

<style type="text/css">
	#hero-graphic{
		max-width:111%;
		margin-left:-5%;
	}
	
	
	@media all and (max-width: 979px){}

	@media all and (max-width: 767px){
	}

	@media all and (max-width: 480px){

	}	
	
</style>

<div class="container project header">

	<h2>Learnist</h2>
	<h3>We’re helping Learnist design a new social learning platform.</h3>
	<img src="../../imgs/projects/learnist-1.png" id="hero-graphic" />
	
</div>

<div class="container copy project">
	
	<div class="shim-80" ></div>
	
	<!-- <blockquote class="tcenter">17FEET was an indespensible partner bringing our vision to life.</blockquote>
	
	<p class="cite tcenter">&mdash; Farbood Nivi<span>Founder and CEO, Grockit</span></p>
	
	<div class="shim-80" ></div> -->
	
	<div class="row-fluid">
		<div class="span3 last no-pad">
						
			<h4>Agile. Beautiful.</h4>

			<p>We worked closely with Grockit, the parent company of Learnist, starting when the product was just getting started. Moving fast and working closely with a small development team we created high fidelity, living prototypes. The designs were immediately viewed by a beta testing community, allowing for rapid iteration and improvement.</p>

		</div>
		
		<div class="span9"><img class="graphic right" src="../../imgs/projects/learnist-2.png" /></div>
		
	</div>
	
	<div class="shim-120" ></div>
	
	<!-- row -->	
	
	<div class="row-fluid width-tablet">
	
		<div class="span5 right" >
			
			<!-- <div class="shim-80 hide-lg-tablet" ></div> -->
			
			<h4>Mobile, Tablet, Web.</h4>

			<p>We embraced a mobile first approach by starting the design process with the mobile app, followed by a tablet app, and ultimately the web. The constraints of this approach provided ample opportunity for simplification along the way.</p>	
		
		</div>
		<div class="span7 left">
			<img src="../../imgs/projects/learnist-3.png" />
		</div>
		
	</div>
	
	<div class="shim-120" ></div>
	
	<img class="center" src="../../imgs/projects/learnist-4.png" />
	
	<div class="row-fluid width-lg-tablet">
		<div class="span7 offset1 last no-pad">
			<h4>The Future Looks Bright</h4>

			<p>In a matter of months we were able to achieve a very polished experience while adapting to the natural evolution of a new product. Moving forward, we're helping Learnist keep up with rapid growth following a new partnership and funding round with the Discovery Network.</p>
		
		</div>
		
	</div>
		
	<?php $currentProject = 'learnist';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>