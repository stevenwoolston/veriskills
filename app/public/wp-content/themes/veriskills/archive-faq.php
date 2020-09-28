<?php
/*
@package: wwd blankslate
**	Post archive
*/
?>
<?php
get_header();
?>

<main id="main" class="site-main" role="main">
<?php
    $header = get_terms('faq_category', array(
        'hide_empty' => false,
        'childless' => true
    ));
    $header_name = $header[0]->name;
    $featured_image = get_field('featured_image', $header[0])['url'];
?>
    <section id="page-<?php the_ID(); ?>" 
	<?php post_class(array('wwd-content-page', $post->post_name)); ?>>

		<div class="entry-header skew-bottom"
            style="background-image: url(<?php echo $featured_image; ?>);
                background-size: cover; background-position: center center;">
			<h1 class="entry-title"><?php echo $header_name; ?></h1>
        </div>	
        
        <div class="entry-body skew-bottom-spacing w-75 mb-5 mx-auto">
<?php
    if (have_posts()):
?>
            <div class="accordion" id="faq_accordion">
<?php
        while(have_posts()): the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            get_template_part('template-parts/content', $template);
        endwhile;
?>
           </div>
<?php
    endif;
?>
        </div>
    </section>
</main>
<?php get_footer(); ?>