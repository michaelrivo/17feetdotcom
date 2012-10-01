<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 0.1
 */
?>
<?php 
$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad'); 
$isiPad = false;
$ROOT = "http://www.17feet.com";
if($_SERVER['HTTP_HOST'] == '192.168.1.246' || $_SERVER['HTTP_HOST'] == 'localhost' ){
	$ROOT = "/17feet";
}

if( strpos($_SERVER['SCRIPT_NAME'], 'staging' )){
	$ROOT = "/staging";
}

?>

<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-script-type" content="text/javascript" /> 
	<meta http-equiv="content-style-type" content="text/css" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	
	<meta name="viewport" content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
	
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'toolbox' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- Framework CSS --> 
<!-- <link rel="stylesheet" href="<?php echo $ROOT ?>/css/screen.css" type="text/css" media="screen, projection">  -->
<link rel="stylesheet" href="<?php echo $ROOT ?>/css/print.css" type="text/css" media="print"> 
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo $ROOT ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" href="<?php echo $ROOT ?>/css/style.css" type="text/css" media="screen, projection">

<link rel='stylesheet' media='screen and (min-width: 0px) and (max-width: 960px)' href='<?php echo $ROOT ?>/css/less/responsive.css' />

<!-- Scripts -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<?php $typekitKey = ($ROOT != "/17feet" ? "phb6bnh" : "jnq7afd") ?>

<script type="text/javascript" src="http://use.typekit.com/<?php echo $typekitKey ?>.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<script src="<?php echo $ROOT ?>/js/modernizr.js"></script>
<script src="<?php echo $ROOT ?>/js/lectric.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $ROOT ?>/js/jquery.jsonp.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $ROOT ?>/js/init.js" type="text/javascript" charset="utf-8"></script>


<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>
<body <?php echo ($parentPage ? "class='$parentPage'": '');  ?> >
	<div id="body" class="blog">
		<div id="header">
			<div class="container">
				 <div class="hide-full">
					<button class="mobile-btn" id="menu-toggle" data-toggle="#nav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="back-btn">
					<a class="mobile-btn" href="./">Back</a>
				</div>

				<div class="row-fluid">

					<h1 id="logo" class="span2"><a href="<?php echo $ROOT ?>/" class="hide-txt">17feet</a></h1>
					<ul class="span8" id="nav">
						<li class="our-work"><a href="<?php echo $ROOT; ?>/our-work">Our Work</a></li>
						<li class="about-us"><a href="<?php echo $ROOT; ?>/about-us">About Us</a></li>						
						<li class="join"><a href="<?php echo $ROOT; ?>/join">Join the Team!</a></li>
						<li class="blog"><a href="<?php echo $ROOT; ?>/blog">Our Blog</a></li>
						<li class="contact-us"><a href="<?php echo $ROOT; ?>/contact-us">Contact Us!</a></li>

					</ul>
					<div class="span2 last twitter"><a href="http://twitter.com/17feet" target="_blank"><span>We're on Twitter</span></a></div>

				</div> 
			</div>
		</div> <!-- .header -->

	<div class="container">
		<div class="header">
			<h2>17FEET Blog</h2>
			<h3>Keep up with all things 17FEET</h3>
			<hr class="up" />
		</div>
	</div>
	