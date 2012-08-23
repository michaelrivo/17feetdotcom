<?php
error_reporting(0);
function get_status($twitter_id) {
	
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml?count=1");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($c);
	
	if( curl_getinfo($c, CURLINFO_HTTP_CODE) < 400 ){
		return $src;
	} else {
		//echo curl_getinfo($c, CURLINFO_HTTP_CODE). ' error';
		return false;
	}

	curl_close($c);

}

function getRelativeTime($utimestamp){
	if (isset($utimestamp)) {
		$types = Array('second', 'minute', 'hour', 'day', 'week', 'month', 'years', 'decade');
		$duration = Array(60, 60, 24, 7, 4.35, 12, 10);
		$gap = (time() - $utimestamp);
		if ($gap > 0) {
			$end = "ago";
		} else {
			$gap =- $gap;
			$end = "to go";
		}
		for($i = 0; $gap >= $duration[$i]; $i++) {
			$gap /= $duration[$i];
			$gap = round($gap);
		}
		if($gap != 1) { 
			$types[$i].= "s";
			$reltime = $gap.' '.$types[$i].' '. $end;
		}
		return $reltime;
	}
}

	$myFile = "tweet.txt";
	$xml = file_get_contents($myFile);
	
	//echo '<pre style="padding:10px; background-color:#f3f3f3;">'.htmlentities($xml).'</pre>';
	
	preg_match('/<request_time>(.*)<\/request_time>/', $xml, $t);
	$t = (int)($t[1]);
	
	$t_diff = (( time() - $t ) / 60 );
	
	//if 10 or more minutes have passed, refresh tweet.tx
	if($t_diff >= 10){
		$apiResponse = get_status('17feet');
		
		// prevents errors from slipping in
		if( $apiResponse ){
			$xml = $apiResponse;
			$fh = fopen($myFile, 'w') or die("can't open file");
			fwrite($fh, $xml );
			fwrite($fh, '<request_time>'.time().'</request_time>');
			fclose($fh);
			//echo 'refreshed tweet.txt';
		}
		
	}
		
		preg_match('/<text>(.*)<\/text>/', $xml, $m);
	    $status = htmlentities($m[1]);	    
		$status = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", '<a href="%5C%22%5C%5C0%5C%22">\\0</a>', $status);

		preg_match('/<created_at>(.*)<\/created_at>/', $xml, $tweet_time);

		?>

		<div class="tweet-wrap"><div id="tweet-txt"><?php echo $status; ?></div><div class="carat"></div></div>
		<p class="via"><a href="http://twitter.com/17feet">@17feet</a>&nbsp;<span id="tweet-time"><?php echo getRelativeTime(strtotime($tweet_time[1])) ?></span></p>