<?php
/*
@package: wwd blankslate
*/
get_header();
?>
<main id="main" class="site-main" role="main">
<?php
    if (have_posts()):
        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
        while(have_posts()): the_post();

                $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
                var_dump($template);
                get_template_part('template-parts/content', $template);

        endwhile;
    endif;
?>
</main>

<?php get_footer(); ?>