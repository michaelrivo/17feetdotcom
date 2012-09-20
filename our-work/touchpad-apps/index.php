<?php 
$parentPage = 'our-work';
require('../../inc/header.php'); 
?>

<style type="text/css">
	#hero-graphic{
		margin
	}
	.hero{
		background:#3C3933 url(../../imgs/projects/hp-apps-bg.png) repeat 0 center;
		position:relative;
	}
	.last-graphic{ max-width: 110%;}
	
	.project.copy blockquote{
		font-weight:100;
		font-size:2.1em;
	}
	
	.project.copy .cite{
		background-image:none;
		padding-left:15px;
	}
	
	.quote{ padding-left:70px; }
	
	@media all and (max-width: 959px){
		.quote{ padding:0 !important; }
		
		.quote .cite a, .quote .cite span{ position:static !important; }
	}

	@media all and (max-width: 767px){
		.first-row{ margin-top:35px; }
	}

	@media all and (max-width: 480px){
		.first-row{ margin-top:100px; }
	}
	
	@media all and (max-width: 320px){

	}
	
</style>

<div class="hero dark">
	<div class="container project header">
		<div class="row-fluid">
			<div class="span9">
				<h2>WebOS Native Apps</h2>
				<h3 class="">We worked with HP to quickly create the visual experience for the music player, photo app and app store interfaces for the Touchpad.</h3>
			</div>
	
			<div class="span3 last what-it-is">
				<p>What it is</p>
				<abbr class="tablet on" title="Touch devices"></abbr>
				<abbr class="mobile " title="Mobile devices"></abbr>
				<abbr class="web" title="Web"></abbr>
			</div>
		</div>
		<img id="hero-graphic" src="../../imgs/projects/hp-apps-1.png" />
	</div>
</div>

<div class="container copy project" >
	<div class="shim-120"></div>
	<div class="shim-80 hold" ></div>
	
	<div class="row-fluid first-row">
		<div class="span10 last no-pad">
			<h4>Iterative and Collaborative</h4>

			<p>Given the quick nature of the project, 17FEET deployed a team to work in Sunnyvale, directly integrating with the Human Interactions team to iterate fast and get great results. With a small focused team we were able to get the designs into development in a matter of weeks helping the HI team get a big win.</p>
		
		</div>
	</div>
	
	<img class="last graphic block" src="../../imgs/projects/hp-apps-2.png" style="margin:10px auto" />
	
	
	<div class="shim-80"></div>
	
	<div class="row-fluid width-lg-tablet">
		
		<div class="span5 right push-down quote">
			<img src="../../imgs/projects/hp-apps-4.gif" class="hide-lg-tablet" style="margin-bottom:20px;"/>
			<blockquote>First of all, the TouchPad is beautiful. It's iPad beautiful&hellip;the WebOS is beautiful, too. It's graphically coherent, elegant, fluid and satisfying.</blockquote>
			<p class="cite" style="padding-top:0;"><span>&mdash;David Pogue, NY Times</span><br/>
				<a class="external" href="http://www.nytimes.com/2011/06/30/technology/personaltech/30pogueAA.html?_r=1&pagewanted=all" target="_blank">View Article</a>
			</p>
		</div>
		
		<div class="span7 left">
			<img src="../../imgs/projects/hp-apps-3.png" class="last-graphic" />
		</div>
		
	</div>
	<?php 
	$currentProject = 'touchpad-apps';
	require('../../inc/project-nav.php'); ?>

</div>

<?php require('../../inc/footer.php'); ?>