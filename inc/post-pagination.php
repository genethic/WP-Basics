<?php 

/* == PAGINATION ==*/

function wpb_post_pagination() {

	

	if (is_single()) {

	

		global $wpb_opt;

		

		$prev_format = $wpb_opt['prev_format'];

		$prev_link = $wpb_opt['prev_link'];

		$next_format = $wpb_opt['next_format'];

		$next_link = $wpb_opt['next_link'];

		

		if ($wpb_opt['link_cat'] == 1) {

			$links_cat = 'true';

		} else {

			$links_cat = 'false';

		};

		

		if ( get_previous_post_link( $prev_format, $prev_link, $links_cat ) or get_next_post_link( $next_format, $next_link, $links_cat )  ) {

			$output = '<nav class="wpb-post-links">';

			$output .= '<div class="wpb-previous">' .  get_previous_post_link($prev_format, $prev_link, $links_cat) . '</div>';

			$output .= '<div class="wpb-next">' . get_next_post_link($next_format, $next_link, $links_cat) . '</div>';

			$output .= '</nav>';

			

			return $output;

		}

	}

} ?>