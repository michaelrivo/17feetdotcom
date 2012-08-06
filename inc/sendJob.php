<?php

/*
This script is used to process the form from the Contact page

Parameters:
	message = visitor's message
	workurl (required)
	fromemail
	fromname
	jobid
*/
$error ='';

$validEmailPattern = "/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2,4}|museum|travel)$/i";

if(empty($_POST['jobName'])) {
	$error .= "jobName|Name is required%";
}

if(!preg_match($validEmailPattern, $_POST['jobEmail'])) {
	$error .= "jobEmail|Valid email is required%";
} 

if(empty($_POST['jobPortfolioLink'])) {
	$error .= "jobPortfolioLink|Portfolio link is required%";
} 

if(empty($_POST['jobPosition'])) {
	$error .= "general|Job Position not being populated%";
}

if(empty($_POST['jobMessage'])) {
	$error .= "jobMessage|Message is required%";
}


if($error == '') {
	$fromemail = $_POST['jobEmail'];
		
	require_once("htmlMimeMail5/htmlMimeMail5.php");

	$fromname = $_POST['jobName'];
	$workurl = $_POST['jobPortfolioLink'];
	$jobid = $_POST['jobPosition'];
	$message = empty($_POST['jobMessage']) ? "" : " " . $_POST['jobMessage'];

	$notification = "name: " . $fromname . "\n";
	$notification .= "email: " . $fromemail . "\n";
	$notification .= "url: " . $workurl . "\n";
	$notification .= "jobid: " . $jobid . "\n";
	$notification .= "message:\n" . $message;
	$notifyemail = "brandon@17feet.com";
	//$notifyemail = "gpolguere@gmail.com";
	$notifysubject = "17FEET.com: Incoming Job Submission";
	
	$mail = new htmlMimeMail5();

    $mail->setFrom("pingme@17feet.com");
	$mail->setCC("breanacanton@17feet.com");
    $mail->setSubject($notifysubject);
    $mail->setPriority('high');
    $mail->setText($notification);
	$result  = $mail->send(array($notifyemail));
	
	if (!$result) {
		$error .= "general|Failed to send email. Please use pingme@17feet.com.%";
	} else {
		/* SEND CONFIRMATION */
		
		$email_subject = "Thanks for applying!";
		
		$message_text = "Thanks for you interest in 17FEET!\nWe're always looking for talented folks so we'll take a look at your submission and be in touch if it seems like a proper fit.";
		$message_text .= "\n\n17FEET\n\nwww.17FEET.com\n\nTwitter: @17feet\n\n";
		
		$message_html = '<style>a { color: #5B9AAC;text-decoration:none; }</style>';
		$message_html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		$message_html .= '<tr>';
		$message_html .= '<td><p style="color:#333333;font-size:15px; line-height:22px; font-family:Helvetica, Arial, sans-serif">';
		$message_html .= "Thanks for you interest in 17FEET!<br />We're always looking for talented folks so we'll take a look at your submission and be in touch if it seems like a proper fit.<br /><br />";
		$message_html .= '<strong>17FEET</strong><br/><span style="font-size:12px;line-height:18px;"><a href=\"www.17feet.com\">www.17feet.com</a><br /><a href=\"www.twitter.com/17feet\">@17feet</a></span></p></td>';
		$message_html .= '</tr>';
		$message_html .= "</table>";
		
		$mailConfirmation = new htmlMimeMail5();

	    $mailConfirmation->setFrom("pingme@17feet.com");
	    $mailConfirmation->setSubject($email_subject);
	    $mailConfirmation->setPriority('high');
	    $mailConfirmation->setText($message_text);
	    $mailConfirmation->setHTML($message_html);
    	$resultConfirmation  = $mailConfirmation->send(array($fromemail));
		
		if (!$resultConfirmation) {
			$error .= "general|Failed to send email. Please use pingme@17feet.com.%";
		}
	}
} 

if($error == '') {
	echo "{\"result\": \"success\"}";
} else {
	echo "{\"result\": \"" . $error . "\"}";
}

?>