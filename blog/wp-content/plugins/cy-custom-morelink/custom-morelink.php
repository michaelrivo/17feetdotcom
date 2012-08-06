<?php
/*
Plugin Name: Custom-MoreLink
Version: 0.2
Plugin URI: http://www.cywhale.de
Description: Customize the WordPress generated more link.
Author: Michael Weingaertner
Author URI: http://www.cywhale.de
Min WP Version: 2.3
Max WP Version: 2.6.2
*/

/*  Copyright 2007  Michael Weingärtner  (email : admin@cywhale.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// check if not is admin page
if(!is_admin()){
    // replace old more link
    add_filter('the_content','cyTB_more');
}else{
    // load language files and add admin menu option
    load_plugin_textdomain('cy_custom_morelink','wp-content/plugins/cy-custom-more/languages');
    add_action('admin_menu', 'cy_custom_morelink_add_option_menu');
}


/*
 * Replaces the old wp generated more-link with new pattern
 * This function is used as a filter for the wordpress content
 * 
 * @param string $content
 * @return string $content
 */
function cyTB_more($content){
    // get the customized link pattern
    $pattern=cy_custom_morelink_get_pattern();
    
    // search pattern for old wp generated more link structure        
    $search_pattern='=<a href\="(.*)(#more-[\d]+)" class\="([a-zA-Z\-\ ]+)">(.*)<\/a>=';
    
    // search old more link and get the important parts
    $matches=array();
    if(FALSE !== preg_match($search_pattern,$content,$matches)){
        $url = $matches[1];
        $anchor=$matches[2];
        $class=$matches[3];
        $linktext=$matches[4];
        
        // replace tags in new-morelink-pattern with found parts if neccessary
        $pattern=str_replace(
            array('%permalink%','%anchor%','%class%','%linktext%'),
            array($matches[1],$matches[2],$matches[3],$matches[4]),
            $pattern);
            
        // replace old more link with new link pattern    
        $content=preg_replace($search_pattern,$pattern,$content);
        
        // done
        return($content);
    }else{
        // no more-link found, do nothing and return $content
        return($content);
    }
}

/*
 * Adds plugin options menu option to WordPress options
 */
function cy_custom_morelink_add_option_menu(){
        add_options_page('Custom More Link Options Page', 'Custom More Link', 9, __FILE__, 'cy_custom_morelink_options');
}

/*
 * Gets new more-link pattern from the wo options database table,
 * if there is no custom link pattern this function rebuilds the
 * WordPress default more-link structure
 * 
 * @returns string $pattern
 */    
function cy_custom_morelink_get_pattern(){
    // set pattern max length
    $cy_custom_more_maxlen=255;
    
    // generate default pattern
    $default_pattern='<a href="%permalink%%anchor%" class="%class%">%linktext%</a>';
    
    // get pattern and strip those *** slashes
    $pattern=stripslashes(get_option('cy_custom_morelink_pattern'));
    
    // return the shortened (if neccessary) pattern
    if($pattern===FALSE || empty($pattern)){
        $pattern=$default_pattern;
        }
     if(strlen($pattern)>$cy_custom_more_maxlen){
         $pattern=substr($pattern,0,$cy_custom_more_maxlen);
         }   
    return($pattern);
}

/*
 * Shows the custom-more-link options page displaying some information, links
 * and the pattern option field.
 * This function handles the database updating, too.
 */
function cy_custom_morelink_options(){
    // update the database if needed
    if ('update' == $_POST['action']){
        
        // set messagebox status default
        $updated=FALSE;
        
        // are we allowed to do this ?
        if ( function_exists('current_user_can') && !current_user_can('manage_options') )
                die(__('Cheatin’ uh?'));

        // check for form security
        check_admin_referer( 'cy_custom_morelink' );
        
        // everything ok, update and set messagebox status
        update_option("cy_custom_morelink_pattern",$_POST['cy_custom_morelink_pattern']);
        $updated=TRUE;
    }

    // get and prepare the custom more-link pattern
    $pattern=cy_custom_morelink_get_pattern();
    $pattern=htmlspecialchars($pattern);    
    
    // now let's build the options page
    ?>
        <div class="wrap">
        <h2><?php _e('Customize More Link','cy_custom_morelink');?></h2>
        <p><?php _e('Customize the WordPress "Read more" link displayed on bottom of your posts. With this plugin 
        you can add custom attributes such as the "<code>nofollow</code>" relation, add custom XHTML tags surrounding the link or remove the 
        <code>#-number</code> anchor added by WordPress. If you like this plugin please consider giving a backlink to <a href="http://www.cywhale.de/" title="Link to the authors website">http://www.cywhale.de/</a> or 
        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=454273" title="Make a donation via this Link">making a donation</a> via PayPal. Thank you very much for using this plugin.','cy_custom_morelink');?></p>
        <h3><?php _e('Usage','cy_custom_morelink');?></h3>
        <p><?php _e('Use the following tags to build your custom more link:','cy_custom_morelink');?></p>
        <ul>
            <li><p><code>%permalink%</code> - <?php _e('The permalink provided by WordPress to the full post','cy_custom_morelink');?></p></li>
            <li><p><code>%anchor%</code> - <?php _e('The anchortext provided by WordPress (default: #more-number)','cy_custom_morelink');?></p></li>
            <li><p><code>%class%</code> - <?php _e('The default CSS class provided by WordPress (default: more-link)','cy_custom_morelink');?></p></li>
            <li><p><code>%linktext%</code> - <?php _e('The linktext provided by WordPress','cy_custom_morelink');?></p></li>
        </ul>
        
        <?php if(isset($_POST['action']) && $updated!==TRUE):?>
        <div id="cy_custom_morelink_message" class="error fade-ff0000">
            <p>
                <?php echo htmlspecialchars(__('The new more link pattern could not be saved, sorry. ','cy_custom_morelink'));?>
            </p>
        </div>
        
        <?php endif;?>

        <?php if(isset($_POST['action']) && $updated===TRUE):?>
        <div id="cy_custom_morelink_message" class="updated fade-ff0000">
            <p>
                <?php echo htmlspecialchars(__('Custom more link pattern updated.','cy_custom_morelink'));?>
            </p>
        </div>
        
        <?php endif;?>

        <form method="post" action="">
        <?php wp_nonce_field('cy_custom_morelink'); ?>

        <table class="form-table">

        <tr valign="top">
        <th scope="row"><?php _e('More Link Pattern','cy_custom_morelink');?></th>
        <td><input type="text" style="width:100%" name="cy_custom_morelink_pattern" value="<?php  echo $pattern; ?>" /></td>
        </tr>

        </table>

        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="page_options" value="more-link-pattern" />

        <p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
        </p>

        </form>
        </div>
    <?php }
?>
