<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
 
  $backgroundImage = get_bloginfo('template_directory').'/images/resource-center-background.jpg'; ?>
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

.recipe .four img {
 border:1px solid #ccc;	
}

</style>

<div class="fourteen columns offset-by-one page-fullWidth">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="breadcrumbs">
						<?php if ( !get_post_custom_values('custom_title_above') ) {
							if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }
						}?>
                    </div> 
				
                        <h1 class="page-title"><?php the_title() ?></h1>
                     
						

					<div class="entry-content center-children">
						<?php the_content(); ?>
						
                            <div class="container recipe-container">
                                <?php 
									$rows = get_field('marketing_materials');
									if($rows)
									{
										foreach($rows as $row)
										{
												echo '<div class="recipe">
                                    <div class="four columns">
                                            <p class="recipe-title">'. $row['title'].'</p>
                                        <img src="'. $row['thumbnail'].'" />
                                    </div>
                                    <div class="eight columns">';
                                        if( $row['description'] ) echo '<p><strong>Description:</strong> '. $row['description'].'</p>';
                       			if( $row['size'] ) echo '<p><strong>Size:</strong> '. $row['size'].'</p>';
                                        echo '<p><strong>Format:</strong> '. $row['format'].'</p>';
                                        if( $row['file_url'] ) {
						$url = $row['file_url'];
					} else {
						$url = $row['file'];
                                        }
                                        echo '<p><a href="'. $url .'" target="_blank">'. $row['link_text'].'</a></p>
                                    </div>
                                </div>';
											}
										}
										?>
                            </div>
                   
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>

</div><!--end columns-->