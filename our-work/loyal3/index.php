<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	#hero-graphic{ margin:20px 0 30px 0; }
	
	@media all and (max-width: 959px){
/*		.hero{ background-size: cover; }
		#hero-graphic{ max-width:100%; left: 0; }*/
	}
	
	@media all and (max-width: 767px){
	}
	
	@media all and (max-width: 480px){
/*		#hero-graphic{ max-width:105% !important; }
		.project.copy{ padding-top:25px;}*/
		.project.copy .graphic2{ max-width:75% !important; margin-bottom:0 !important; }
	}	

</style>

<div class="hero hero-auto">
	<div class="container project header">
		<div class="row-fluid">
			<div class="span9">
				<h2>LOYAL3</h2>
				<h3>LOYAL3 is changing the way people invest by making stock ownership accessible to everyone. We're developing the brand and user interface that enables companies to sell stock directly to consumers.</h3>
			</div>
	
			<div class="span3 last what-it-is">
				<p>What it is</p>
				<abbr class="tablet" title="Touch devices"></abbr>
				<abbr class="mobile on " title="Mobile devices"></abbr>
				<abbr class="web on" title="Web"></abbr>
			</div>
		</div>
		
		<img src="../../imgs/projects/loyal3-1.png" id="hero-graphic" />
		
	</div>
</div>

<div class="container copy project">
	
	<div class="shim-40"></div>
	
	<div class="row-fluid width-tablet">
	
		<div class="span7 no-pad">
			<h4>Brand Development</h4>

			<p>LOYAL3 is built on the simple idea that consumers are more loyal to companies they are invested in. Along with this idea they're also committed to democratizing stock ownership by making it affordable to anyone and as simple as buying a book at Amazon. Working with the company's founders, we helped articulate the company's brand values through the development of the brand look-and-feel as well as  the core consumer message - Own What You Love.</p>
				
		</div>
		
		<div class="span5">
			<img src="../../imgs/projects/loyal3-2.png" class="graphic2" />
		</div>
	
	</div>
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-tablet">
	
		<div class="span4 no-pad">
			
			<div class="shim-40"></div>

			<h4>Product Development</h4>

			<p>Once the brand work was in place we turned to the product functionality and user experience. To successfully revolutionize how people buy stocks we would have to rethink the current brokerage site experience into something designed for the average person to easily navigate.</p>
		
			<img src="../../imgs/projects/loyal3-4.png" style="margin-top:65px;" />
	
		</div>

		<div class="span8 last">
	
			<img src="../../imgs/projects/loyal3-3.png" />
	
			<div class="offset1 last no-pad" >
				
				<div class="shim-80"></div>
				
				<p>We designed LOYAL3's CSOP (Customer Stock Ownership Plan) to be as easy as buying anything else online. Pick the product you want, put in a credit card, submit and done. We created a streamlined, easy to use system for buying shares that truly had empathy for the end user - who's most likely never purchased a share of anything online.</p>
			
				<h4>The Future Looks Bright.</h4>

				<p>The work is helping propel LOYAL3 into the future at an amazing pace. They're currently working with several companies to bring them online and continue to innovate how consumers and companies enter into a deeper relationship through ownership.</p>
	
			</div>
		
		</div>
	
	</div>	
	
	<div class="shim-80"></div>
	
	<?php 
	$currentProject = 'loyal3';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>