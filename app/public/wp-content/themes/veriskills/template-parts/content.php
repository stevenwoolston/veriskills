<?php
/*
@package: wwd blankslate
*/
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>

	<article id="page-<?php the_ID(); ?>" 
		<?php post_class(array($post->post_name)); ?>>

		<div class="entry-body">
            <img src="<?php echo $featured_image; ?>" alt="">
            <h4><?php the_title(); ?></h4>
            <div class="post-meta"><?php echo date("M d, Y", strtotime($post->post_date)); ?></div>
			<?php the_excerpt(); ?>
		</div>

	</article>
