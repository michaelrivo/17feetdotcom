<?php require('../inc/header.php'); ?>

<div class="container projects">
	
	<div class="span10 append-2 last">
		
		<h2>Our Work</h2>
		
		<h3>We work with companies of all sizes to create digital products and experiences.<br/>Have a look at some of our favorite projects.</h3>
	
	</div>
	
	<hr class="up"/>
	
	<?php
	// outputs the project grid
	
	require('../inc/project-data.php');
	for($i = 0; $i < count($projectArr); $i++ ){
		//  if end of row
		$rowEnd = ( ($i+1) % 3 == 0? true : false  );
	 	?>
		
		<div class="project span4 <?php echo ($rowEnd ? 'last': '') ?>">
			<div><a href="<?php echo $projectArr[$i][0] ?>" class="<?php echo $projectArr[$i][0] ?>"></a></div>
			<h5><?php echo $projectArr[$i][1] ?></h5>
			<p><?php echo $projectArr[$i][2] ?></p>
		</div>
	
	<?php 	
		echo ( $rowEnd ? '<!-- Row -->' : '');
	}
	?>
		
</div>

<?php require('../inc/footer.php'); ?>