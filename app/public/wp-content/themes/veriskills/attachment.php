<?php
/*
@package: wwd blankslate
**	Attachment template
*/

get_header();
$attachment = wp_get_attachment_image_src(get_the_ID(), 'full')[0];
// var_dump($attachment);
?>

<section <?php post_class( array('wwd-content-page', 'container-fluid') ); ?>>
	
	<div class="page-hero-header text-center">
		Together ... Making a Memory
	</div>	

	<article id="page-<?php the_ID(); ?>" class="container">

		<div class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		</div>	

		<div class="entry-body text-center">
			<a href="<?php echo $attachment; ?>" target="_blank">
            <?php
                $image_size = apply_filters( 'wporg_attachment_size', 'medium_large' ); 
                echo wp_get_attachment_image( get_the_ID(), $image_size ); 
            ?>
			</a>
		</div>

		<div class="entry-footer"></div>

	</article>

</section>

<?php get_footer(); ?>