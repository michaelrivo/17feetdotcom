<?php

require('project-data.php');
$ct = 0;
$nextLinkTtl = "Next";

//var_dump($masterArr);
//echo '<pre>';

reset($masterArr); 

while( true && $ct < 20){
	$projectData = current($masterArr);

	if($projectData[0] == $currentProject){
		break;
	} else{
		//echo 'next';
		next($masterArr);
		$ct++;		
	}
	
}

//echo '</pre>';
	
	$previousProjectData = prev($masterArr);
	if(!$previousProjectData){ 
		$previousProjectData = end($masterArr); reset($masterArr); 
	}else{
		// if we're not at the beginning go back to current
		next($masterArr);
	}
	
	$nextProjectData = next($masterArr);
	if(!$nextProjectData){ 
		// if we're at the end go to About Us
		
		$nextLinkTtl = "About Us";
		$nextProjectData = array("../about-us");
		
		//reset($projectArr); $nextProjectData = current($projectArr);
	};
	
	$prevLink = $previousProjectData[0]; 
	$nextLink = $nextProjectData[0]; 
	
?>

<div class="row-fluid row-cta row-pad width-tablet dotted-grey">
	
	<h3 class="span8 quiet">We'd love to hear about <br class="hide">your next project.</h3>	
	<div class="span4">
		<?php pink_cta("Get in touch", $ROOT."/contact-us"); ?>
	</div>
	
</div>

<?php if ( isset($currentProject) ){ ?>
<div class="hover-area absolute posRight project-control">	
	<a class="next absolute block" href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)"></a>
</div>

<div class="hover-area absolute posLeft project-control">
	<a class="prev absolute block" href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)"></a>
</div>

<?php } ?>