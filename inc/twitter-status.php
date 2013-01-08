<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

date_default_timezone_set('America/Los_Angeles');

function get_status() {
	
	// http://api.twitter.com/1/statuses/user_timeline.json?count=1&screen_name=17feet
	// https://api.twitter.com/1.1/statuses/show/24761903.json
	
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, "http://api.twitter.com/1/statuses/user_timeline.json?count=1&screen_name=17feet");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($c);
	
	// echo "<!-- err code ". curl_getinfo($c, CURLINFO_HTTP_CODE);
	// var_dump($src);
	// echo "-->";
	
	if( curl_getinfo($c, CURLINFO_HTTP_CODE) < 400 ){
		return $src;
	} else {
		//echo curl_getinfo($c, CURLINFO_HTTP_CODE). ' error';
		return false;
	}

	curl_close($c);

}

function time_elapsed_string($ptime) {
    $etime = time() - $ptime;
    
    if ($etime < 1) {
        return '0 seconds';
    }
    
    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );
    
    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '');
        }
    }
}

	$myFile = "tweet.txt";
	$json = file_get_contents($myFile);

	$data = json_decode($json);	
	
	$t_diff = (( time() - strtotime( $data[0]->created_at ) ) / 60 );
	
	//if 10 or more minutes have passed, refresh tweet.txt
	if($t_diff >= 10){
		$apiResponse = get_status();
		
		// prevents errors from slipping in
		if( $apiResponse ){
			$xml = $apiResponse;
			$fh = fopen($myFile, 'w') or die("can't open file");
			fwrite($fh, $xml );
			//fwrite($fh, '<request_time>'.time().'</request_time>');
			fclose($fh);
			//echo 'refreshed tweet.txt';
		}
		
	}
		
    $status = $data[0]->text;
	
	$status = preg_replace('/(https{0,1}:\/\/[\w\-\.\/#?&=]*)/', '<a href="$1" target="_blank">$1</a>', $status);
	//var_dump( $status);
	
	// $status = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $status);
	// $status = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $status);
	
	//$status = json_encode( $status );
	
	$status = preg_replace('/\\\u([0-9a-z]{4})/', '&#x$1;', $status);
	$status = str_replace('"', '', $status);
	
	
	
	//$status = preg_replace("#[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]#", '<a href="%5C%22%5C%5C0%5C%22">\\0</a>', $status);

	?><div class="tweet-wrap"><div id="tweet-txt"><?php echo $status; ?></div><div class="carat"></div></div>
<p class="via"><a href="http://twitter.com/17feet">@17feet</a>&nbsp;<span id="tweet-time"><?php echo time_elapsed_string(strtotime($data[0]->created_at)) ?> ago</span></p>