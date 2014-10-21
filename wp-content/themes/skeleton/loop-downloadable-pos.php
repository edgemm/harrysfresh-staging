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
.page-id-43 .entry-content {
	padding:0;
	padding-top:20px;
}

h1.page-title {
	margin-top:20px;
}

#post-43 {
	padding:0;
}

#post-43 .entry-content > p {
	padding-left:30px;
	padding-right:30px;
}

.recipe-container {
	max-width:814px;
}

.recipe-category {
	padding-left:20px;
}

.recipe-category h2 {
	font-weight:bold;
}

.recipe {
	background:rgba(255,255,255,.75);
	overflow:auto;
	margin-bottom:10px;
	padding:20px;
	
	color:#561100;
	font-size:.9em;
	
	-moz-box-shadow: 3px 0px 5px 1px rgba(0,0,0,.38);
	-webkit-box-shadow: 3px 3px 5px 1px rgba(0,0,0,.38);
	box-shadow: 3px 3px 5px 1px rgba(0,0,0,.38);
}
.recipe .four p {
	color:#a82200;
	font-weight:bold;
	margin-bottom:5px;
}

.recipe .eight {
	padding-top:50px;
}

.recipe a {
	color:#ff671b;
}
/*#rc-buttons a:before {
	background: none;
}
#rc-buttons a:hover:before {
	content: "";
	display: block;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	max-width:156px;
	background: rgba(0,0,0, 0.2);
	-moz-transition: background .1s linear;
	-webkit-transition: background .1s linear;
	-o-transition: background .1s linear;
	transition: background .1s linear;
}*/

</style>

<div class="fourteen columns offset-by-one">
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
                     
						

					<div class="entry-content">
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
                                            <p>'. $row['title'].'</p>
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