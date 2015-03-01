<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php bloginfo ('template_url'); ?>/style.css" rel="stylesheet" />
<title>Smart Phone</title>
</head>

<body>
	<div id="wrapper">
    	<div id="main_header">
        	<div id="main_header1">
        	<div id="header">
               <?php
					  $args = array (
						  'post_type'              => 'logo',    
						  'order'                  => 'ASC',
						  'posts_per_page'         => '1',
					  );
					  
					  // The Query
					  $query = new WP_Query( $args );
					  
					  // The Loop
					  if ( $query->have_posts() ) {
						  while ( $query->have_posts() ) {
							  $query->the_post();
				?>
            		<div id="header_left">
                    	<a href="<?php bloginfo('url'); ?>"><?php echo the_post_thumbnail(); ?></a>
                    </div>
				<?php } } ?>
                    <div id="header_right">
                    	<div id="header_right_top">
                        	<span class="phone"><a href="#"><img src="<?php bloginfo ('template_url'); ?>/images/phone.png" /></a></span>
                        </div>
                        <div id="header_right_bottom" class="list">
                        	<ul>
                            	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                          </ul>
                        </div>
                    </div>
            
            </div><div style="clear:both;"></div>
     
            </div>
            <div id="main_header2">
            <div id="main_header2_inner">
            	<div id="header2">
                	<div id="phone">
                    	<div id="phone_inner">
                        	<span class="number"><?php dynamic_sidebar( 'sidebar-4' ); ?></span><span class="check"><?php dynamic_sidebar( 'sidebar-5' ); ?></span>
                        </div><div style="clear:both;"></div>
                    </div>
                    <div id="banner">
                    	
                        <div id="banner_inner">
                        	<?php dynamic_sidebar( 'sidebar-6' ); ?>
                        </div>
                       <div style="clear:both;"></div>
                    </div>
                   
                </div><div style="clear:both;"></div>
                </div>
            </div>
    </div>