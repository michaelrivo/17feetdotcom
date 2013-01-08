<?php

require('project-data.php');
$ct = 0;
$nextLinkTtl = "Next";
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
		// if we're at the end go to About Us
		
		$nextLinkTtl = "About Us";
		$nextProjectData = array("../about-us");
		
		//reset($projectArr); $nextProjectData = current($projectArr);
	};
	
	$prevLink = $previousProjectData[0]; 
	$nextLink = $nextProjectData[0]; 
	
?>

	<hr class="up nav-divider" />	
	

	<div class="hover-area absolute posRight project-control">	
		<a class="next absolute block" href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)"></a>
	</div>
	
	<div class="hover-area absolute posLeft project-control">
		<a class="prev absolute block" href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)"></a>
	</div>
	
	<div>
		<div class="prev-project blueBtn">
			<a href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)" >Previous</a>
		</div>
		
		<div class="next-project blueBtn last">
			<a href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)"><?php echo $nextLinkTtl ?><!-- <span></span> --></a>
		</div>
	
		<p class="view-all-work relative" style="text-align:center"><a href="../">View All Work</a></p>
	
	</div>
	<!-- </div> -->