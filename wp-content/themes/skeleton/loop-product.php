<?php
/**
 * The loop that displays a single product.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php $post_thumbnail_id = get_post_thumbnail_id();
$backgroundImage = wp_get_attachment_url( $post_thumbnail_id ); ?>
<style>
body {	
	background: url('<?php echo $backgroundImage; ?>') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $backgroundImage; ?>', sizingMethod='scale');
-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo $backgroundImage; ?>', sizingMethod='scale')";
}

.tab-copy {
	font-size:.75em;
	color:#2e1b12;
	font-weight:600;
	line-height:140%;
	max-width:160px;
	
	margin-top:30px;
	margin-right:20px;
}

.files-row {
	padding-bottom:10px;
	border-bottom:1px dashed #496d27;
	overflow:hidden;
}

.files-row:last-child {
	border-bottom:none;
}

.file-item p {
  text-transform:lowercase;	
  
}

.file-item {
   margin-top:15px;
}

.file-title {
  text-transform:none;
  font-weight:600;
}

/* strong selector breaking footer headers - 8/13/14 - gfh
.file-item p, strong {
*/
.file-item p {
   font-size: .6em;
   line-height: 1.4em;
}

.tab-text {
	color:#496d27;
	text-align:center;
	margin-bottom:15px;
	margin-top:15px;
	font-weight:normal;
        font-style:italic;
}

.single-harrys-products .entry-title {
	width:500px;
	top:80px;
}

/* not sure why here, breaking layout - 8/13/2014 -  gfh
.three.columns {
  width:180px;
}
*/
</style>

				<div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
					

					<div class="entry-content">
                    <div class="breadcrumbs">
						<?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                    </div> 
                   
                    <div class="entry-title">
                    	<div class="entry-title-first-line"><?php the_field('first_line'); ?></div>
                    	<div class="entry-title-second-line"><?php the_field('second_line'); ?></div>
                    </div>

<div class="entry-text">
							<?php the_content(); ?>
                        <?php if (has_term('vegetarian','products-specialty')) : ?>
                        <a href="<?php echo esc_attr(get_term_link('vegetarian', 'products-specialty') ) ?>"><img src="../../wp-content/themes/skeleton/images/hff/V.png" width="32" height="32" title="Vegetarian" class="tooltip"alt="Vegetarian" /></a> 
                        <?php endif; ?>
                        <?php if (has_term('vegan','products-specialty')) : ?>
                        <a href="<?php echo esc_attr(get_term_link('vegan', 'products-specialty') ) ?>"><img src="../../wp-content/themes/skeleton/images/hff/VG.png" width="32" height="32" title="Vegan" class="tooltip" alt="Vegan" /></a> 
                        <?php endif; ?>
                        <?php if (has_term('gluten-free','products-specialty')) : ?>
                        <a href="<?php echo esc_attr(get_term_link('gluten-free', 'products-specialty') ) ?>"><img src="../../wp-content/themes/skeleton/images/hff/GF.png" width="32" height="32" title="Gluten-free" class="tooltip" alt="Gluten-free" /></a> 
                        <?php endif; ?>
                        <?php if (has_term('organic','products-specialty')) : ?>
                        <a href="<?php echo esc_attr(get_term_link('organic', 'products-specialty') ) ?>"><img src="../../wp-content/themes/skeleton/images/hff/O.png" width="32" height="32" title="Organic" class="tooltip" alt="Organic" /></a> 
                        <?php endif; ?>
                   </div>
 
 
 
                   </div> <!--end wrap? -->
                   
                   				</div><!-- #post-## -->
</div> <!-- end wrap -->
</div>
<div class=".entry-content container"><ul class="tabs">
                            <?php if( get_field('food_service_files') ) : ?>
                            		<li class="one-third column"><a href="#t1">Food Service</a></li>
                            <?php endif; ?>
                            <?php if( get_field('retail_files') ) : ?>
                            		<li class="one-third column"><a href="#t2">Retail</a></li>
                            <?php endif; ?>
                            <?php if( get_field('additional_info') ) : ?>
                            		<li class="one-third column"><a href="#t4">Recipe Ideas</a></li>
                            <?php endif; ?>
                        </ul></div>
                   <div id="tabs-wrap">
                   <div class="container">

                        
                        <div class=".entry-content">
							<ul class="tabs-content">
                             <?php if( get_field('food_service_files') ) : ?>
                            <li id="t1Tab">

					<span class="three columns tab-copy">
                                    		<?php the_content(); ?>
                                       		<span class="tab-text">
                                    			Adding more variety to your menu is easy with Harry's fresh, artisan-inspired dishes.
							<br />
							Don't see the pack size you want? Check out information about our custom order capabilities <a href="/co-pack/">here</a>.
                                 		</span>
                                    	</span>
                                    <div class="files-row"><?php 
									echo '<div class="files-row">';
									$rows = get_field('food_service_files');
									if($rows)
									{
										//echo '<span class="thirteen columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] == "Ready to Serve")
											{
												$attachment_id = $row['food_service_file'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['food_service_file_thumbnail'])
												{
													$food_service_file_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['food_service_file_thumbnail']) . '" height="70" width="70" />';
												}
												else
													$food_service_file_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $food_service_file_thumb . '</a><br /><p><span class="file-title">' . $row['food_service_file_title'].'</span><br />'. $row['package_quantity'] .'<br />'.$row['product_type'].'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										//echo '</span>';
									}
									
									//now get food service soup cards
									$rows = get_field('food_service_soup_cards');
									if($rows)
									{
										//echo '<span class="five columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] == "Ready to Serve")
											{
												$attachment_id = $row['soup_card'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
												
												if ($row['thumbnail'])
												{
													$food_service_soup_card_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['thumbnail']) . '" height="70" width="70" />';
												}
												else
													$food_service_soup_card_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $food_service_soup_card_thumb . '</a><br /><p><span class="file-title">' . $row['title'].'</span><br />'. $row['product_type'] .'<br />'. $row['file_type'] .'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										
									}
									echo '</div>'; //end files-row, ready to serve
									?>

 <?php 
									echo '<div class="files-row">';
									$rows = get_field('food_service_files');
									if($rows)
									{
										//echo '<span class="thirteen columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] != "Ready to Serve")
											{
												$attachment_id = $row['food_service_file'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['food_service_file_thumbnail'])
												{
													$food_service_file_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['food_service_file_thumbnail']) . '" height="70" width="70" />';
												}
												else
													$food_service_file_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $food_service_file_thumb . '</a><br /><p><span class="file-title">' . $row['food_service_file_title'].'</span><br />'. $row['package_quantity'] .'<br />'.$row['product_type'].'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 		
										//echo '</span>';
									}
									
									//now get food service soup cards
									$rows = get_field('food_service_soup_cards');
									if($rows)
									{
										//echo '<span class="five columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] != "Ready to Serve")
											{
												$attachment_id = $row['soup_card'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['thumbnail'])
												{
													$food_service_soup_card_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['thumbnail']) . '" height="70" width="70" />';
												}
												else
													$food_service_soup_card_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $food_service_soup_card_thumb . '</a><br /><p><span class="file-title">' . $row['title'].'</span><br />'. $row['product_type'] .'<br />'. $row['file_type'] .'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										
									}
									echo '</div>'; //end files-row, concentrate
									?></div> <?php //end files-row to keep everything right ?>
                                    
                                    
                            </li>
                           <?php endif; ?>
								 <?php if( get_field('retail_files') ) : ?>
                            <li id="t2Tab">

					<span class="three columns tab-copy">
                                    		<?php the_content(); ?>
                                       		<span class="tab-text">
                                    			Adding more variety to your menu is easy with Harry's fresh, artisan-inspired dishes.
							<br />
							Don't see the pack size you want? Check out information about our custom order capabilities <a href="/co-pack/">here</a>.
                                 		</span>
                                    	</span>
                                   <div class="files-row"> <?php 
									echo '<div class="files-row">';
									$rows = get_field('retail_files');
									if($rows)
									{
										//echo '<span class="thirteen columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] == "Ready to Serve")
											{
												$attachment_id = $row['retail_file'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['retail_file_thumbnail'])
												{
													$retail_file_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['retail_file_thumbnail']) . '" height="70" width="70" />';
												}
												else
													$retail_file_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $retail_file_thumb . '</a><br /><p><span class="file-title">' . $row['retail_file_title'].'</span><br />'. $row['package_quantity'] .'<br />'.$row['product_type'].'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										//echo '</span>';
									}
									
									//now get retail soup cards
									$rows = get_field('retail_soup_cards');
									if($rows)
									{
										//echo '<span class="five columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] == "Ready to Serve")
											{
												$attachment_id = $row['soup_card'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
												
												if ($row['thumbnail'])
												{
													$retail_soup_card_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['thumbnail']) . '" height="70" width="70" />';
												}
												else
													$retail_soup_card_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $retail_soup_card_thumb . '</a><br /><p><span class="file-title">' . $row['title'].'</span><br />'. $row['product_type'] .'<br />'. $row['file_type'] .'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										
									}
									echo '</div>'; //end files-row, ready to serve
									?>

 <?php 
									echo '<div class="files-row">';
									$rows = get_field('retail_files');
									if($rows)
									{
										//echo '<span class="thirteen columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] != "Ready to Serve")
											{
												$attachment_id = $row['retail_file'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['retail_file_thumbnail'])
												{
													$retail_file_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['retail_file_thumbnail']) . '" height="70" width="70" />';
												}
												else
													$retail_file_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $retail_file_thumb . '</a><br /><p><span class="file-title">' . $row['retail_file_title'].'</span><br />'. $row['package_quantity'] .'<br />'.$row['product_type'].'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 		
										//echo '</span>';
									}
									
									//now get food service soup cards
									$rows = get_field('retail_soup_cards');
									if($rows)
									{
										//echo '<span class="five columns">';
										foreach($rows as $row)
										{
											if ($row['product_type'] != "Ready to Serve")
											{
												$attachment_id = $row['soup_card'];
												$url = wp_get_attachment_url( $attachment_id );
												$title = get_the_title( $attachment_id );
												$attachment_description = get_post( $attachment_id );
											
												if ($row['thumbnail'])
												{
													$retail_soup_card_thumb = '<img class="file-icon" src="' . wp_get_attachment_thumb_url($row['thumbnail']) . '" height="70" width="70" />';
												}
												else
													$retail_soup_card_thumb = '<img class="file-icon" src="../../wp-content/themes/skeleton/images/hff/file_icon.png" width="50" height="50" />';
											
												echo '<span class="file-item three columns"><a href="' . $url . '" target="_blank">' . $retail_soup_card_thumb . '</a><br /><p><span class="file-title">' . $row['title'].'</span><br />'. $row['product_type'] .'<br />'. $row['file_type'] .'<br /><em><a href="' . $url . '" target="_blank">'. $row['link_text'].'</a></em> </p></span>';
											}
										}
									 
										
									}
									echo '</div>'; //end files-row, concentrate
									?></div> <?php //end files-row to keep everything right ?>
                                    
                                    
                            </li>
                           <?php endif; ?>
                            
                            <?php if( get_field('recipes') ) : ?>
                            <li id="t4Tab">
                            		<?php 
									 echo get_field('recipes');
									?></li>
                             <?php endif; ?>
                        </ul>
                        </div><!-- .entry-content -->
                  </div><!--end .container-->
                  </div><!-- end tabs-wrap-->

					

<?php endwhile; // end of the loop. ?>