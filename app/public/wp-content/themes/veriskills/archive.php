<?php
/*
Template Name: Archives
@package: wwd blankslate
*/
get_header();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0];
$categories = get_categories(array(
    'orderby' => 'name',
    'order' => 'ASC'
));
$query = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'posted_date',
    'order' => 'ASC',
    'post_status' => 'published',
    'fields' => 'posted_date'
));
$months = array();
if ($query->have_posts()): while($query->have_posts()): $query->the_post();
    $post_date = date("Y F", strtotime($post->post_date));
    if (!in_array($post_date, $months)) {
        $months[] = $post_date;
    }
endwhile; endif;
// var_dump(array_unique($months));
//var_dump(date("Y-M-d", strtotime($months[0])));
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
            <form method="get" class="archive-search-filters">
                <div class="blog-filters">
                    <h3>Refine</h3>
                    <div class="filter-item">
                        <select class="form-control" name="filter_category" id="filter-category">
                            <option value="">Category</option>
<?php
    foreach($categories as $category):
        echo '<option value="' .$category->term_id. '">' .$category->name. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                    <div class="filter-item">
                        <select class="form-control" name="filter_category" id="filter-category">
                            <option value="">Date</option>
<?php
    foreach($months as $month):
        echo '<option value="' .$month. '">' .$month. '</option>';
    endforeach;
?>
                        </select>
                    </div>
                    <button type="submit">Search</button>
                </div>
            </form>
            <div class="blog-roll">
<?php
    if (have_posts()):
        while(have_posts()): the_post();
            $template = get_post_type() . (get_post_format() ? '-' . get_post_format() : '');
            // var_dump('template is ' .$template);
            get_template_part('template-parts/content', $template);
        endwhile;
?>
            </div>
<?php   if (is_paged()):    ?>
            <div class="pagination-controls">
                <div class="float-left"><?php previous_posts_link( '&laquo; Newer Entries' ); ?></div>
                <div class="float-right"><?php next_posts_link( 'Older Entries &raquo;' ); ?></div>
            </div>
<?php
        endif;
    endif;
?>
        </div>
    </section>
</main>

<?php get_footer(); ?>