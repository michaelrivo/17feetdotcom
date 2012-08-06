<?php
/* 
 * License: Copyright (c) 2008 Pawan Agrawal. All rights reserved.
 *
 * This code is part of commercial software and for your personal use 
 * only. You are not allowed to resell or distribute this script.
 *
 */
 
/**
 * Multi Author Comment Notification
 * Holds all the necessary functions and variables
 */
 
class MultiCommentNotifications {
	var $wp_comments_table		= 'comments';
	var $wp_posts_table			= 'posts';
	var $wp_options_table		= 'options';	
	var $wp_users_table			= 'users';	
	var $wp_usermeta_table		= 'usermeta';	
	
	/**
	* get value from usermeta
	*/
	function __macnGetUsermeta($option_name, $user_id) {
		$query = "SELECT meta_value FROM " . $this->wp_usermeta_table . " WHERE 1=1 AND meta_key='" . $option_name . "' AND user_id='" . $user_id . "'";
		$sql   = mysql_query($query)or die(mysql_error());
		$rs	   = mysql_fetch_array($sql);
		return $rs['meta_value'];		
	} 
	

	/**
	* get option value from option table
	*
	*/
	function __macnGetOption($option_name = '') {
		$query = "SELECT option_value FROM " . $this->wp_options_table . " WHERE 1=1 AND ";
		if ($option_name != '') {
			$query .= "option_name='" . $option_name . "'";
		}
		$sql   = mysql_query($query);
		$rs	   = mysql_fetch_array($sql);
		return $rs['option_value'];
	}
	
	/**
	* get user details per field
	*/
	function __macnGetUserDetails($user_id, $fld) {
		$query = "SELECT " . $fld  . " FROM " . $this->wp_users_table . " WHERE ID='" . $user_id . "'";
		$sql   = mysql_query($query)or die(mysql_error());
		$rs	   = mysql_fetch_array($sql);
		return $rs[$fld];
	}
	
	/**
	 * Sends email
	 * @param string $to
	 * @param string $subject
	 * @param string $message
	 * @access public
	 */
	 function __macnSendMail($to, $subject, $message) {
		$site_name  = str_replace('"', "'", $this->__macnGetOption('blogname'));
		$site_email = str_replace(array('<', '>'), array('', ''), $this->__macnGetOption('admin_email'));
		$charset    = $this->__macnGetOption('blog_charset');
		$headers    = "From: \"{$site_name}\" <{$site_email}>\n";
		$headers   .= "MIME-Version: 1.0\n";
		$headers   .= "Content-Type: text/plain; charset=\"{$charset}\"\n";
		$subject    = '['.$site_name.'] '.$subject;
		@mail($to, $subject, $message, $headers);	
	 }	
	 
	 /**
	 * Gives post user details
	 
	 */
	 function __macnAuthorDetails($author_id) {
	 	$query = "SELECT *FROM " . $this->wp_users_table . " WHERE ID='" . $author_id . "'";
		$sql   = mysql_query($query);
		$rs	   = mysql_fetch_object($sql);
		return $rs;		
	 }
	 
	/**
	 * Sends notification emails when new comment is added to the post
	 * @param integer $comment_id
	 * @access public
	 */
	 function __macnCommentNotification($comment_id = 0) {
		if ( intval($comment_id) > 0 ) {
			$query = "SELECT 			
							t1.comment_post_ID,
							t1.comment_date,
							t1.comment_author,
							t1.comment_author_email,
							t1.comment_author_url,
							t1.comment_content,
							t1.comment_approved,
					  		t2.ID,
							t2.post_title,
							t2.post_author 
					FROM 
						$this->wp_comments_table t1 INNER JOIN $this->wp_posts_table t2 ON t1.comment_post_ID=t2.ID 
					WHERE 
						comment_ID=$comment_id";
			$sql	= mysql_query($query)or die(mysql_error());						
			$row 	= mysql_fetch_array($sql) ;
			
			$pauth_fname = $this->__macnGetUsermeta('first_name', $row['post_author']);
			$pauth_lname = $this->__macnGetUsermeta('last_name', $row['post_author']);
			
			$pauth_name  = $pauth_fname.' '.$pauth_lname;
			$auth        = $this->__macnAuthorDetails($row['post_author']);
			$pauth_email = $auth->user_email;
			if ( trim($pauth_name) == '' ) {
				$pauth_name = $auth->user_nicename;
			}
			
			$subject  = "New Comment On: ".$row['post_title'];
			$message  = '';
			if ( $row['comment_approved'] == 'spam' ) {
				return $comment_id;
			} else if ( $row['comment_approved'] == 0 ) {
				$message .= "Note: This comment is under moderation\n\n";
			}
			$message .= "New comment on: \"".$row['post_title']."\"\n".get_permalink($row['comment_post_ID'])."\n";
			$message .= "(Post Author: ".$pauth_name.")\n\n";
			$message .= "Commenter's Name: ".$row['comment_author']."\n";
			$message .= "Email: ".$row['comment_author_email']."\n";
			$message .= "URL: ".$row['comment_author_url']."\n\n";
			$message .= "Comment:\n\n".stripslashes($row['comment_content'])."\n\n\n";
			if ( $row['comment_approved'] != 1 ) {
				$message .= "Approve it: ".$mcn_siteurl."/wp-admin/comment.php?action=mac&c=".$comment_id."\n";
			}
			$message .= "Delete it: ".$mcn_siteurl."/wp-admin/comment.php?action=cdc&c=".$comment_id."\n";
			$message .= "Spam it: ".$mcn_siteurl."/wp-admin/comment.php?action=cdc&dt=spam&c=".$comment_id."\n";
			
			$user_emails = str_replace($pauth_email,'',$this->mcn_options['emails']); // remove post author email
			$user_emails = str_replace(',,',',',$user_emails);
			$user_emails = str_replace($row['comment_author_email'],'',$user_emails); // remove comment author email
			$user_emails = str_replace(',,',',',$user_emails);
			$mcn_emails  = $user_emails.','.$this->mcn_options['additional_emails'];
			$mcn_emails  = trim($mcn_emails,',');
			if ( trim($mcn_emails) != '' ) {
				$mcn_email_arr = explode(',', $mcn_emails);
				if ( count($mcn_email_arr) > 0 ) {
					foreach ( $mcn_email_arr as $mcn_email ) {
						$this->__macnSendMail(trim($mcn_email), $subject, $message);
					}
				}
			}
		}	 	
	 }	
	 
	 /**
	 * Displays all the options available
	 *
	 */
	function __macnShowOptionsPg() {
		$this->mcn_request = $_REQUEST['mcn'];
			if ( $this->mcn_request['save'] ) {
				$this->mcn_options['not_to_logged_users'] = $this->mcn_request['not_to_logged_users'];
				$this->mcn_options['disabled'] = $this->mcn_request['disabled'];
				foreach ( (array)$this->mcn_request['emails'] as $email ) {
					$mcn_emails .= ','.$email;
				}
				$mcn_emails = trim($mcn_emails,',');
				$this->mcn_options['emails'] = $mcn_emails;
				$this->mcn_options['additional_emails'] = trim($this->mcn_request['additional_emails'],',');
				update_option("multi_comment_notifications", $this->mcn_options);
				$msg = 'Options saved';
			}
			if ( trim($msg) !== '' ) {
				echo '<div id="message" class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
			}
			$logged_users_chk = '';
			$disable_chk      = '';
			if ( $this->mcn_options['not_to_logged_users'] == 1 ) {
				$logged_users_chk = ' checked ';
			}
			if ( $this->mcn_options['disabled'] == 1 ) {
				$disable_chk = ' checked ';
			}
			$user_array = array();
			$query  = "SELECT ID FROM $this->wp_users_table";
			$sql	= mysql_query($query);
			while($rs = mysql_fetch_array($sql)) {
					$result[] = $rs;			
			}
			
			foreach ( (array)$result as $key=>$row ) {
				$wp_user_level 	= intval($this->__macnGetUsermeta('wp_user_level', $row['ID']));
				$userid   		= $row['ID'];
				$username 		= $this->__macnGetUserDetails($row['ID'], 'user_login');
				$fullname 		= $this->__macnGetUsermeta('first_name', $row['ID']).' '.$this->__macnGetUsermeta('last_name', $row['ID']);
				$email    		= $this->__macnGetUserDetails($row['ID'], 'user_email');;
				$level    		= @key(unserialize($this->__macnGetUsermeta('wp_capabilities', $row['ID'])));
				$user_array[$wp_user_level][] = array($userid, $username, $fullname, $email, $level);
			}
			ksort($user_array, SORT_DESC);
			reset($user_array);
			$user_array = array_reverse($user_array, TRUE);
			?>
			<div class="wrap">
			 <?php $this->mcnHeader(); ?>
			<br>
			<table width=100% align=center cellpadding=5 cellspacing=1>
				<tr>
					<td valign=top style="text-align:left">
					<form method="post">
			 <p>
			 <h3>Send new comment notification to the following users:</h3>
			 <table border="0" width="80%" cellpadding="3" cellspacing="1">
			 <?php 
			 $last_user_level = '';
			 foreach ( (array)$user_array as $user_level=>$user_arr ) { 
			 ?>
				<tr><td colspan="4"><strong><?php echo ucfirst($user_arr[0][4]);?></strong></td></tr>
				<tr bgcolor="#dddddd">
				 <td width="3%"></td>
				 <td><strong>Username</strong></td>
				 <td><strong>Name</strong></td>
				 <td><strong>E-mail</strong></td>
				</tr>
			 <?php
				foreach ( (array)$user_arr as $user_detail ) { 
					$user_chk = '';
					if ( strpos($this->mcn_options['emails'],$user_detail[3]) !== false ) {
						$user_chk = ' checked ';
					}
			 ?>
					<tr class="alternate">
					 <td><input type="checkbox" name="mcn[emails][]" value="<?php echo $user_detail[3];?>" <? echo $user_chk;?> /></td>
					 <td><?php echo $user_detail[1];?></td>
					 <td><?php echo $user_detail[2];?></td>
					 <td><?php echo $user_detail[3];?></td>
					</tr>
			 <?php	
				}
			 } 
			 ?>
			 </table>
			 </p>
			 <p><br />Send new comment notification to the following E-mails as well: (separate multiple E-mails with comma)<br />
			 <input type="text" name="mcn[additional_emails]" value="<?php echo $this->mcn_options['additional_emails'];?>" size="85"></p>
			 <p><input type="checkbox" name="mcn[not_to_logged_users]" value="1" <?php echo $logged_users_chk;?> /> Don't send comment notification if registered user (admin, author, editor etc...) posts a comment</p>
			 <p><input type="checkbox" name="mcn[disabled]" value="1" <?php echo $disable_chk;?> /> Disable comment notification</p>
			 <p><input type="submit" name="mcn[save]" value="Save" class="button" /></p>
			 </form>
					</td>
					<td width="27%" rowspan="2" valign="top">
					<!--MBP Support-->
					<?php include_once('mbp-support-pg.php'); ?>
					<!--MBP end Support-->
					</td>
				</tr>
				<tr>
					<td width=73% valign="top">
<script type="text/javascript" charset="utf-8">
  var is_ssl = ("https:" == document.location.protocol);
  var asset_host = is_ssl ? "https://s3.amazonaws.com/getsatisfaction.com/" : "http://s3.amazonaws.com/getsatisfaction.com/";
  document.write(unescape("%3Cscript src='" + asset_host + "javascripts/feedback-v2.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript" charset="utf-8">
  var feedback_widget_options = {};

  feedback_widget_options.display = "inline";  
  feedback_widget_options.company = "maxblogpress";
  
  
  feedback_widget_options.style = "idea";
  feedback_widget_options.product = "maxblogpress_multi_author_comment_notification";
  
  
  
  
  feedback_widget_options.limit = "3";
  
  GSFN.feedback_widget.prototype.local_base_url = "http://community.maxblogpress.com";
  GSFN.feedback_widget.prototype.local_ssl_base_url = "http://community.maxblogpress.com";
  

  var feedback_widget = new GSFN.feedback_widget(feedback_widget_options);
</script>					
					
					</td>
				</tr>
			</table>
			 
			 <?php $this->mcnFooter(); ?>
			</div>
			<?php
		}
/**
	 * Plugin registration form
	 * @access public 
	 */
	function mcnRegistrationForm($form_name, $submit_btn_txt='Register', $name, $email, $hide=0, $submit_again='') {
		$wp_url = get_bloginfo('wpurl');
		$wp_url = (strpos($wp_url,'http://') === false) ? get_bloginfo('siteurl') : $wp_url;
		$thankyou_url = $wp_url.'/wp-admin/options-general.php?page='.$_GET['page'];
		$onlist_url   = $wp_url.'/wp-admin/options-general.php?page='.$_GET['page'].'&amp;mbp_onlist=1';
		if ( $hide == 1 ) $align_tbl = 'left';
		else $align_tbl = 'center';
		?>
		
		<?php if ( $submit_again != 1 ) { ?>
		<script><!--
		function trim(str){
			var n = str;
			while ( n.length>0 && n.charAt(0)==' ' ) 
				n = n.substring(1,n.length);
			while( n.length>0 && n.charAt(n.length-1)==' ' )	
				n = n.substring(0,n.length-1);
			return n;
		}
		function mcnValidateForm_0() {
			var name = document.<?php echo $form_name;?>.name;
			var email = document.<?php echo $form_name;?>.from;
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var err = ''
			if ( trim(name.value) == '' )
				err += '- Name Required\n';
			if ( reg.test(email.value) == false )
				err += '- Valid Email Required\n';
			if ( err != '' ) {
				alert(err);
				return false;
			}
			return true;
		}
		//-->
		</script>
		<?php } ?>
		<table align="<?php echo $align_tbl;?>">
		<form name="<?php echo $form_name;?>" method="post" action="http://www.aweber.com/scripts/addlead.pl" <?php if($submit_again!=1){;?>onsubmit="return mcnValidateForm_0()"<?php }?>>
		 <input type="hidden" name="unit" value="maxbp-activate">
		 <input type="hidden" name="redirect" value="<?php echo $thankyou_url;?>">
		 <input type="hidden" name="meta_redirect_onlist" value="<?php echo $onlist_url;?>">
		 <input type="hidden" name="meta_adtracking" value="macn-m-activate">
		 <input type="hidden" name="meta_message" value="1">
		 <input type="hidden" name="meta_required" value="from,name">
	 	 <input type="hidden" name="meta_forward_vars" value="1">	
		 <?php if ( $submit_again != '' ) { ?> 	
		 <input type="hidden" name="submit_again" value="1">
		 <?php } ?>		 
		 <?php if ( $hide == 1 ) { ?> 
		 <input type="hidden" name="name" value="<?php echo $name;?>">
		 <input type="hidden" name="from" value="<?php echo $email;?>">
		 <?php } else { ?>
		 <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $name;?>" size="25" maxlength="150" /></td></tr>
		 <tr><td>Email: </td><td><input type="text" name="from" value="<?php echo $email;?>" size="25" maxlength="150" /></td></tr>
		 <?php } ?>
		 <tr><td>&nbsp;</td><td><input type="submit" name="submit" value="<?php echo $submit_btn_txt;?>" class="button" /></td></tr>
		</form>
		</table>
		<?php
	}
	
	/**
	 * Register Plugin - Step 2
	 * @access public 
	 */
	function mcnRegister_2($form_name='frm2',$name,$email) {
		$msg = 'You have not clicked on the confirmation link yet. A confirmation email has been sent to you again. Please check your email and click on the confirmation link to activate the plugin.';
		if ( trim($_GET['submit_again']) != '' && $msg != '' ) {
			echo '<div id="message" class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
		}
		?>
		<div class="wrap"><h2> <?php echo MCN_NAME.' '.MCN_VERSION; ?></h2>
		 <center>
		 <table width="640" cellpadding="5" cellspacing="1" bgcolor="#ffffff" style="border:1px solid #e9e9e9">
		  <tr><td align="center"><h3>Almost Done....</h3></td></tr>
		  <tr><td><h3>Step 1:</h3></td></tr>
		  <tr><td>A confirmation email has been sent to your email "<?php echo $email;?>". You must click on the link inside the email to activate the plugin.</td></tr>
		  <tr><td><strong>The confirmation email will look like:</strong><br /><img src="http://www.maxblogpress.com/images/activate-plugin-email.jpg" vspace="4" border="0" /></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td><h3>Step 2:</h3></td></tr>
		  <tr><td>Click on the button below to Verify and Activate the plugin.</td></tr>
		  <tr><td><?php $this->mcnRegistrationForm($form_name.'_0','Verify and Activate',$name,$email,$hide=1,$submit_again=1);?></td></tr>
		 </table>
		 <p>&nbsp;</p>
		 <table width="640" cellpadding="5" cellspacing="1" bgcolor="#ffffff" style="border:1px solid #e9e9e9">
           <tr><td><h3>Troubleshooting</h3></td></tr>
           <tr><td><strong>The confirmation email is not there in my inbox!</strong></td></tr>
           <tr><td>Dont panic! CHECK THE JUNK, spam or bulk folder of your email.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>It's not there in the junk folder either.</strong></td></tr>
           <tr><td>Sometimes the confirmation email takes time to arrive. Please be patient. WAIT FOR 6 HOURS AT MOST. The confirmation email should be there by then.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>6 hours and yet no sign of a confirmation email!</strong></td></tr>
           <tr><td>Please register again from below:</td></tr>
           <tr><td><?php $this->mcnRegistrationForm($form_name,'Register Again',$name,$email,$hide=0,$submit_again=2);?></td></tr>
           <tr><td><strong>Help! Still no confirmation email and I have already registered twice</strong></td></tr>
           <tr><td>Okay, please register again from the form above using a DIFFERENT EMAIL ADDRESS this time.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr>
             <td><strong>Why am I receiving an error similar to the one shown below?</strong><br />
                 <img src="http://www.maxblogpress.com/images/no-verification-error.jpg" border="0" vspace="8" /><br />
               You get that kind of error when you click on &quot;Verify and Activate&quot; button or try to register again.<br />
               <br />
               This error means that you have already subscribed but have not yet clicked on the link inside confirmation email. In order to  avoid any spam complain we don't send repeated confirmation emails. If you have not recieved the confirmation email then you need to wait for 12 hours at least before requesting another confirmation email. </td>
           </tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>But I've still got problems.</strong></td></tr>
           <tr><td>Stay calm. <strong><a href="http://www.maxblogpress.com/contact-us/" target="_blank">Contact us</a></strong> about it and we will get to you ASAP.</td></tr>
         </table>
		 </center>		
		<p style="text-align:center;margin-top:3em;"><strong><?php echo MCN_NAME.' '.MCN_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	    </div>
		<?php
	}

	/**
	 * Register Plugin - Step 1
	 * @access public 
	 */
	function mcnRegister_1($form_name='frm1') {
		global $userdata;
		$name  = trim($userdata->first_name.' '.$userdata->last_name);
		$email = trim($userdata->user_email);
		?>
		<div class="wrap"><h2> <?php echo MCN_NAME.' '.MCN_VERSION; ?></h2>
		
<table align="center" width="680" border="0" cellspacing="1" cellpadding="3" style="border:2px solid #e3e3e3; padding: 8px; background-color:#f1f1f1;">
             <tr>
               <td>
			   
		 			 <table width="620" cellpadding="5" cellspacing="1" style="border:1px solid #e9e9e9; padding: 8px; background-color:#ffffff; text-align:left;margin-left:20px">
		  <tr><td align="center"><h3>Please register the plugin to activate it. (Registration is free)</h3></td></tr>
		  <tr><td align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>In addition you'll receive complimentary subscription to MaxBlogPress Newsletter which will give you many tips and tricks to attract lots of visitors to your blog.</td>
            </tr>
          </table></td>
		  </tr>
		  <tr><td align="center"><strong>Fill the form below to register the plugin:</strong></td></tr>
		  <tr><td align="center"><?php $this->mcnRegistrationForm($form_name,'Register',$name,$email);?></td>
		  </tr>
		  <tr><td align="center"><font size="1">[ Your contact information will be handled with the strictest confidence <br />and will never be sold or shared with third parties.Also, you can unsubscribe at anytime.]</font></td></td></tr>
		 </table>			   
			   </td>
             </tr>
           </table>			   		
		

	
		<p style="text-align:center;margin-top:3em;"><strong><?php echo MCN_NAME.' '.MCN_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	    </div>
		<?php
	}						
}
$MultiCommentNotifications = new MultiCommentNotifications();
?>