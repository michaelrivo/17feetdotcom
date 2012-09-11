<?php

require('project-data.php');
$ct = 0;

while( true && $ct < 20){
	$projectData = current($projectArr);
	if($projectData[0] == $currentProject){
		break;
	} else{
		next($projectArr);
		$ct++;		
	}
}
	
	$previousProjectData = prev($projectArr);
	if(!$previousProjectData){ 
		$previousProjectData = end($projectArr); reset($projectArr); 
	}else{
		// if we're not at the beginning go back to current
		next($projectArr);
	}
	
	$nextProjectData = next($projectArr);
	if(!$nextProjectData){ 
		reset($projectArr); $nextProjectData = current($projectArr);
	};
	
	$prevLink = $previousProjectData[0]; 
	$nextLink = $nextProjectData[0]; 
	
?>

	<hr class="up nav-divider" />	
	
	<!-- <div class="span12 last">
	 -->
	
	<div class="project-controls hide-mobile">		
		<a class="next absolute posRight block" href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)"></a>
		<a class="prev absolute posLeft block" href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)"></a>
	</div>
	
	<div class="container" style="padding:0;">
		<div class="prev-project blueBtn">
			<a href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)" ><!-- <span></span> -->Previous</a>
		</div>
		
		<div class="next-project blueBtn last">
			<a href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)">Next<!-- <span></span> --></a>
		</div>
	
		<p class="view-all-work relative" style="text-align:center"><a href="../">View All Work</a></p>
	
	</div>
	<!-- </div> -->