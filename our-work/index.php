<?php 
$parentPage = 'mobile-menu';
require('../inc/header.php'); 
?>

<div class="container projects">
	
	<div class="row width-lg-tablet">
		<div class="span10 ">
			<h2>Our Work</h2>		
			<h3>We work with companies of all sizes to create digital products and experiences. <br/>Have a look at some of our favorite projects.</h3>
	
		</div>
	</div>
	
	<hr class="up"/>
	
	<div class="row-fluid row-grid">
		
	<?php
	// outputs the project grid
	
	require('../inc/project-data.php');
	for($i = 0; $i < count($projectArr); $i++ ){
		//  if end of row
		$rowEnd = false;//( ($i+1) % 3 == 0? true : false  );
		//echo ( $i % 3 == 0? '<div class="row">' : '')
	 	?>
		
		<div class="project span4 <?php echo ($rowEnd ? 'last': '') ?>">
			<div><a href="<?php echo $projectArr[$i][0] ?>" class="<?php echo $projectArr[$i][0] ?>"><img src="../imgs/thumbs/<?php echo $projectArr[$i][0] ?>.png" /></a></div>
			<h5><?php echo $projectArr[$i][1] ?></h5>
			<p><?php echo $projectArr[$i][2] ?></p>
		</div>
	
	
	<?php 	
		echo ( $rowEnd ? '</div><!-- Row -->' : '');
	}
	?>
	
	</div>
		
</div> <!-- .container .projects -->

<?php require('../inc/footer.php'); ?>