<?php
/*
@package: wwd blankslate
*/
?>

<section id="page-<?php the_ID(); ?>" 
	<?php post_class(array('wwd-content-page', 'container-fluid', $post->post_name)); ?>>
	
	<article class="container">

		<div class="entry-header d-none">
			<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		</div>	

		<div class="entry-body">
			<?php the_content(); ?>
		</div>

		<div class="entry-footer"></div>

	</article>

</section>