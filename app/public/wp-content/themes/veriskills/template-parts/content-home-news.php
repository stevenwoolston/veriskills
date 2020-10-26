<?php
/*
@package: wwd blankslate
*/
?>

<section class="home-news-container d-flex py-0">
<?php
	wp_reset_query();
	query_posts(array( 
		'post_type' => 'post', 
		'posts_per_page' => 3,
        'orderby' => 'posted_date',
        'order' => 'DESC',
        'post_status' => 'publish',    
        )
	);

	if (have_posts()):  ?>
        <h3>Latest News</h3>
        <div class="home-news-roll">
<?php
		while(have_posts()): the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            get_template_part('template-parts/content', $template);
        endwhile;
?>
        </div>
        <div class="show-more text-right">
            <a href="/news/" class="btn">More</a>
        </div>
<?php
	endif;
	wp_reset_query();
?>	
</section>