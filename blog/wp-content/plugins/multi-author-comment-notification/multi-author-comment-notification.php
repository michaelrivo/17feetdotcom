<?php
/*
 * Plugin Name:   Multi Author Comment Notification
 * Version:       1.0.5
 * Plugin URI:    http://www.maxblogpress.com/plugins/mcn/
 * Description:   Get email notifications for comments made at other author's posts as well. Adjust your settings <a href="options-general.php?page=multi-author-comment-notification/multi-author-comment-notification.php">here</a>.
 * Author:        MaxBlogPress
 * Author URI:    http://www.maxblogpress.com
 *
 * License: Copyright (c) 2008 Pawan Agrawal. All rights reserved.
 * 
 * This plugin uses a commercial script library.
 * 
 * Please refer to "license.txt" file located at "multi-author-comment-notification-lib/"
 * for copyright notice and end user license agreement.
 *  
 */
 
$mcn_path     = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$mcn_path     = str_replace('\\','/',$mcn_path);
$mcn_siteurl  = get_bloginfo('wpurl');
$mcn_siteurl  = (strpos($mcn_siteurl,'http://') === false) ? get_bloginfo('siteurl') : $mcn_siteurl;
/*$site_email   = ( is_email($this->settings['email']) && $this->settings['email'] != 'email@example.com' ) ? $this->settings['email'] : get_bloginfo('admin_email');
$site_name    = ( $this->settings['name'] != 'YOUR NAME' && !empty($this->settings['name']) ) ? stripslashes($this->settings['name']) : get_bloginfo('name');*/
$site_email   = get_bloginfo('admin_email');
$site_name    = get_bloginfo('name');
$mcn_fullpath = $mcn_siteurl.'/wp-content/plugins/'.substr($mcn_path,0,strrpos($mcn_path,'/')).'/';
$mcn_abspath  = str_replace("\\","/",ABSPATH); 
$mcn_relpath = str_replace('\\','/',dirname(__FILE__)); 
define('MCN_NAME', 'Multi Author Comment Notification');
define('MCN_VERSION', '1.0.5');
define('MCN_PATH', $mcn_path);
define('MCN_FULLPATH', $mcn_fullpath);
require_once($mcn_relpath.'/multi-author-comment-notification-lib/include/multi-author-comment-notification.cls.php');

/**
 * MultiCommentNotifications - Multi Author Comment Notification Class
 * Holds all the necessary functions and variables
 */
class MultiCommentNotificationsPlugin extends MultiCommentNotifications
{
	var $mcn_path = "";
	var $mcn_options = array();
	var	$default_options = array('emails' => '', 'additional_emails' => '', 'not_to_logged_users' => 0, 'disabled' => 0);

	/**
	 * Constructor. Adds the plugin's actions/filters.
	 * @access public
	 */
	function MultiCommentNotificationsPlugin() { 
		global $wpdb, $wp_version, $table_prefix;
		
		$this->wp_comments_table  = $table_prefix . $this->wp_comments_table;
		$this->wp_posts_table     = $table_prefix . $this->wp_posts_table;
		$this->wp_options_table   = $table_prefix . $this->wp_options_table;
		$this->wp_users_table     = $table_prefix . $this->wp_users_table;	
		$this->wp_usermeta_table  = $table_prefix . $this->wp_usermeta_table;	 						
				
		$this->img_how      = '<img src="'.$mcn_fullpath.'images/how.gif" border="0" align="absmiddle">';
		$this->img_comment  = '<img src="'.$mcn_fullpath.'images/comment.gif" border="0" align="absmiddle">';
	  
	    add_action('activate_'.MCN_PATH, array(&$this, 'mcnActivate'));
		add_action('admin_menu', array(&$this, 'mcnAddMenu'));
		
		if( !$this->mcn_options = get_option('multi_comment_notifications') ) {
			$this->mcn_options = array();
		}
		$this->mcn_activate = get_option('mcn_activate');
		if ( $this->mcn_activate == 2 && $this->mcn_options['disabled'] != 1 ) {
			add_action('comment_post', array(&$this, 'mcnCommentNotification'));
		}
		if ( $this->mcn_activate != 2  && $_REQUEST['activate'] == true && strpos($_SERVER['REQUEST_URI'],'plugins.php') !== false ) {
			add_action('admin_footer', array(&$this, 'mcnWarning'));
		}
	}
	
	/**
	 * Called when plugin is activated. Adds option_value to the options table.
	 * @access public
	 */
	function mcnActivate() {
		add_option('multi_comment_notifications', $this->default_options, 'Multi Author Comment Notification plugin option', 'no');
		return true;
	}
	
	/**
	 * Displays message while activating the plugin
	 * @access public 
	 */
	function mcnWarning() {
		global $wp_version;
		if ( $wp_version < 2.5 ) {
			$options_txt = 'Options';
			$pad_left = '40px';
		} else  {
			$options_txt = 'Settings';
			$pad_left = '10px';
		}
		?>
        <script>
		if ( document.getElementById('message') != undefined ) {
			document.getElementById('message').innerHTML = 'Plugin <strong>activated.</strong><br>"<?php echo MCN_NAME;?>" requires registration. <a href="<?php echo $mcn_siteurl;?>/wp-admin/options-general.php?page=<?php echo MCN_PATH;?>" target="_blank">Please, click here to register</a>';
			document.getElementById('message').style.padding = '10px 10px 10px <?php echo $pad_left;?>';
		}
		</script>
        <?php
	}
	
	/**
	 * Sends email
	 * @param string $to
	 * @param string $subject
	 * @param string $message
	 * @access public
	 */
	function mcnSendMail($to, $subject, $message) {
		$this->__macnSendMail();
	}
	
	/**
	 * Sends notification emails when new comment is added to the post
	 * @param integer $comment_id
	 * @access public
	 */
	function mcnCommentNotification($comment_id = 0) {
		global $wpdb;
		if ( is_user_logged_in() && $this->mcn_options['not_to_logged_users'] == 1 ) {
			return $comment_id;
		}
		$this->__macnCommentNotification($comment_id);
	}

	/**
	 * Adds "Multi Author Comment Notification" link to admin Options menu
	 * @access public 
	 */
	function mcnAddMenu() {
		add_options_page('Multi Author Comment Notification', 'Multi Author Comment Notification', 'manage_options', MCN_PATH, array(&$this, 'mcnOptionsPg'));
	}
	
	/**
	 * Page Header
	 */
	function mcnHeader() {
		if ( !isset($_GET['dnl']) ) {	
			$mcn_version_chk = $this->mcnRecheckData();
			if ( ($mcn_version_chk == '') || strtotime(date('Y-m-d H:i:s')) > (strtotime($mcn_version_chk['last_checked_on']) + $mcn_version_chk['recheck_interval']*60*60) ) {
				$update_arr = $this->mcnExtractUpdateData();
				if ( count($update_arr) > 0 ) {
					$latest_version   = $update_arr[0];
					$recheck_interval = $update_arr[1];
					$download_url     = $update_arr[2];
					$msg_in_plugin    = $update_arr[3];
					$msg_in_plugin    = $update_arr[4];
					$upgrade_url      = $update_arr[5];
					if( MCN_VERSION < $latest_version ) {
						$mcn_version_check = array('recheck_interval' => $recheck_interval, 'last_checked_on' => date('Y-m-d H:i:s'));
						$this->mcnRecheckData($mcn_version_check);
						$msg_in_plugin = str_replace("%latest-version%", $latest_version, $msg_in_plugin);
						$msg_in_plugin = str_replace("%plugin-name%", MCN_NAME, $msg_in_plugin);
						$msg_in_plugin = str_replace("%upgrade-url%", $upgrade_url, $msg_in_plugin);
						$msg_in_plugin = '<div style="border-bottom:1px solid #CCCCCC;background-color:#FFFEEB;padding:6px;font-size:11px;text-align:center">'.$msg_in_plugin.'</div>';
					} else {
						$msg_in_plugin = '';
					}
				}
			}
		}
		echo'<div style="font-family:arial; font-size:14px;font-weight:bold; padding:0px 0px 0px 4px; width:98%; border:1px solid #C9DCEC;background-color:#C3D9FF;margin:6px 0 0 0 ;">';		
		echo '<h2>'.MCN_NAME.' '.MCN_VERSION.'</h2>';
		echo '</div>';
		if ( trim($msg_in_plugin) != '' && !isset($_GET['dnl']) ) echo $msg_in_plugin;
		#echo '<br /><strong>'.$this->img_how.' <a href="http://www.maxblogpress.com/plugins/macn/macn-use/" target="_blank">How to use it</a>&nbsp;&nbsp;&nbsp;'; 
        #echo $this->img_comment.' <a href="http://community.maxblogpress.com" target="_blank">Comments and Suggestions</a></strong><br /><br />';
	}
	
	/**
	 * Page Footer
	 */
	function mcnFooter() {
		echo '<p style="text-align:center;margin-top:3em;"><strong>'.MCN_NAME.' '.MCN_VERSION.' by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>';
	}
	
	/**
	 * Plugin's Options page
	 * Carries out all the operations in Options page
	 * @access public 
	 */
	function mcnOptionsPg() {
		global $wpdb;
		$msg = '';

		$form_1 = 'mcn_reg_form_1';
		$form_2 = 'mcn_reg_form_2';
		// Activate the plugin if email already on list
		if ( trim($_GET['mbp_onlist']) == 1 ) { 
			$this->mcn_activate = 2;
			update_option('mcn_activate', $this->mcn_activate);
			$msg = 'Thank you for registering the plugin. It has been activated'; 
		} 
		// If registration form is successfully submitted
		if ( ((trim($_GET['submit']) != '' && trim($_GET['from']) != '') || trim($_GET['submit_again']) != '') && $this->mcn_activate != 2 ) { 
			update_option('mcn_name', $_GET['name']);
			update_option('mcn_email', $_GET['from']);
			$this->mcn_activate = 1;
			update_option('mcn_activate', $this->mcn_activate);
		}
		if ( intval($this->mcn_activate) == 0 ) { // First step of plugin registration
			$this->mcnRegister_1($form_1);
		} else if ( intval($this->mcn_activate) == 1 ) { // Second step of plugin registration
			$name  = get_option('mcn_name');
			$email = get_option('mcn_email');
			$this->mcnRegister_2($form_2,$name,$email);
		} else if ( intval($this->mcn_activate) == 2 ) { // Options page
			if ( $_GET['action'] == 'upgrade' ) {
				$this->mcnUpgradePlugin();
				exit;
			}
			$this->__macnShowOptionsPg();
		}
	}
	
	/**
	 * Gets recheck data fro displaying auto upgrade information
	 */
	function mcnRecheckData($data='') {
		if ( $data != '' ) {
			update_option('mcn_version_check',$data);
		} else {
			$version_chk = get_option('mcn_version_check');
			return $version_chk;
		}
	}
	
	/**
	 * Extracts plugin update data
	 */
	function mcnExtractUpdateData() {
		$arr = array();
		$version_chk_file = "http://www.maxblogpress.com/plugin-updates/multi-author-comment-notification.php?v=".MCN_VERSION;
		$content = wp_remote_fopen($version_chk_file);
		if ( $content ) {
			$content          = nl2br($content);
			$content_arr      = explode('<br />', $content);
			$latest_version   = trim(trim(strstr($content_arr[0],'~'),'~'));
			$recheck_interval = trim(trim(strstr($content_arr[1],'~'),'~'));
			$download_url     = trim(trim(strstr($content_arr[2],'~'),'~'));
			$msg_plugin_mgmt  = trim(trim(strstr($content_arr[3],'~'),'~'));
			$msg_in_plugin    = trim(trim(strstr($content_arr[4],'~'),'~'));
			$upgrade_url      = $mcn_siteurl.'/wp-admin/options-general.php?page='.MCN_PATH.'&action=upgrade&dnl='.$download_url;
			$arr = array($latest_version, $recheck_interval, $download_url, $msg_plugin_mgmt, $msg_in_plugin, $upgrade_url);
		}
		return $arr;
	}
	
	/**
	 * Interface for upgrading plugin
	 */
	function mcnUpgradePlugin() {
		global $wp_version;
		$plugin = MCN_PATH;
		echo '<div class="wrap">';
		$this->mcnHeader();
		echo '<h3>Upgrade Plugin &raquo;</h3>';
		if ( $wp_version >= 2.5 ) {
			$res = $this->mcnDoPluginUpgrade($plugin);
		} else {
			echo '&raquo; Wordpress 2.5 or higher required for automatic upgrade.<br><br>';
		}
		if ( $res == false ) echo '&raquo; Plugin couldn\'t be upgraded.<br><br>';
		echo '<br><strong><a href="'.$mcn_siteurl.'/wp-admin/plugins.php">Go back to plugins page</a> | <a href="'.$mcn_siteurl.'/wp-admin/options-general.php?page='.MCN_PATH.'">'.MCN_NAME.' home page</a></strong>';
		$this->mcnFooter();
		echo '</div>';
		include('admin-footer.php');
	}
	
	/**
	 * Carries out plugin upgrade
	 */
	function mcnDoPluginUpgrade($plugin) {
		set_time_limit(300);
		global $wp_filesystem;
		$debug = 0;
		$was_activated = is_plugin_active($plugin); // Check current status of the plugin to retain the same after the upgrade

		// Is a filesystem accessor setup?
		if ( ! $wp_filesystem || !is_object($wp_filesystem) ) {
			WP_Filesystem();
		}
		if ( ! is_object($wp_filesystem) ) {
			echo '&raquo; Could not access filesystem.<br /><br />';
			return false;
		}
		if ( $wp_filesystem->errors->get_error_code() ) {
			echo '&raquo; Filesystem error '.$wp_filesystem->errors.'<br /><br />';
			return false;
		}
		
		if ( $debug ) echo '> File System Okay.<br /><br />';
		
		// Get the URL to the zip file
		$package = $_GET['dnl'];
		if ( empty($package) ) {
			echo '&raquo; Upgrade package not available.<br /><br />';
			return false;
		}
		// Download the package
		$file = download_url($package);
		if ( is_wp_error($file) || $file == '' ) {
			echo '&raquo; Download failed. '.$file->get_error_message().'<br /><br />';
			return false;
		}
		$working_dir = $mcn_abspath . 'wp-content/upgrade/' . basename($plugin, '.php');
		
		if ( $debug ) echo '> Working Directory = '.$working_dir.'<br /><br />';
		
		// Unzip package to working directory
		$result = $this->mcnUnzipFile($file, $working_dir);
		if ( is_wp_error($result) ) {
			unlink($file);
			$wp_filesystem->delete($working_dir, true);
			echo '&raquo; Couldn\'t unzip package to working directory. Make sure that "/wp-content/upgrade/" folder has write permission (CHMOD 755).<br /><br />';
			return $result;
		}
		
		if ( $debug ) echo '> Unzip package to working directory successful<br /><br />';
		
		// Once extracted, delete the package
		unlink($file);
		if ( is_plugin_active($plugin) ) {
			deactivate_plugins($plugin, true); //Deactivate the plugin silently, Prevent deactivation hooks from running.
		}
		
		// Remove the old version of the plugin
		$plugin_dir = dirname($mcn_abspath . PLUGINDIR . "/$plugin");
		$plugin_dir = trailingslashit($plugin_dir);
		// If plugin is in its own directory, recursively delete the directory.
		if ( strpos($plugin, '/') && $plugin_dir != $base . PLUGINDIR . '/' ) {
			$deleted = $wp_filesystem->delete($plugin_dir, true);
		} else {

			$deleted = $wp_filesystem->delete($base . PLUGINDIR . "/$plugin");
		}
		if ( !$deleted ) {
			$wp_filesystem->delete($working_dir, true);
			echo '&raquo; Could not remove the old plugin. Make sure that "/wp-content/plugins/" folder has write permission (CHMOD 755).<br /><br />';
			return false;
		}
		
		if ( $debug ) echo '> Old version of the plugin removed successfully.<br /><br />';

		// Copy new version of plugin into place
		if ( !$this->mcnCopyDir($working_dir, $mcn_abspath . PLUGINDIR) ) {
			echo '&raquo; Installation failed. Make sure that "/wp-content/plugins/" folder has write permission (CHMOD 755)<br /><br />';
			return false;
		}
		//Get a list of the directories in the working directory before we delete it, we need to know the new folder for the plugin
		$filelist = array_keys( $wp_filesystem->dirlist($working_dir) );
		// Remove working directory
		$wp_filesystem->delete($working_dir, true);
		// if there is no files in the working dir
		if( empty($filelist) ) {
			echo '&raquo; Installation failed.<br /><br />';
			return false; 
		}
		$folder = $filelist[0];
		$plugin = get_plugins('/' . $folder);      // Pass it with a leading slash, search out the plugins in the folder, 
		$pluginfiles = array_keys($plugin);        // Assume the requested plugin is the first in the list
		$result = $folder . '/' . $pluginfiles[0]; // without a leading slash as WP requires
		
		if ( $debug ) echo '> Copy new version of plugin into place successfully.<br /><br />';
		
		if ( is_wp_error($result) ) {
			echo '&raquo; '.$result.'<br><br>';
			return false;
		} else {
			//Result is the new plugin file relative to PLUGINDIR
			echo '&raquo; Plugin upgraded successfully<br><br>';	
			if( $result && $was_activated ){
				echo '&raquo; Attempting reactivation of the plugin...<br><br>';	
				echo '<iframe style="display:none" src="' . wp_nonce_url('update.php?action=activate-plugin&plugin=' . $result, 'activate-plugin_' . $result) .'"></iframe>';
				sleep(15);
				echo '&raquo; Plugin reactivated successfully.<br><br>';	
			}
			return true;
		}
	}
	
	/**
	 * Copies directory from given source to destinaktion
	 */
	function mcnCopyDir($from, $to) {
		global $wp_filesystem;
		$dirlist = $wp_filesystem->dirlist($from);
		$from = trailingslashit($from);
		$to = trailingslashit($to);
		foreach ( (array) $dirlist as $filename => $fileinfo ) {
			if ( 'f' == $fileinfo['type'] ) {
				if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true) ) return false;
				$wp_filesystem->chmod($to . $filename, 0644);
			} elseif ( 'd' == $fileinfo['type'] ) {
				if ( !$wp_filesystem->mkdir($to . $filename, 0755) ) return false;
				if ( !$this->mcnCopyDir($from . $filename, $to . $filename) ) return false;
			}
		}
		return true;
	}
	
	/**
	 * Unzips the file to given directory
	 */
	function mcnUnzipFile($file, $to) {
		global $wp_filesystem;
		if ( ! $wp_filesystem || !is_object($wp_filesystem) )
			return new WP_Error('fs_unavailable', __('Could not access filesystem.'));
		$fs =& $wp_filesystem;
		require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
		$archive = new PclZip($file);
		// Is the archive valid?
		if ( false == ($archive_files = $archive->extract(PCLZIP_OPT_EXTRACT_AS_STRING)) )
			return new WP_Error('incompatible_archive', __('Incompatible archive'), $archive->errorInfo(true));
		if ( 0 == count($archive_files) )
			return new WP_Error('empty_archive', __('Empty archive'));
		$to = trailingslashit($to);
		$path = explode('/', $to);
		$tmppath = '';
		for ( $j = 0; $j < count($path) - 1; $j++ ) {
			$tmppath .= $path[$j] . '/';
			if ( ! $fs->is_dir($tmppath) )
				$fs->mkdir($tmppath, 0755);
		}
		foreach ($archive_files as $file) {
			$path = explode('/', $file['filename']);
			$tmppath = '';
			// Loop through each of the items and check that the folder exists.
			for ( $j = 0; $j < count($path) - 1; $j++ ) {
				$tmppath .= $path[$j] . '/';
				if ( ! $fs->is_dir($to . $tmppath) )
					if ( !$fs->mkdir($to . $tmppath, 0755) )
						return new WP_Error('mkdir_failed', __('Could not create directory'));
			}
			// We've made sure the folders are there, so let's extract the file now:
			if ( ! $file['folder'] )
				if ( !$fs->put_contents( $to . $file['filename'], $file['content']) )
					return new WP_Error('copy_failed', __('Could not copy file'));
				$fs->chmod($to . $file['filename'], 0755);
		}
		return true;
	}

} // Eof Class

$MultiCommentNotificationsPlugin = new MultiCommentNotificationsPlugin();
?>