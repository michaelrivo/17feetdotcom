<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); 
?>

<style type="text/css">
	
	.graphic1{ max-width: 150%; float:right; margin:-10% -15% 0 0 ; }
	
	@media all and (max-width: 979px){
		.graphic1{ margin:5% -25% 0 0 ; }
	}

	@media all and (max-width: 767px){
		.graphic1{ max-width:100%; }
	}
	
	@media all and (max-width: 600px){
	}
	
	@media all and (max-width: 480px){
	}
	
	@media all and (max-width: 320px){

	}
	
</style>


<div class="container project header">

	<h2>Non-Profit Work</h2>
	<h3>From our award winning work with the San Francisco Indiefest to toys we designed in-house to benefit the San Francisco Food Bank, we try to do our small part to help out.</h3>

</div>

<div class="container copy project">
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
		
		<div class="span5 last no-pad relative" style="z-index:10">
			
			<div class="shim-40"></div>
			<div class="shim-40 hide-lg-tablet"></div>
			
			<h4>SF Independent <br/>Film Festival</h4>

			<p>From 2004 through 2006 we worked with SF Indiefest to create their brand identity both online and off. Starting with the first &ldquo;Another Hole in the Head&rdquo; horror movie festival in 2004 through the 2006 Indiefest we produced some award winning work. A special thanks to festival Director Jeff Ross for all his support - a designer's dream. We may no longer be doing the work for the festival but we still try to get to as many movies as possible.</p>	
		</div>
		
		<div class="span7 relative" style="z-index:1;">
			<img src="../../imgs/projects/indie-film-fest.png" class="right graphic1" />
		</div>	
		
	</div>
	<!-- row -->
	
	<div class="row-fluid width-tablet">
	
		<div class="span6 last right">
			<h4 style="margin-top:30px;">Goods For Good</h4>

			<p>We designed a series of toys we named Feeters and gave them away with a donation to the San Francisco Food Bank. It's our way of using art and design to make a difference. We give 100% of donations to the San Francisco Food Bank and in return you get Feeters - which earn you tons of cool points. We've also got a fresh crop of tees available.<br/><br/><a href="http://www.etsy.com/shop/17FEET" target="_blank" class="external">Shop Now</a></p>
	
		</div>
		
		<div class="span6 left">
			<img src="../../imgs/projects/feeters.png" class="graphic2" />
		</div>
	
	</div>
	
	<div class="shim-80"></div>
	
	<!-- row -->
	
	<div class="row-fluid width-tablet">
		
		<div class="span6 push-down">
			<h4>SF Sketchfest</h4>

			<p>Started in 2002 as a weekend showcase of San Francisco sketch comedy groups the SF Sketchfest has grown into a 130-act, 17-day bonanza of comedy featuring such luminaries as Triumph the Insult Comic Dog creator Robert Smigel, original "Saturday Night Live" cast member Laraine Newman, "Spinal Tap" star Michael McKean and "Mad Men" leading man Jon Hamm. In 2006 we designed and built the site that still stands to this day.<!-- <br/><br/><a href="#" target="_blank" class="external">sfsketchfest.com</a> --></p>	
	
		</div>
	
		<div class="span6 graphic last">
			<img src="../../imgs/projects/sketchfest.png" class="graphic3" />
		</div>
		
	</div>

	<?php 
	$currentProject = 'non-profit';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>