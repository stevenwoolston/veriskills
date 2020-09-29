<?php
/*
@package: wwd blankslate
*/
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>

<section id="page-<?php the_ID(); ?>" 
	<?php post_class(array('wwd-content-page', $post->post_name)); ?>>

    <div class="entry-header skew-bottom"
        style="background-image: url(<?php echo $featured_image; ?>);
            background-size: cover; background-position: center center;">
        <?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
    </div>	

    <div class="entry-body">
        <?php the_content(); ?>
    </div>

    <div class="entry-footer"></div>
</section>