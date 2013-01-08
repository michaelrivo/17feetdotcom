<?php


function pink_cta( $text, $url ){
	
	echo '<a class="pink-cta" href="'.$url.'"><span class="start">'. $text .'</span><span class="end"></span></a>';
	
}

function sm_pink_cta( $text, $url ){
	
	echo '<a class="pink-cta sm-pink-cta" href="'.$url.'"><span class="start">'. $text .'</span><span class="end"></span></a>';
	
}


function black_cta( $text, $url ){
	
	echo '<a class="black-cta clearfix" href="'.$url.'"><span class="start">'. $text .'</span><span class="end"></span></a>';
	
}


?>