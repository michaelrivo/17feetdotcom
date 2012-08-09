<?php
function get_status($twitter_id) {
	
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($c);
	
	if( curl_getinfo($c, CURLINFO_HTTP_CODE) < 400 ){
		echo $src;
	} else {
		return false;
	}
	
	curl_close($c);
}

get_status('17feet');

?>