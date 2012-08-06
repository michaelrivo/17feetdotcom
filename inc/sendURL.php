<?php
/*
This script is used to process the form from the About page that visitors
can use to send portfolio links to 17FEET

Parameters:
	portfolioLink = url
*/

function valid_url($str) {
	return ( ! preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $str)) ? FALSE : TRUE;
}

if(empty($_POST['portfolioLink']) || !valid_url(trim($_POST['portfolioLink'])) ){
	$error .= "portfolioLink|Valid URL required!%";
}

if($error == '') {
	require_once("htmlMimeMail5/htmlMimeMail5.php");
	
	$portfolioLink = $_POST['portfolioLink'];
	
	$notification = "Portfolio link sent in: " . $portfolioLink;
	$notifyemail = "brandon@17feet.com"; //brandonherring
	//$notifyemail = "arrel@17feet.com";
	//$notifyemail = "gpolguere@gmail.com";
	$notifysubject = "17FEET.com: Incoming Portfolio Link";
	$header = "From: 17FEET <pingme@17feet.com>\r\n";
	
	$mail = new htmlMimeMail5();

    $mail->setFrom("pingme@17feet.com");
    $mail->setSubject($notifysubject);
	$mail->setCC('breanacanton@17feet.com');
    $mail->setText($notification);
	$result  = $mail->send(array($notifyemail));
	
	if (!$result) {
		$error .= "general|Failed to send email. Please use pingme@17feet.com.%";
	} 
}

if(empty($error)) {
	echo "{\"result\": \"success\"}";
} else {
	echo "{\"result\": \"" . $error . "\"}";
}
?>