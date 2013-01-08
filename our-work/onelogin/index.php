
<?php 
$parentPage = 'our-work-btn';
require('../../inc/header.php'); ?>

<style type="text/css">
	
	.graphic1{ max-width:120%; float:right; }
	
	.graphic4{
		margin-left:-2%;
	}
	.bucket4{
		width:280px;
	}
	@media all and (max-width: 979px){
	}
	
	@media all and (max-width: 767px){
		.graphic1{ max-width:110%; float:none; }
		
	}
	
	@media all and (max-width: 480px){
		.graphic3{ margin-bottom:25px !important; }
	}

</style>

<div class="container project header">
	<h2>OneLogin</h2>
	<h3>Identity management never looked so good.</h3>
	
	<img src="../../imgs/projects/onelogin-hero.png" id="hero-graphic" />
	
</div>	

<div class="container copy project">
		
	<div class="row-fluid relative">
		
		<div class="span6 right">
			
			<div class="shim-40"></div>
			
			<h4>Telling the <br>OneLogin Story</h4>

			<p>We worked with the founders to develop an end-to-end experience - brand look-and-feel, website, web and mobile applications and videos.</p>
			
			<img src="../../imgs/projects/onelogin-1b.png"  />
		</div>
		
		<div class="span6 left">
			<img src="../../imgs/projects/onelogin-1a.png">
		</div>
		
	</div>
	
	<div class="shim-40"></div>
	

	<blockquote>17FEET was an indespensible partner bringing our vision to life.</blockquote>
	<p class="cite tcenter">&mdash; Thomas Pederson<span>CEO, OneLogin</span></p>
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-tablet">
				
		<div class="span4">
			<h4>All Your Logins In One Basket</h4>

			<p>With the story in place, we were able to go back to the product and help align the product experience to the brand promise. We designed a flexible system for the web application that was then extended to HTML-based mobile applications.</p>			
		
		</div>
		
		<div class="span8">
			<img src="../../imgs/projects/onelogin-2.png" class="graphic1 center" />
		</div>
		
	</div>
		
	<div class="shim-120"></div>
	
	<div class="row-fluid width-tablet">
		
		<div class="span9">

			<h4>Success Starts With a Blueprint</h4>

			<p>We developed the site and the app using high fidelity wireframes allowing us to iterate quickly and rapidly implement a visual design to get the site and the app out quickly.</p>	
	
		</div>
		
	</div>
	
	<img src="../../imgs/projects/onelogin-3.png" class="graphic3" />
	
	<div class="shim-80 hide-lg-tablet"></div>
	
	<div class="row-fluid relative">
		<div class="right width-lg-tablet bucket4 absolute posTop posRight" >
			
			<div class="shim-160"></div>
			
			<h4>Amazing Admin</h4>

			<p>We worked closely with the product team to streamline and simplify complex admin interface used by IT professionals to manage identity and access across large organizations.</p>
		</div>
		
		<img src="../../imgs/projects/onelogin-4.png" class="graphic4" />
		
	</div>
		
	<div class="clear"></div>
	
	<?php 
	$currentProject = 'onelogin';
	require('../../inc/project-cta.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>