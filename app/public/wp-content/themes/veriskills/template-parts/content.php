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
            <a href="<?php echo the_permalink(); ?>"><?php the_title('<h4>', '</h4>'); ?></a>
            <div class="post-meta"><?php echo date("F d, Y", strtotime($post->post_date)); ?></div>
            <div class="article-excerpt">
    			<?php the_excerpt(); ?>
            </div>
		</div>

	</article>
