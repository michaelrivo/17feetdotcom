<?php 
$parentPage = 'mobile-menu our-work';
require('../inc/header.php'); 

?>

<div class="container projects static">
	<div class="header">
			<h2>The Proof is in the Pixels</h2>		
			<h3>We create digital products and experiences</h3>
	</div>	
	
	<div class="row-fluid featured-row">
		
	<?php
	// outputs the project grid
	
	require('../inc/project-data.php'); 	
	
	for($i = 0; $i < count($featuredArr); $i++ ){ ?>
		
		<div class="project-thumb thumb-<?php echo $i; ?> <?php echo $featuredArr[$i][0] ?>">
			<div><a href="<?php echo $featuredArr[$i][0] ?>"><img src="../imgs/projects/thumbs/<?php echo $featuredArr[$i][0] ?>-featured.jpg" /></a></div>
			<div class="label dotted-grey">
				<h5><?php echo $featuredArr[$i][1] ?></h5>
				<p><?php echo $featuredArr[$i][2] ?></p>
			</div>
		</div>
		
	<?php } ?>
	
	</div><!-- .row-fluid -->
	
	<div class="row-fluid row-grid project-grid">
	<?php
	for($i = 0; $i < count($projectArr); $i++ ){ ?>
		
		<div class="project-thumb <?php echo $projectArr[$i][0] ?>">
			<div><a href="<?php echo $projectArr[$i][0] ?>" ><img src="../imgs/projects/thumbs/<?php echo $projectArr[$i][0] ?>.jpg" /></a></div>
			<div class="label">
				<h5><?php echo $projectArr[$i][1] ?></h5>
				<p><?php echo $projectArr[$i][2] ?></p>
			</div>
		</div>
	
	<?php }	?>
		
		<div class="project-thumb project-thumb-end"></div>
	
	</div>
	
	
	<?php require('../inc/project-cta.php'); ?>
		
</div> <!-- .container .projects -->

<?php require('../inc/footer.php'); ?>