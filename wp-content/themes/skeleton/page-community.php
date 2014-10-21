<?php
/**
Template Name: Community Involvement
*/

get_header();

$featured_class = "featured-media";

?>

<div class="fourteen columns offset-by-one">
	<div id="post-<?php the_ID(); ?>" <?php post_class( "clearfix" ); ?>>
		<h1 class="page-title"><?php the_title() ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>

				<?php
				$args = array(
					'post_type' => 'post',
					'cat' => 32,
					'orderby' => 'date',
					'order' => 'DSC',
					'posts_per_page' => -1
				);
			
				$the_query = new WP_Query( $args );
				
				if ($the_query->have_posts()) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<div class="entry entry-community">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php
					if ( get_field( "featured_video_url" ) ) :
						$yt_video_id = get_youtube_id( get_the_id() );
						$video = '<div class="video-container">';
						$video .= '<iframe class="' . $featured_class . '" width="734" height="413" src="//www.youtube.com/embed/' . $yt_video_id . '?rel=0" frameborder="0" allowfullscreen></iframe>';
						$video .= '</div><!-- /.video-container -->';
						echo $video;
					elseif ( has_post_thumbnail() ) :	
						$attrs = array( 'class' => $featured_class );
						echo the_post_thumbnail( "full", $attrs );
					endif;
					?>
					<div class="entry-article">
						<?php the_content(); ?>
					</div><!-- /.entry-article -->
				</div><!-- /.entry -->
				<?php
					endwhile;
	
				endif;
				?>
		</div><!-- /.entry-content -->
	</div><!-- /#page -->	
</div><!-- /.fourteen.columns.offset-by-one -->

<?php

get_footer();

?>