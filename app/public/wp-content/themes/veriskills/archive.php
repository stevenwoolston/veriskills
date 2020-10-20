<?php
/*
Template Name: Archives
@package: wwd blankslate
*/
get_header();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>
<main id="main" class="site-main" role="main">
<?php
    $header = get_terms('category', array(
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

        <div class="entry-body mx-auto skew-bottom-spacing">
            <div class="article-roll">
<?php
    if (have_posts()):
        while(have_posts()): the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            // var_dump('template is ' .$template);
            get_template_part('template-parts/content', $template);
        endwhile;
    endif;
?>
            </div>
            <div class="sidebar">
                <div class="sidebar-form">
                    <h3 class="text-center mb-3">Subscribe to our latest updates</h3>
                    <form action="#">
                        <input type="text" class="mt-2" placeholder="Email">
                        <button class="btn btn-success btn-block mt-2">Subscribe</button>
                    </form>
                    <div class="social text-center mt-5">
                        <?php echo do_shortcode('[social_links]');   ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>