<?php
/*
@package: wwd blankslate
*/
?>

<section class="home-service-hero-container d-flex">
<?php
	wp_reset_query();
	query_posts(array( 
		'post_type' => 'home-service-hero', 
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
			<div>
				<footer class="text-center">
					<p>For more detailed information <a href="/funeral-planning">click here</a>.</p>
					<a class="btn btn-block" href="/contact-us">Contact Us</a>
					<p class="mt-2">
						<i class="las la-phone"></i>
						Support and general enquiries - <a href="tel:1800355830">1800 355 830</a><br />
						24 hours
					</p>
				</footer>
			</div>
		</article>
<?php
		endwhile;
	endif;
	wp_reset_query();
?>	
</section>