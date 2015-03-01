<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main_contentarea">
    	<div id="contentarea">
        	 <div id="banner_bottom">
                    	<img src="<?php bloginfo ('template_url'); ?>/images/banner_bg.png" />
                    </div>
                    <div id="contentarea1">
                    	<span class="most"><?php dynamic_sidebar( 'sidebar-7' ); ?></span>
                        <div id="option1">
                        	<div id="opt1">
                            	<div id="opt_left">
                                	<?php dynamic_sidebar( 'sidebar-8' ); ?>
                                </div>
                                <div id="opt_right">
                                <?php dynamic_sidebar( 'sidebar-9' ); ?>
                                </div>
                            </div>
                            <div id="opt2">
                            <div id="opt_left">
                                	<?php dynamic_sidebar( 'sidebar-10' ); ?>
                                </div>
                                <div id="opt_right">
                                <?php dynamic_sidebar( 'sidebar-11' ); ?>
                                </div>
                            </div>
                            <div id="opt3">
                            <div id="opt_left">
                                	<?php dynamic_sidebar( 'sidebar-12' ); ?>
                                </div>
                                <div id="opt_right">
                                <?php dynamic_sidebar( 'sidebar-13' ); ?>
                                </div>
                            </div>
                        </div><div style="clear:both;"></div>
                    </div>
                    <div id="contentarea2">
                    	<div id="contentarea2_left">
                        	<?php dynamic_sidebar( 'sidebar-14' ); ?>
                            <span class="most1">
                            	<?php dynamic_sidebar( 'sidebar-15' ); ?>
                                        
							   <?php
									  $args = array (
										  'post_type'              => 'homemobilesale',    
										  'order'                  => 'ASC',
										  'posts_per_page'         => '2',
									  );
									  
									  // The Query
									  $query = new WP_Query( $args );
									  
									  // The Loop
									  if ( $query->have_posts() ) {
										  while ( $query->have_posts() ) {
											  $query->the_post();

								  ?>
                                       <span class="ion">
                                    	<span class="ion_left"><?php echo the_post_thumbnail(); ?></span>
                                        <span class="ion_right"><?php echo $query->post->post_content;?>
                                    </span>
                                    <?php } } ?>
                              </span>
                              </span>
                            <span class="most2">
                            		<span class="learn11"><?php dynamic_sidebar( 'sidebar-16' ); ?></span>
                                   
                                   <?php
									  $args = array (
										  'post_type'              => 'profile',    
										  'order'                  => 'ASC',
										  'posts_per_page'         => '4',
									  );
									  
									  // The Query
									  $query = new WP_Query( $args );
									  
									  // The Loop
									  if ( $query->have_posts() ) {
										  while ( $query->have_posts() ) {
											  $query->the_post();

								  ?>
                                   <span class="profile">
                                    	<span class="profile_left"><?php echo the_post_thumbnail(); ?></span>
                                        <span class="profile_right">
                                        	<span class="for"><?php echo $query->post->post_content;?></span><br />
<span class="lorem"><?php echo $query->post->post_title;?></span>
                                        </span>
                                    </span>
                                    <?php } } ?>
                                    
                            
                                    
                            </span>
                             <?php
									  $args = array (
										  'post_type'              => 'customersrate',    
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
                            <span class="excellent">
                            	<span class="star"><?php echo the_post_thumbnail(); ?></span>
                                <span class="customers"><?php echo $query->post->post_title;?></span>
                                 <span class="customers"><?php echo $query->post->post_content;?></span>
                            </span>
                            <?php } } ?>
                         
                        </div>
                        <div id="contentarea2_right">
                        	<?php dynamic_sidebar( 'sidebar-17' ); ?>
                      </div>
                    </div>
        </div>
    </div>
<?php
//get_sidebar();
get_footer();
