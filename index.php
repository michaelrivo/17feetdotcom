<?php 
$parentPage = 'mobile-menu';
require('inc/header.php'); 
?>

<style type="text/css">

.show-mobile{ display:none; }

@media (max-width: 959px) { 
	#slider br.newline{ display:inherit; }
	#slider, #slider .banner, #slider .item{ height:480px; }
	.bg img{ height:100%%;}

	#slider .slide1 .graphic{ margin-top:25%;  }
	#slider .slide2 h3{ margin: 54% 0 0 9%; }
	#slider .slide3 .textShadow{ display:none; }
	#slider .slide3 .glow{ margin-left:0; }

	#slider .slide4 h2{ margin-top: 5%; }
	#slider .slide4 .banner .graphic{ right: inherit; }
	#slider .slide4 img{ max-width:90% !important; left:5%; position:absolute !important; bottom:0;}
	
}

@media (max-width: 767px) { 
	#slider, #slider .banner, #slider .item{ height:380px; }	
	
	#slider .slide4 h2{ font-size:2.8em; margin: 0; z-index:2; position:relative; }
	#slider .slide4 h3{ font-size:1.4em; margin:0; z-index:1; position:relative; text-shadow: 0 0 20px #000, 0 0 20px #000, 0 0 20px #000;  }
	#slider a:hover{ background-position: right -23px;}
	
	#slider .slide4 .span8{  margin: 0 !important; }
	
	#slider .slide4 img{ margin:0px auto !important;}
	#slider a{ background-position: right 1px; }
	
	.second-tier .show-mobile{ display:block; margin:25px 0 0 0; }
	.show-mobile .blackBtn a, .show-mobile .blueBtn a{ font-size:145%; }	

}

@media (max-width: 600px) { 
	#slider, #slider .banner, #slider .item{ height:340px; }
	#slider .slide4 img{ max-width:100% !important; left:0; }
		
	#slider br.newline{ display:none; }
}

@media (max-width: 480px) { 
	#slider, #slider .banner, #slider .item{ height:290px; }
	#slider .slide4 h2{ font-size:2.5em; }
	#slider .slide4 h3{ font-size:1.2em; font-weight:500;   }
	#slider a{ background-position: right 0px; }
	#slider a:hover{ background-position: right -24px;}
	
}

@media (max-width: 320px){
	
	#slider, #slider .banner, #slider .item{ height:245px; }
	#slider .slide4 h2{ font-size:2em; margin-top:-2%; }
	#slider .slide4 h3{ font-size:1.1em; }

	.second-tier .show-mobile{ margin:15px 0 0 0; }
	.show-mobile .blackBtn a, .show-mobile .blueBtn a{ font-size:110%; }
}

</style>


<div id="slider" class="nojs responsive-transition">

	<div class="item slide4 init-slide responsive-transition" style="left:0%">
		<div class="bg bg-cover "></div>
		<div class="banner container" project="our-work/simraceway">
			<div class="row-fluid width-tablet">
				<div class="span8">
					<h2><span>Featured Project</span><br class="hold" />Simraceway</h2>
					<h3>Web integration and commerce for a <br class="newline" />new kind of racing game.<br class="hold"/><a class="cta" href="our-work/simraceway">View the project</a></h3>
				</div>
				<img src="imgs/slide-4-car.png" class="graphic" />
			</div>
		</div>
		<!-- <div class="container">
			<div class="row-fluid">
				<img src="imgs/slide-4-car-bottom.png" class="graphic" />
			</div>
		</div> -->
	</div>

	<div class="item slide0 responsive-transition" style="left:100%">
		<div class="bg responsive-transition bg-contain"></div>
		<div class="banner container responsive-transition" project="our-work/webos-facebook">
			
			<div class="row-fluid">
				<div class="span6 slide-content">

					<img src="imgs/facebook-slide-title.png" class="slide-ttl" />
					<h3>17FEET created the first Facebook tablet <br/>application exclusively for HP&rsquo;s WebOS. <br class="hold"/><a class="cta" href="our-work/webos-facebook">View the project</a></h3>

				</div>
				<div class="span6"><img class="graphic" src="imgs/facebook-slide-portrait.png" /></div>
				
			</div>
		</div>
	</div> 
			
	<div class="item slide1" style="left:200%">
		<div class="bg responsive-transition bg-cover"></div>
		<div class="banner container" project="our-work/salesforce" >
			<div class="row-fluid">
				<div class="span7">
					<img src="imgs/salesforce-slide-screens.png" class="graphic" />
				</div>
				<div class="span5">
					<img src="imgs/salesforce-slide-title.png" title="Salesforce" />
					<h3>Hot off the presses! Check out Salesforce Success Stories.<br class="hold"/><a class="cta" href="our-work/salesforce">View the project</a></h3>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="item slide2" style="left:300%">
		<div class="bg responsive-transition bg-contain">
			<img src="imgs/slide-2-content-bg.jpg" class="slide-ttl" />
		</div>
		<div class="banner container" project="our-work/peoplebrowsr">	
			<div class="row-fluid">			
				
				<div class="span6">
					<h3>Research.ly, a B-to-B analytics app,<br/>turned into a customer facing iPad app.<br class="hold"/><a class="cta" href="our-work/peoplebrowsr">View the project</a></h3>
				</div>
				<div class="span6">
					<img src="imgs/slide2-ipad.png" class="graphic" />
				</div>
			</div>
		</div>
	</div>

	<div class="item slide3" style="left:400%">

		<div class="music-bg bg bg-contain">
			<div class="glow"></div>
			<div class="graphic bg-contain"></div>
		</div>
		<div class="banner container" project="our-work/touchpad-apps">
			<div class="row-fluid">
				<div class="span6">
					<img class="graphic" src="imgs/slide-3-touchpad.png" />
				</div>
				<div class="span6">
					<div class="textShadow"></div>
					<img src="imgs/slide-3-ttl.png" class="slide-ttl" />
					<h3>Application designs <br/>for the HP TouchPad <br class="hold" /><a class="cta" href="our-work/touchpad-apps">View the project</a></h3>
				</div>
			</div>
		</div>
	</div>
	
	<div class="project-control hover-area posRight"><div class="next"></div></div>
	<div class="project-control hover-area posLeft"><div class="prev"></div></div>
	
</div>

<div class="container second-tier">
	
	<h2>We make things work. <br/><span>Beautifully.</span></h2>
	
	<div class="row-fluid show-mobile">
		<div class="left blueBtn"><a href="our-work">See the Work</a></div>
		<div class="right blackBtn"><a href="about-us">About Us</a></div>
	</div>
	
	<div class="row-fluid hide-tablet hide-mobile">
		<div class="span4 trans-black">
			<div>
				<h3>Design Thinking</h3>
				<p>Innovative ways to engage audiences across devices.</p>
			</div>
		</div>
	
		<div class="span4 trans-black">
			<div>
				<h3>User Experience</h3>
				<p>From Fortune 500s to startups, we design great digital experiences.</p>
			</div>
		</div>
	
		<div class="span4 trans-black">
			<div>
				<h3>Digital Branding</h3>
				<p>Campaigns and platforms for scalability and flexibility over time.</p>
			</div>
		</div>
		
	</div>
	
	<p class="cta hide-tablet hide-mobile"><a href="about-us" class="carat" >Learn More About Us</a></p>
	
		
</div>

<div class="third-tier hide-mobile">
	<div class="container">
	
		<div class="row-fluid width-tablet">
			<div class="span6 recent-news">
				
				<div class="thumb-wrap">
					<h3>Recent News</h3>

					<img src="imgs/pac-12-recent-news.png" class="thumb" />
				</div>
			
				<div class="date">August 15, 2012</div>
			
				<h4>Pac-12 Launches</h4>
				<p class="width-lg-tablet">Congrats to the Pac-12 on the launch of the Pac-12 Networks. We're honored to be part of the team that helped create a fantastic new site. And we're particularly excited about this awesome <a href="http://video.pac-12.com/video/gxZXdtNTo-lSFrM2w3jiu2-8xeVdrUv4" target="_blank">promo</a> for our beautifully designed schedule. Hip hip hooray!<br class="hold "/><a href="http://www.pac-12.org" class="external">Visit Site</a></p>
		
			</div>
	
			<div class="span6 last">
			
				<div class="past-project">
					
					<div class="thumb-wrap">
						<h3>Blast from the Past</h3>
						<img src="imgs/past-project-thumb.png" class="thumb" />
					</div>
		
					<h4>LunaChix</h4>
					<p class="width-lg-tablet">17FEET helped CLIF Bar create a distinct community around the Luna cycling team that empowered female cycling enthusiasts right along side some of the best pro cyclists out there. 17FEET created a platform that 3 years in, is still engaging the cycling community across the country.<br class="hold "/><a href="our-work/clif-bar-lunachix" class="carat">View the Project</a></p>
			
				</div>
			
			</div>
		
		</div>
		
	</div>
</div>

<?php require('inc/footer.php'); ?>