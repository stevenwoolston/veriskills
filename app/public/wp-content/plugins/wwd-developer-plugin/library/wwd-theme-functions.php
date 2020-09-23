<?php
/*
@package Woolston Web Design Developer Plugin
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

function wwd_template_shortcode($attrs) {
	ob_start();
	if (isset($attrs['template_name'])) {
		get_template_part('template-parts/' . $attrs['template_name']);
	} else {
		get_template_part('template-parts/content');
	}
	return ob_get_clean();
}
add_shortcode('wwd_template', 'wwd_template_shortcode');

function wwd_get_attachment( $num = 1 ){
	
	$output = '';
	if( has_post_thumbnail() && $num == 1 ): 
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	else:
		$attachments = get_posts( array( 
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ):
			foreach ( $attachments as $attachment ):
				$output = wp_get_attachment_url( $attachment->ID );
			endforeach;
		elseif( $attachments && $num > 1 ):
			$output = $attachments;
		endif;
		
		wp_reset_postdata();
		
	endif;
	
	return $output;
}


function wwd_get_embedded_media( $type = array() ){
	$content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
	$embed = get_media_embedded_in_content( $content, $type );
	
	if( in_array( 'audio' , $type) ):
		$output = str_replace( '?visual=true', '?visual=false', $embed[0] );
	else:
		$output = $embed[0];
	endif;
	
	return $output;
}


/*
 * Builds the Custom Dashboard video
 * https://wordpress.stackexchange.com/questions/46445/video-tutorials-in-dashboard
 * https://www.pmg.com/blog/removing-or-adding-wordpress-dashboard-widgets/
 * video format => 
 * array(
 * 		array('url' => 'https://', 'title' => 'Video Heading'),
 * 		array('url' => 'https://', 'title' => 'Video Heading')
 * )
 */

add_filter('wp_dashboard_setup', 'wwd_dashboard_widgets');
function wwd_dashboard_widgets()
{
	if (function_exists('wwd_dashboard_videos')):
		//	calls a special method in the theme which populates a list of videos
		wp_add_dashboard_widget('wwd-dashboard-videos', __('Site Tutorials'), 'wwd_dashboard_videos');
	endif;
}

function wwd_render_videos($videos) {
	if (count($videos) == 0) return;

    $html = null;
    foreach($videos as $video):
        $html .= <<<HTML
            <h2>{$video['title']}</h2>
            <a target="_blank" href="{$video['url']}"><video src="{$video['url']}" type="video/mp4"></a>
            <hr />
    HTML;
    endforeach;
    return $html;
}