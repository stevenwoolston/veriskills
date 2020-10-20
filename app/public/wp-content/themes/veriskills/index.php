<?php
get_header();
?>

<main id="main" class="site-main" role="main">
<?php
    if (have_posts()):
        while(have_posts()): the_post();

            if (is_front_page()):
                get_template_part('template-parts/content-home-hero-overlay');
                get_template_part('template-parts/content', 'home');
            else:
                $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
                var_dump($template);
                get_template_part('template-parts/content', $template);
            endif;

        endwhile;
    endif;
?>
</main>

<?php get_footer(); ?>