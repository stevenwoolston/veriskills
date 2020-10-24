<?php
/*
Template Name: Single Post
@package: wwd blankslate
*/
get_header();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>
<main id="main" class="site-main" role="main">
    <section id="page-<?php the_ID(); ?>" 
        <?php post_class(array('wwd-content-page', $post->post_name)); ?>>

        <div class="entry-header skew-bottom"
            style="background-image: url(<?php echo $featured_image; ?>);
                background-size: cover; background-position: center center;">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>	

        <div class="entry-body mx-auto skew-bottom-spacing">
<?php
    if (have_posts()):
        while(have_posts()): the_post();
?>
        	<article id="page-<?php the_ID(); ?>" 
		<?php post_class(array($post->post_name)); ?>>
                <div class="post-meta"><?php echo date("F d, Y", strtotime($post->post_date)); ?></div>
                <div class="article-excerpt">
                    <?php the_content(); ?>
                </div>
        	</article>
<?php
        endwhile;
    endif;
?>
        </div>
    </section>
</main>

<?php get_footer(); ?>