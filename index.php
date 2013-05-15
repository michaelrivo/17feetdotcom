<?php 
$parentPage = 'mobile-menu';
require('inc/header.php'); 
?>

<div class="tier1">
	
	<div class="container">
		
		<div class="relative tcenter">
			<h2 class="block">We make things work. Beautifully.</h2><h3>Digital experiences that engage audiences across devices.</h3>
			<div class="cta-wrapper clearfix tcenter"><?php pink_cta( "Learn More", "about-us"); ?></div>
		</div>
	
	</div>
	
</div>

<div class="tier2">
	
	<div class="rule green-dotted"></div>
	
	<div class="container">
	
		<div class="row-fluid content">
			
			<div class="copy clearfix">
				
				<h2 class="branding"><img src="imgs/00-v2/home/pac-12-logo.png">&nbsp;PAC-12</h3>
			
				<div class="rule grey-dotted"></div>
				
				<h3>Conference <br>of Champions</h3>
				
				<p class="description">An award-winning web experience for an ambitious new college sports network.</p>
			
				<div class="cta-wrapper clearfix tcenter"><?php sm_blue_cta("See Project", "our-work/pac-12")?></div>
			
			</div>
			
			<div class="span9">
				<img class="feature" src="imgs/00-v2/home/pac-12-feature.png" style="margin-bottom:0 !important;" />
			
			</div>
			
		</div>
		
	</div>

</div>


<div class="container tier3">
	
	<div class="relative">
	
		<h2>Our latest work.<span class="inline-cta-wrapper"><?php sm_blue_cta("All Work", "our-work"); ?></span></h2>
	
		<div class="row-fluid latest-work"> <!-- .top-projects -->
		
			<div class="span6"> <!-- .top-project -->
			
				<a href="our-work/slashdot" class="block"><img src="imgs/00-v2/home/slashdot-feature.jpg" alt="Slashdot Mobile Site" class="trans" /></a>
			
				<a href="our-work/slashdot" class="h4 trans" >Geeknet</a>
				<p class="desc">Transforming a 15 year old web property</p>
				
			</div>
		
			<div class="span6">
			
				<a href="our-work/simraceway" class="block"><img src="imgs/00-v2/home/simraceway-feature.jpg" alt="Pac-12 Networks Website" class="trans" /></a>
			
				<a href="our-work/simraceway" class="h4 trans" >Simraceway</a>
				<p class="desc">Blurring the lines of gaming and the real world</p>
				
			</div>		
		
		</div>
		
	</div>
	
	<?php require('inc/project-cta.php'); ?>
	
</div>

<?php require('inc/footer.php'); ?>