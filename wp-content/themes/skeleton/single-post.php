<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage skeleton
 * @since skeleton 0.1
 */

get_header();
st_before_content($columns='');

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class('single page'); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-content">
            <?php
            // class used by either media type            
            $featured_class = "featured-media";

            if ( get_field( "featured_video_url" ) ) :
                    $yt_video_id = get_youtube_id( get_the_id() );
                    $video = '<div class="featured">';
                    $video .= '<div class="video-container">';
                    $video .= '<iframe class="' . $featured_class . '" width="768" height="432" src="//www.youtube.com/embed/' . $yt_video_id . '?rel=0" frameborder="0" allowfullscreen></iframe>';
                    $video .= '</div><!-- /.video-container -->';
                    $video .= '</div><!-- /.featured -->';
                    echo $video;
            elseif ( has_post_thumbnail() ) :
                    echo '<div class="featured">';
                    $attrs = array( 'class' => $main_class );
                    echo the_post_thumbnail( "full", $attrs );
                    echo '</div><!-- /.featured -->';
            endif;
            
            the_content();
            ?>  
        </div><!-- .entry-content -->
<?php
endwhile;

get_footer();
?>