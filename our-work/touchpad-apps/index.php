<?php require('../../inc/header.php'); ?>

<style type="text/css">
	#hero-graphic{
		background: transparent url(../../imgs/projects/hp-apps-1.png) no-repeat center 0;
		position:absolute;
		bottom:-130px;
		height:599px;
		width:100%;
	}
	.hero{
		background:#3C3933 url(../../imgs/projects/hp-apps-bg.png) repeat 0 center;
		position:relative;
		height:680px;
	}
	
	.project.copy blockquote{
		font-weight:100;
		font-size:2.1em;
	}
	
	.project.copy .cite{
		background-image:none;
		padding-left:15px;
/*		position:relative;
		left:-25px;
		text-indent:36px;*/
	}
</style>

<div class="hero dark">
	<div class="container project header">
	
		<div class="span9">
			<h2>WebOS Native Apps</h2>
			<h3 class="span8 append-1">We worked with HP to quickly create the visual experience for the music player, photo app and app store interfaces for the Touchpad.</h3>
		</div>
	
		<div class="span3 last what-it-is">
			<p>What it is</p>
			<abbr class="tablet on" title="Touch devices"></abbr>
			<abbr class="mobile " title="Mobile devices"></abbr>
			<abbr class="web" title="Web"></abbr>
		</div>
	</div>
	<div id="hero-graphic"></div>
</div>

<div class="container copy project" >
	<div class="shim-120"></div>
	
	<div class="span10 append-2 last no-pad">
		<h4>Iterative and Collaborative</h4>

		<p>Given the quick nature of the project, 17FEET deployed a team to work in Sunnyvale, directly integrating with the Human Interactions team to iterate fast and get great results. With a small focused team we were able to get the designs into development in a matter of weeks helping the HI team get a big win.</p>
		
	</div>
	
	<div class="span12 last graphic" style="background: transparent url(../../imgs/projects/hp-apps-2.png) no-repeat center center; height:460px;"></div>
	
	<!-- row -->
	
	<div class="span5 prepend-7 push-down" style="background: transparent url(../../imgs/projects/hp-apps-3.png) no-repeat left top; height:790px;">
		<div style="padding-left:60px;">
			<div style="background:transparent url(../../imgs/projects/hp-apps-4.gif) no-repeat left center; height:160px;"></div>
		
			<blockquote>First of all, the TouchPad is beautiful. It's iPad beautiful&hellip;the WebOS is beautiful, too. It's graphically coherent, elegant, fluid and satisfying.</blockquote>
			<p class="cite" style="padding-top:0;"><span>&mdash;David Pogue, NY Times</span><br/>
				<a class="external" href="http://www.nytimes.com/2011/06/30/technology/personaltech/30pogueAA.html?_r=1&pagewanted=all" target="_blank">View Article</a>
			</p>
		</div>
	</div>

	<?php 
	$currentProject = 'touchpad-apps';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>