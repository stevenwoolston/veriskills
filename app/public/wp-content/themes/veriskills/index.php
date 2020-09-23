<?php
get_header();
?>

<main id="main" class="site-main" role="main">
<?php
    if (is_front_page()):
        get_template_part('template-parts/content-home-hero-overlay');
        get_template_part('template-parts/content-home');
    else:
        //  not frontpage
        if (have_posts()):
            while(have_posts()): the_post();
                $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
                // var_dump($template);
                get_template_part('template-parts/content', $template);
            endwhile;
        endif;
    endif;  //  frontpage

    if (is_active_sidebar( 'global-sidebar' )):
        get_sidebar();
    endif;  
?>
</main>

<?php get_footer(); ?>