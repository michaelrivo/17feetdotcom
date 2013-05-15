<?php 

error_reporting(E_ALL);
$parentPage = 'mobile-menu our-work';
require('../inc/header.php'); 

?>

<div class="container projects static">
	<div class="header">
			<h2>The Proof is in the Pixels</h2>		
			<h3>We craft digital products and experiences</h3>
	</div>	
	
	<div class="row-fluid project-grid">
		
	<?php // outputs the project grid

	require('../inc/project-data.php');

	$masterArr = array_merge( $featuredArr, $projectArr );
	
	?>
		
	<?php
	for($i = 0; $i < count($masterArr); $i++ ){ ?>
		
		<div class="project-thumb <?php echo ( ($i + 1) % 2 ) ? 'thumb-odd' :'thumb-even'; echo ' '.($i+1) ?>">
			<a href="<?php echo $masterArr[$i][0] ?>" class="thumb-link" ><img src="../imgs/projects/thumbs/<?php echo $masterArr[$i][0] ?>.jpg" class="trans" /></a>
			<div class="label">
				<a href="<?php echo $masterArr[$i][0] ?>" class="h5 trans"><?php echo $masterArr[$i][1] ?></a>
				<p><?php echo $masterArr[$i][2] ?></p>
			</div>
		</div>
	
	<?php }	?>
		
	
	</div>
	
	
	<?php require('../inc/project-cta.php'); ?>
		
</div> <!-- .container .projects -->

<?php require('../inc/footer.php'); ?>