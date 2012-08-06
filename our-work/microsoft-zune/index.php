<?php require('../../inc/header.php'); ?>

<style type="text/css">
	#hero-graphic{
		background: transparent url(../../imgs/projects/zune-1.png) no-repeat center bottom;
		position:absolute;
		bottom:-145px;
		left:0;
		height:472px;
		width:100%;
	}
	.hero{
		background-color:#262626;
		position:relative;
		height:530px;
	}
	.ie8 #rawr, .ie7 #rawr, .ie6 #rawr{
		display:none;
	}
	#rawr{
		position:absolute;
/*		background:rgba(255,0,0,.2);
*/		top:134px;
		left:81px;
	}
</style>

<div class="hero dark">
	<div class="container project header">
		
		<div class="span-9">
			<h2>Microsoft Zune</h2>
			<h3>We designed and built a Flash application supporting both customization and commerce. We worked hand in hand with Microsoft over several product iterations, campaigns and feature sets.</h3>
		</div>
	
		<div class="span-3 last what-it-is">
			<p>What it is</p>
			<abbr class="tablet" title="Touch devices"></abbr>
			<abbr class="mobile " title="Mobile devices"></abbr>
			<abbr class="web on" title="Web"></abbr>
		</div>
	</div>
	
	<div id="hero-graphic"></div>
</div>

<div class="container copy project">
	
	<div class="shim-120"></div>
	
	<div class="prepend-1 span-9 more-pad append-2">
		<h4>Create Your Own</h4>
		
		<p>Zune Originals lets users customize any Zune device with their own imagery. Users upload a picture, tweak it with our application, have it instantly etched, and a week later it arrives at your doorstep. Pretty sweet. The site also supports custom &ldquo;tattoos&rdquo; that have been commissioned by Microsoft. We worked closely with the design team to focus on simplifying the interaction design and purchase process, allowing users to quickly customize and purchase a device.</p>
		
	</div>
	
	<div class="span-12 last graphic" style="background:transparent url(../../imgs/projects/zune-2.png) no-repeat 70px 0 ; height:669px;top:-15px"><div id="rawr"></div></div>
	
	<audio preload="auto" id="cat">
	  <source src="../../sound/cat.ogg" type="audio/ogg"></source>
	  <source src="../../sound/cat.mp3" type="audio/mpeg"></source>
	  <source src="../../sound/cat.wav" type="audio/x-wav"></source>
	</audio>
	
	<script type="text/javascript">
	
	$(function (){
	    
		if($('body').hasClass('ie6') || $('body').hasClass('ie7') ||  $('body').hasClass('ie8')){
			} else {
				var rawr = document.getElementById('cat');

				//rawr.volume = 100;
				var hitArea = document.getElementById('rawr');

				hitArea.onmouseover = function (event){
					console.log('rawr');
					rawr.volume = .25;
					rawr.play();
			}
		}
	
	});
		
	</script>
	
	<!-- row -->
	
	<div class="span-4 last no-pad append-8 " style="background:transparent url(../../imgs/projects/zune-3.png) no-repeat right 0; height:828px;">
		<h4 style="margin-top:60px">Zune Store</h4>

		<p style="padding-right:45px">The success of the Zune Originals site led to the development of the Zune Store. Working with the design team in Redmond, we designed the store to work in tandem with new Zune.net. The store supports the sale of devices, accessories, Zune Points &amp; Zune passes. We also created limited edition pages for a Gears of War device and a Joy Division device that was timed with the release of a documentary on the band.</p>	
	
	</div>
	
	<!-- row -->
	
	<div class="shim-120"></div>
	
	<div style="clear:both; width:961px; background: transparent url(../../imgs/projects/zune-4.png) no-repeat center bottom; height:739px;position:relative;left:-10px;"></div>
	
	<?php 
	$currentProject = 'microsoft-zune';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>