<?php
/*
This script is used to process the form from the Contact page

Parameters:
	contactMessage (required) = visitor's message
	contactEmail
	contactName
*/
header('content-type: text/html;');

if(!empty($_POST['contactMessage']) && !empty($_POST['contactEmail'])) {
	$fromemail = $_POST['contactEmail'];
	
	$validEmailPattern = "/^[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[a-z]{2,4}|museum|travel)$/i";
	
	if (preg_match($validEmailPattern, $fromemail)) {
		require_once("htmlMimeMail5/htmlMimeMail5.php");
		
		$fromname = (empty($_POST['contactName'])) ? "" : $_POST['contactName'];
		$message = $_POST['contactMessage'];
		
		$notification = "From: $fromname <$fromemail> \n\n$message";
		$notifyemail = array("brandon@17feet.com", "michael@17feet.com", "breana@17feet.com","pingme@17feet.com");
		$notifysubject = "17FEET.com: Incoming Contact Inquiry";
		
		$mail = new htmlMimeMail5();
	
	    $mail->setFrom("$fromname <$fromemail>");
		$mail->setReturnPath($fromemail);
		
	    $mail->setSubject($notifysubject);
	    $mail->setPriority('high');
	    $mail->setText($notification);
		$result = $mail->send($notifyemail);
		
		if (!$result) {
			$error = "general|Failed to send mail. Please use pingme@17feet.com.%";
		} elseif(!empty($fromname) && !empty($fromemail)) {
			/* SEND CONFIRMATION */
			
			$email_subject = "Thanks for the info!";
			
			$message_text = "Hi " . $fromname . " !\n\n";
			$message_text .= "Thanks for contacting the studio. We'll be in touch soon.\n\n";
			$message_text .= "-17FEET";
			
			$message_html = '<style>';
			$message_html .= 'a { color: #EF4023; }';
			$message_html .= '</style>';
			$message_html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$message_html .= '	<tr>';
			$message_html .= '		<td><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">Hi ';
			$message_html .= $fromname;
			$message_html .= "!<br /><br />Thanks for contacting the studio. We'll be in touch soon.<br /><br />-17FEET</font></td>";
			$message_html .= '	</tr>';
			$message_html .= '</table>';
			
			$mailConfirmation = new htmlMimeMail5();
		
		    $mailConfirmation->setFrom("pingme@17feet.com");
		    $mailConfirmation->setSubject($email_subject);
		    $mailConfirmation->setPriority('high');
		    $mailConfirmation->setText($message_text);
		    $mailConfirmation->setHTML($message_html);
			$resultConfirmation  = $mailConfirmation->send(array($fromemail));
		
			if (!$resultConfirmation) {
				$error = "general|Failed to send mail. Please use pingme@17feet.com.";
			}
		}
	} else {
		$error = "contactEmail|Valid Email Required%";
	}
} else {
	if(empty($_POST['contactMessage'])) {
		$error .= "contactMessage|Message Required%";
	} elseif(empty($_POST['contactEmail'])) {
		$error .= "contactEmail|Email Required%";
	} else {
		$error .= "general|Failed to send mail. Please use pingme@17feet.com.%";
	}
}

if(empty($error)) {
	echo "{\"result\": \"success\"}";
} else {
	echo "{\"result\": \"" . $error . "\"}";
}
?>