<?php
/*
@package: wwd blankslate
*/
?>

<section class="home-service-hero-container d-flex skew-bottom">
<?php
	wp_reset_query();
	query_posts(array( 
		'post_type' => 'layout', 
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' => 'menu_order',
		'order' => 'ASC')
	);

	if (have_posts()):
		while(have_posts()): the_post();
?>
	<article id="hero-<?php the_ID(); ?>" 
		<?php post_class(array($post->post_name)); ?>>
			<div>
				<?php the_content(); ?>
			</div>
		</article>
<?php
		endwhile;
	endif;
	wp_reset_query();
?>	
</section>