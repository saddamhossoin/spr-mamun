<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		<div id="main_footer">
    	<div id="main_footer_inner">
        	<div id="main_footer1">
            	<div id="footer1">
                	<div id="footer1_left">
                    	<span class="list2">
                        	<ul>
                            	<?php wp_nav_menu( array( 'theme_location' => 'navigation_bottom', 'menu_class' => 'navigation_bottom' ) ); ?>
                            </ul>
                        </span>
                        
                        <?php dynamic_sidebar( 'sidebar-21' ); ?>
                           <span class="privacy"><?php dynamic_sidebar( 'sidebar-18' ); ?></span><br />
<span><?php dynamic_sidebar( 'sidebar-19' ); ?></span><br />
<span><a href="#main_header"><img src="<?php bloginfo ('template_url'); ?>/images/backtotop.png" align="absmiddle" /></a></span><span class="back"><i>BACK TO TOP</i></span>
                    </div>
                    
                    <div id="footer1_right">
                    	<div id="hanging_up">
                        	<img src="<?php bloginfo ('template_url'); ?>/images/hanging_up.png" />
                        </div>
                        <div id="hanging_middle">
                        	<?php dynamic_sidebar( 'sidebar-20' ); ?>
                        </div>
                        <div id="hanging_down">
                        	<img src="<?php bloginfo ('template_url'); ?>/images/hanging_down.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>

	<?php wp_footer(); ?>
