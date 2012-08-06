<?php 
// This file contains secondary functions supporting WP to Twitter
// These functions don't perform any WP to Twitter actions, but are sometimes called for when 
// support for primary functions is lacking.

if ( version_compare( $wp_version,"2.9.3",">" )) {
if (!class_exists('WP_Http')) {
	require_once( ABSPATH.WPINC.'/class-http.php' );
	}
}
	
function jd_remote_json( $url, $array=true ) {
	$input = jd_fetch_url( $url );
	$obj = json_decode($input, $array );
	return $obj;
	// TODO: some error handling ?
}			

function is_valid_url( $url ) {
    if (is_string($url)) {
	$url = urldecode($url);
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);	
	} else {
	return false;
	}
}
// Fetch a remote page. Input url, return content
function jd_fetch_url( $url, $method='GET', $body='', $headers='', $return='body' ) {
	$request = new WP_Http;
	$result = $request->request( $url , array( 'method'=>$method, 'body'=>$body, 'headers'=>$headers, 'user-agent'=>'WP to Twitter http://www.joedolson.com/articles/wp-to-twitter/' ) );
	// Success?
	if ( !is_wp_error($result) && isset($result['body']) ) {
		if ( $result['code'] != 200 ) {
			if ($return == 'body') {
			return $result['body'];
			} else {
			return $result;
			}
		} else {
			return $result['code'];
		}
	// Failure (server problem...)
	} else {
		return false;
	}
}

if (!function_exists('mb_strlen')) {
	function mb_strlen($data) {
		return strlen($data);
	}
}

if (!function_exists('mb_substr')) {
	function mb_substr($data,$start,$length = null, $encoding = null) {
		return substr($data,$start,$length);
	}
}

// str_ireplace substitution for PHP4
if ( !function_exists( 'str_ireplace' ) ) {
	function str_ireplace( $needle, $str, $haystack ) {
		$needle = preg_quote( $needle, '/' );
		return preg_replace( "/$needle/i", $str, $haystack );
	}
}
// str_split substitution for PHP4
if( !function_exists( 'str_split' ) ) {
    function str_split( $string,$string_length=1 ) {
        if( strlen( $string )>$string_length || !$string_length ) {
            do {
                $c = strlen($string);
                $parts[] = substr($string,0,$string_length);
                $string = substr($string,$string_length);
            } while($string !== false);
        } else {
            $parts = array($string);
        }
        return $parts;
    }
}
// mb_substr_replace substition for PHP4
if ( !function_exists( 'mb_substr_replace' ) ) {
    function mb_substr_replace( $string, $replacement, $start, $length = null, $encoding = null ) {
        if ( extension_loaded( 'mbstring' ) === true ) {
            $string_length = (is_null($encoding) === true) ? mb_strlen($string) : mb_strlen($string, $encoding);   
            if ( $start < 0 ) {
                $start = max(0, $string_length + $start);
            } else if ( $start > $string_length ) {
                $start = $string_length;
            }
            if ( $length < 0 ) {
                $length = max( 0, $string_length - $start + $length );
            } else if ( ( is_null( $length ) === true ) || ( $length > $string_length ) ) {
                $length = $string_length;
            }
            if ( ( $start + $length ) > $string_length) {
                $length = $string_length - $start;
            }
            if ( is_null( $encoding ) === true) {
                return mb_substr( $string, 0, $start ) . $replacement . mb_substr( $string, $start + $length, $string_length - $start - $length );
            }
		return mb_substr( $string, 0, $start, $encoding ) . $replacement . mb_substr( $string, $start + $length, $string_length - $start - $length, $encoding );
        }
	return ( is_null( $length ) === true ) ? substr_replace( $string, $replacement, $start ) : substr_replace( $string, $replacement, $start, $length );
    }
}

function print_settings() {
global $version;

$bitlyapi = ( get_option ( 'bitlyapi' ) != '' )?"Saved.":"Blank.";
$yourlsapi = ( get_option ( 'yourlsapi' ) != '' )?"Saved.":"Blank.";
$post_type_settings = get_option('wpt_post_types');
$group = array();
if (is_array($post_type_settings)) {
$post_types = array_keys($post_type_settings);
	foreach ($post_types as $type) {
		foreach ($post_type_settings[$type] as $key=>$value ) {
			$group[$type][$key] = $value;
		}
	}
}
$options = array( 
	'comment-published-update'=>get_option('comment-published-update'),
	'comment-published-text'=>get_option('comment-published-text'),
	
	'jd_twit_blogroll'=>get_option( 'jd_twit_blogroll' ),

	'jd_shortener'=>get_option( 'jd_shortener' ),
	
	'wtt_twitter_username'=>get_option( 'wtt_twitter_username' ),
	'app_consumer_key'=>get_option('app_consumer_key'),
	'app_consumer_secret'=>get_option('app_consumer_secret'),
	'oauth_token'=>get_option('oauth_token'),
	'oauth_token_secret'=>get_option('oauth_token_secret'),
	
	'suprapi'=>get_option( 'suprapi' ),
	'bitlylogin'=>get_option( 'bitlylogin' ),
	'bitlyapi'=>$bitlyapi,
	'yourlsapi'=>$yourlsapi,
	'yourlspath'=>get_option( 'yourlspath' ),
	'yourlsurl' =>get_option( 'yourlsurl' ),
	'yourlslogin'=>get_option( 'yourlslogin' ),	
	'jd_keyword_format'=>get_option( 'jd_keyword_format' ),
	
	'use_tags_as_hashtags'=>get_option( 'use_tags_as_hashtags' ),	
	'jd_strip_nonan'=>get_option( 'jd_strip_nonan' ),
	'jd_replace_character'=>get_option( 'jd_replace_character' ),
	'jd_max_tags'=>get_option('jd_max_tags'),
	'jd_max_characters'=>get_option('jd_max_characters'),	
	'jd_post_excerpt'=>get_option( 'jd_post_excerpt' ),
	'jd_date_format'=>get_option( 'jd_date_format' ),
	'jd_twit_prepend'=>get_option( 'jd_twit_prepend' ),
	'jd_twit_append'=>get_option( 'jd_twit_append' ),
	'jd_twit_custom_url'=>get_option( 'jd_twit_custom_url' ),
	
	'jd_tweet_default'=>get_option( 'jd_tweet_default' ),
	'jd_twit_remote'=>get_option( 'jd_twit_remote' ),
	
	'use-twitter-analytics'=>get_option( 'use-twitter-analytics' ),
	'twitter-analytics-campaign'=>get_option( 'twitter-analytics-campaign' ),
	'use_dynamic_analytics'=>get_option( 'use_dynamic_analytics' ),
	'jd_dynamic_analytics'=>get_option( 'jd_dynamic_analytics' ),
	
	'jd_individual_twitter_users'=>get_option( 'jd_individual_twitter_users' ),
	'wtt_user_permissions'=>get_option('wtt_user_permissions'),
	
	'wp_twitter_failure'=>get_option( 'wp_twitter_failure' ),
	'wp_url_failure' =>get_option( 'wp_url_failure' ),
	'wp_bitly_error'=>get_option( 'wp_bitly_error' ),
	'wp_supr_error'=>get_option( 'wp_supr_error' ),
	'wp_to_twitter_version'=>get_option( 'wp_to_twitter_version'),
	
	'disable_url_failure'=>get_option('disable_url_failure' ),
	'disable_twitter_failure'=>get_option('disable_twitter_failure' ),
	'disable_oauth_notice'=>get_option('disable_oauth_notice'),
	'wp_debug_oauth'=>get_option('wp_debug_oauth'),
	'jd_donations'=>get_option( 'jd_donations' ),
	
	'tweet_categories'=>get_option('tweet_categories' ),
	'limit_categories'=>get_option('limit_categories' ),
	'twitterInitialised'=>get_option( 'twitterInitialised' )	
);
echo "<div class=\"settings\">";
echo "<strong>Raw Settings Output: Version $version</strong>";
echo "<ol>";
foreach ( $group as $key=>$value)  {
	echo "<li><code>$key</code>:<ul>";
	foreach ( $value as $k=>$v ) {
		echo "<li><code>$k</code>: $v</li>";
	}
	echo "</ul></li>";
}
foreach ($options as $key=>$value) {
	echo "<li><code>$key</code>:$value</li>";
}

echo "</ol>";
echo "<p>";
_e( "[<a href='options-general.php?page=wp-to-twitter/wp-to-twitter.php'>Hide</a>] If you're experiencing trouble, please copy these settings into any request for support.",'wp-to-twitter');
echo "</p></div>";
}

function wtt_option_selected($field,$value,$type='checkbox') {
	switch ($type) {
		case 'radio':		
		case 'checkbox':
		$result = ' checked="checked"';
		break;
		case 'option':
		$result = ' selected="selected"';
		break;
	}	
	if ($field == $value) {
		$output = $result;
	} else {
		$output = '';
	}
	return $output;
}