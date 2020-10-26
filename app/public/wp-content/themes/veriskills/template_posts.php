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
$unique_months = array_unique($months);
$selected_month = isset($_GET['month']) ? $_GET['month'][0] : date("Y-F", strtotime(date("Y-F")));
// var_dump($selected_month);
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
                        <select class="form-control" name="category[]" id="filter-category">
<?php
    foreach($categories as $category):
        $selected = ($_GET['category'][0] == $category->slug || (!isset($_GET['category']) && $category->slug == 'news-insights')) ? 'selected="selected"' : '';
        echo '<option ' .$selected. ' value="' .$category->slug. '">' .$category->name. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                    <div class="filter-item">
                        <select class="form-control" name="month[]" id="filter-category">
<?php
    foreach($unique_months as $month):
        $month_value = date("Y-F", strtotime($month));
        echo '<option ' .($month_value == $selected_month ? 'selected="selected"' : ''). 
            ' value="' .$month_value. '">' .$month. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                </div>
            </form>
        </div>	

        <div class="blog-roll entry-body">
<?php
$meta_query[] = array(
    'taxonomy' => 'category',
    'field' => 'slug',
    'terms' => isset($_GET['category']) ? $_GET['category'] : 'news-insights'
);

$selected_month = $selected_month. '-01';
$date_query = [];
$date_query[] = array(
    'column' => 'post_date',
    'after' => date("Y-m-d", strtotime($selected_month)),
    'before' => date("Y-m-t", strtotime($selected_month))
);

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'orderby' => 'posted_date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'tax_query' => array($meta_query),
    'date_query' => $date_query,
    'paged' => $paged,
    'posts_per_page' => 9
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
        // echo paginate_links(array(
        //     'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        //     'total'        => $query->max_num_pages,
        //     'current'      => max( 1, get_query_var( 'paged' ) ),
        //     'format'       => '?paged=%#%',
        //     'show_all'     => false,
        //     'type'         => 'plain',
        //     'end_size'     => 2,
        //     'mid_size'     => 1,
        //     'prev_next'    => true,
        //     'prev_text'    => sprintf( '<i class="las la-arrow-circle-left"></i> %1$s', __( '', 'text-domain' ) ),
        //     'next_text'    => sprintf( '%1$s <i class="las la-arrow-circle-right"></i>', __( '', 'text-domain' ) ),
        //     'add_args'     => false,
        //     'add_fragment' => '',
        // ));
?>
            <div class="pagination-next"><? previous_posts_link( '&laquo;&nbsp;Newer Entries', $query->max_num_pages); ?></div>
            <div class="pagination-prev"><?php next_posts_link( 'Older Entries&nbsp;&raquo;', $query->max_num_pages); ?></div>
        </div>
<?php
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
