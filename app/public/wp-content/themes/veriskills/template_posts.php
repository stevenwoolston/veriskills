<?php
/*
Template Name: Searchable News
@package: wwd blankslate
*/
get_header();
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false,
    'childless' => true
));
$all_posts = new WP_query(array(
    'post_type' => 'post',
    'orderby' => 'posted_date',
    'order' => 'ASC',
    'post_status' => 'publish',
    'posts_per_page' => -1
));
$months = array();
if ($all_posts->have_posts()): while($all_posts->have_posts()): $all_posts->the_post();
    $post_date = date("Y F", strtotime($post->post_date));
    if (!in_array($post_date, $months)) {
        $months[] = $post_date;
    }
endwhile; endif;
// var_dump(array_unique($months));
//var_dump(date("Y-M-d", strtotime($months[0])));
wp_reset_postdata();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
?>
<main id="main" class="site-main" role="main">
    <section id="page-<?php the_ID(); ?>" 
        <?php post_class(array('wwd-content-page', $post->post_name)); ?>>
<?php
    //  main page loop
    if (have_posts()): while(have_posts()): the_post();
?>
        <div class="entry-header skew-bottom"
            style="background-image: url(<?php echo $featured_image; ?>); background-size: cover; background-position: center center;">
            <h1 class="entry-title"><?php the_title(); ?></h1>
<?php
    endwhile; endif;
?>
        </div>

        <div class="mx-auto archive-search-filters-container">
            <form method="get" class="archive-search-filters">
                <div class="blog-filters">
                    <h4 class="fg-white m-0 text-right">Refine</h4>
                    <div class="filter-item">
                        <select class="form-control" name="category" id="filter-category">
                            <option value="">Category</option>
<?php
    foreach($categories as $category):
        echo '<option ' .selected($_GET['category'], $category->slug). ' value="' .$category->slug. '">' .$category->name. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                    <div class="filter-item">
                        <select class="form-control" name="month" id="filter-category">
                            <option value="">Date</option>
<?php
    foreach(array_unique($months) as $month):
        echo '<option value="' .$month. '">' .$month. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                </div>
            </form>
        </div>	

        <div class="blog-roll entry-body">
<?php
$meta_query = [];
if (isset($_GET['category'])) {
    $meta_query[] = array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $_GET['category']
    );
}

$args = array(
    'orderby' => 'posted_date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'tax_query' => array($meta_query),
    'posts_per_page' => 6
);

$query = new WP_query($args);

    if ($query->have_posts()):
        while($query->have_posts()): $query->the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            get_template_part('template-parts/content', $template);
        endwhile;
?>
        </div>
        <div class="pagination-controls">
<?php
        echo paginate_links(array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i class="las la-arrow-circle-left"></i> %1$s', __( '', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i class="las la-arrow-circle-right"></i>', __( '', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ));
    else:
        get_template_part('template-parts/content-no-records');
    endif;
?>
        </div>
<?php
    wp_reset_postdata();
?>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(function() {
        $(".filter-item select").change(function(e) {
            $("form.archive-search-filters").submit();
        })
    })
</script>
