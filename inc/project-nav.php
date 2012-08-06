<?php

$projectArr = array(
	'webos-facebook',
	'salesforce',
	'loyal3',
	'clif-bar-lunachix',
	'peoplebrowsr',
	'touchpad-apps',
	'nxtm',
	'hp-magazine-concepts',
	'microsoft-zune',
	'greatest-hits',
	'non-profit');

while( current($projectArr) != $currentProject){
	$prevLink = current($projectArr);
	next($projectArr);
}
	
	$previousLink = prev($projectArr);
	if(!$prevLink){ 
		$prevLink = end($projectArr); reset($projectArr); 
	}else{
		next($projectArr);
	}	
		
	$nextLink = next($projectArr);
	if(!$nextLink){ reset($projectArr); $nextLink = current($projectArr); };
	
?>

	<hr class="up nav-divider" />	
	
	<div class="span-3 prev-project blueBtn">
		<a href="<?php echo "../$prevLink" ?>" title="Previous Project (Left Arrow Key)" ><span></span>Previous</a>
	</div>
	
	<p class="span-6" style="padding:0; text-align:center"><a href="../" class="view-all">View All Work</a></p>
	
	<div class="span-3 next-project blueBtn last">
		<a href="<?php echo "../$nextLink" ?>" title="Next Project (Right Arrow Key)">Next<span></span></a>
	</div>