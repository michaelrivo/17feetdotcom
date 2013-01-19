<?php 
$parentPage = 'mobile-menu';
require('inc/header.php'); 
?>

<div class="tier1 container">
	
	<div class="relative tcenter">
		<h2 class="block">We make things work. Beautifully.</h2><h3>We design digital experiences to engage audiences across devices.</h3>
		<div class="cta-wrapper clearfix tcenter"><?php pink_cta( "Learn More", "about-us"); ?></div>
	</div>
	
</div>

<div class="tier2">
	
	<div class="rule green-dotted"></div>
	
	<div class="container">
	
		<div class="row-fluid content">
			
			<div class="copy clearfix">
				
				<p class="caps">Featured Project</p>
				
				<!-- <div class="rule white-dotted"></div> -->
				
				<h3 class="branding featured-logo-sprite">Learnist</h3>
			
				<div class="rule white-dotted"></div>
				
				<h3>Agile design, winning results.</h3>
				
				<p class="description">Working at warp startup speed, we're helping Learnist create a new platform for learning just about anything.</p>
			
				<div class="cta-wrapper clearfix tcenter"><?php black_cta("See Project", "our-work/learnist")?></div>
			
			</div>
			
			<div class="span9">
				<img src="imgs/00-v2/learnist-featured.jpg" style="margin-bottom:0 !important;" />
			
			</div>
			
		</div>
		
	</div>

</div>


<div class="container tier3">
	
	<div class="relative">
	
		<h3>Case Studies</h3>
	
		<div class="row-fluid top-projects row-end">
		
			<div class="top-project">
			
				<a href="our-work/slashdot" class="p-image"><img src="imgs/00-v2/featured-geeknet.jpg" alt="Slashdot Mobile Site"></a>
			
				<div class="brand">
					<a href="our-work/slashdot" class="" >
						<span class="featured-logo-sprite geeknet">Geeknet</span>
						<span class="block desc">Mobile site, 15 years overdue</span>
					</a>
				</div>
			</div>
		
			<div class="top-project">
			
				<a href="our-work/pac-12" class="p-image"><img src="imgs/00-v2/featured-pac12.jpg"  alt="Pac-12 Networks Website"></a>
			
				<div class="brand">
					<a href="our-work/pac-12" class="" >
						<span class="featured-logo-sprite pac12">Pac-12 Networks</span>
						<span class="block desc">Conference site for the new Pac-12</span>
					</a>
				</div>
			</div>
		
			<div class="top-project last">
			
				<a href="our-work/simraceway" class="p-image"><img src="imgs/00-v2/featured-ignite.jpg" alt="Simraceway Website"></a>
			
				<div class="brand">
					<a href="our-work/simraceway" class="" >
						<span class="featured-logo-sprite ignite">Ignite Technologies</span>
						<span class="block desc">Online racing innovation</span>
					</a>
				</div>
			</div>
	
		</div>
		
		<div class="cta-wrapper">
			<?php black_cta("More Work", "our-work"); ?>
		</div>
		
	</div>
	
	<div class="row-fluid customer-brands hide-mobile">
		<img src="imgs/00-v2/client-logo-strip.png" alt="Some of our clients"  />
	</div>
	
	<?php require('inc/project-cta.php'); ?>
	
	<!-- <div class="row-fluid row-end width-tablet">
		<div class="span6 recent-news">
			
			<h4 class="blue-dotted">Recent News</h4>			
		
			<ul class="unstyled">
				<li><span>Sept 31</span><a href="#">Learnist iPad &amp; iPhone apps featured in the itunes app store</a></li>
				<li><span>Sept 31</span><a href="#">Learnist iPad & iPhone apps featured in the itunes app store</a></li>
				<li><span>Sept 31</span><a href="#">Learnist iPad & iPhone apps featured in the itunes app store</a></li>
			</ul>
	
		</div>

		<div class="span6 last">
					
			<h4 class="blue-dotted">Scooby Snax</h4>
			<p class="width-lg-tablet">We're always looking for talented folks! Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.<br class="hold "/><br class="hold "/><a href="our-work/clif-bar-lunachix">Take a look inside 17FEET &raquo;</a></p>
		
		
		</div>
	
	</div> -->
	
	
</div>

<?php require('inc/footer.php'); ?>