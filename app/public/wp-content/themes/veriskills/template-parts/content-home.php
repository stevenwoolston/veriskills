<?php
/*
@package: wwd blankslate
*/
?>

<section <?php post_class( array('wwd-content-page') ); ?>>SBW

	<article id="page-<?php the_ID(); ?>" 
		<?php post_class(array($post->post_name)); ?>>

		<div class="entry-body">
			<?php the_content(); ?>
		</div>

	</article>

</section>