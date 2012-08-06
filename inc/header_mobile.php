<?php 
$isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad'); 
$ROOT = "http://www.17feet.com";
if($_SERVER['HTTP_HOST'] == '192.168.1.160' ){
	$ROOT = "/17feet";
}

if( strpos($_SERVER['SCRIPT_NAME'], 'staging' )){
	$ROOT = "/staging";
}


?>

<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>		<html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>		<html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
	<meta http-equiv="content-script-type" content="text/javascript" /> 
	<meta http-equiv="content-style-type" content="text/css" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<title>17feet</title>
	
	<!-- Framework CSS --> 
	<link rel="stylesheet" href="<?php echo $ROOT ?>/css/screen.css" type="text/css" media="screen, projection"> 
	<!-- <link rel="stylesheet" href="<?php echo $ROOT ?>/css/print.css" type="text/css" media="print">  -->
	<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo $ROOT ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
	<link rel="stylesheet" href="<?php echo $ROOT ?>/css/style.css" type="text/css" media="screen, projection">
	
	
	<!-- Scripts -->
	
	<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> -->
	
	<?php $typekitKey = ($ROOT != "/17feet" ? "phb6bnh" : "jnq7afd") ?>
	
	<script type="text/javascript" src="http://use.typekit.com/<?php echo $typekitKey ?>.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<script src="<?php echo $ROOT ?>/js/modernizr.js"></script>
	<!-- <script src="<?php echo $ROOT ?>/js/lectric.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $ROOT ?>/js/jquery.jsonp.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $ROOT ?>/js/hashchange.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo $ROOT ?>/js/init.js" type="text/javascript" charset="utf-8"></script> -->
</head>
<body class='mobile'>
	
	