<?php



function wpb_social_sharing() {

	

	if (is_single()) {

		global $wpb_opt;

			

		$output = '<div class="wpb-social-sharing">';

			

		//facebook

		if( isset( $wpb_opt['social_buttons']['fb'] ) ) {

			

			$output .= '<div id="fb-wrapper" class="wpb-social-button"><div class="fb-like" data-href="' . get_permalink() . '" data-layout="' . $wpb_opt['fb_button'] . '" data-action="like" data-show-faces="true"';

			

			if( $wpb_opt['fb_share_button'] == 1 ){ $output .= ' data-share="true"'; }

			

			$output .= '></div></div>';

			

		}

		

		

		//twitter

		if( isset( $wpb_opt['social_buttons']['tw'] ) ) {

			

			$output .= '<div id="tw-wrapper" class="wpb-social-button"><a href="https://twitter.com/share" class="twitter-share-button" data-count="' . $wpb_opt['tw_button'] . '" data-lang="' . get_bloginfo( 'language' ) . '">Tweet</a></div>';

		

		}

		

		

		//google plus

		if( isset( $wpb_opt['social_buttons']['g1'] ) ) {

			

			$output .= '<div id="g1-wrapper" class="wpb-social-button"><div class="g-plusone" data-width="300" data-size="' . $wpb_opt['g1_button'] . '"></div></div>';

			

		}

		

		$output .='</div>';

		return $output;

	}



}



?>