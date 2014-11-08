<?php

/* == PAGINATION ==*/

function wb_post_pagination() {

	if (is_single()) {

		global $smof_data;

		$prev_format = $smof_data['prev_format'];
		$prev_link = $smof_data['prev_link'];
		$next_format = $smof_data['next_format'];
		$next_link = $smof_data['next_link'];


		if ($smof_data['links_cat'] == 1) {

			$links_cat = 'true';

		} else {

			$links_cat = 'false';

		};

		if ( get_previous_post_link( $prev_format, $prev_link, $links_cat ) or get_next_post_link( $next_format, $next_link, $links_cat )  ) {
			$output = '<nav class="post-links">';
			$output .= '<div class="previous">' .  get_previous_post_link($prev_format, $prev_link, $links_cat) . '</div>';
			$output .= '<div class="next">' . get_next_post_link($next_format, $next_link, $links_cat) . '</div>';
			$output .= '</nav>';

			return $output;
		}
	}
}

?>
