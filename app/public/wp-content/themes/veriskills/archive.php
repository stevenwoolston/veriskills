<?php
/*
@package: wwd blankslate
**	Post archive
*/
?>

<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
<?php
    if (have_posts()):
        while(have_posts()): the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            get_template_part('template-parts/content', $template);
        endwhile;
    endif;
?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>