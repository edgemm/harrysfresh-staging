<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php
	// Detect Yoast SEO Plugin
	if (defined('WPSEO_VERSION')) {
		wp_title('');
	} else {
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
		echo ' | ' . sprintf( __( 'Page %s', 'skeleton' ), max( $paged, $page ) );
	}
	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <style type="text/css">
    	.tp-caption.small_text { background:url('<?php echo get_stylesheet_directory_uri();?>/images/white_transparent.png'); border:3px solid #ccc;}
    </style>
<![endif]-->

<!-- Add CSS3 Rules here for IE 7-9
================================================== -->

<!--[if IE]>
<style type="text/css">
html.ie #navigation,
html.ie a.button,
html.ie .cta,
html.ie .wp-caption,
html.ie #breadcrumbs,
html.ie a.more-link,
html.ie .gallery .gallery-item img,
html.ie .gallery .gallery-item img.thumbnail,
html.ie .widget-container,
html.ie #author-info {behavior: url("<?php echo get_stylesheet_directory_uri();?>/PIE.php");position: relative;}</style>
<![endif]-->


<!-- Mobile Specific Metas
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

<!-- Favicons
================================================== -->

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.ico?v=2.2" />
<link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.ico?v=2.2" />

<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon.png?v=2.1">

<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-72x72.png?v=2.1" />

<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon-114x114.png?v=2.1" />

<link rel="pingback" href="<?php echo get_option('siteurl') .'/xmlrpc.php';?>" />

<?php if (of_get_option('dev_mode') == '1') { ?>
<link rel="stylesheet" id="custom" href="<?php echo home_url() .'/?get_styles=css';?>" type="text/css" media="all" />
<?php } ?>


<?php
	/* 
	 * enqueue threaded comments support.
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	// Load head elements
	wp_head();
	
	// add custom background image if selected
	if( get_field( 'post_background_image' ) ) :
		$post_bg = ' style="background: url( \'' . get_field( 'post_background_image' ) . '\' ) no-repeat center center fixed; background-size: cover;"';
	endif;
?>

</head>
<body <?php body_class(); ?> <?php echo $post_bg; ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="header">
	<div id="header-wrap" class="container">
	    <div id="header_image" class=""><a href="<?php echo get_bloginfo( "url" ); ?>"><img class="scale-with-grid round" src="<?php echo get_template_directory_uri(); ?>/images/harrys-logo.png" alt="" /></a></div>
	    <div class="header-social clearfix">
		<ul class="social-icons">
			<li class="social-item"><a class="social-thmb social-fb img-replace" href="https://www.facebook.com/HarrysFreshFood" target="_blank">Facebook</a></li>
			<li class="social-item"><a class="social-thmb social-twtr img-replace" href="https://twitter.com/HarrysFreshFood" target="_blank">Twitter</a></li>
		</ul>
		<div class="fb-like" data-href="https://www.facebook.com/HarrysFreshFood" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
	    </div>
<?php /*?>    <form role="search" method="get" style="right:0;position:absolute;z-index:100;display:inline" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:" /><input type="submit" class="search-submit" value="Search" />
</form><?php */?>
	    <?php st_navbar(); ?>
	</div>
	<a class="mobile-menu-toggle" href="javascript:void(0);">Menu</a>
	<div class="sub-menu-bgbar">Menu</div>
  </div>
  <div id="wrap" class="container first-wrap">
		
