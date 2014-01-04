<?php

function wb_social_sharing() {
	
	if (is_single()) {
		global $smof_data;
			
		$output = '<div class="social-sharing">';
			
		//facebook
		if( $smof_data['share_buttons']['facebook'] == true ) {
			
			$output .= '<div class="fb-like" data-href="' . get_permalink() . '" data-layout="' . $smof_data['fb_button_layout'] . '" data-action="like" data-show-faces="true"';
			
			if( $smof_data['facebook_share_button'] == 1 ){ $output .= ' data-share="true"'; }
			
			$output .= '></div>';
			
		}
		
		
		//twitter
		if( $smof_data['share_buttons']['twitter'] == true ) {
			
			$output .= '<a href="https://twitter.com/share" class="twitter-share-button" data-count="' . $smof_data['twitter_show_count'] . '" data-lang="' . get_bloginfo( 'language' ) . '">Tweet</a>';
		
		}
		
		
		//google plus
		if( $smof_data['share_buttons']['google-plus'] == true ) {
			
			$output .= '<div class="g-plusone" data-width="300" data-size="' . $smof_data['google_plus_size'] . '"></div>';
			
		}
		
		$output .='</div>';
		return $output;
	}

}

/* facebook */
function wb_facebook() {
	wp_register_script( 'facebook',  plugin_dir_url( __FILE__ ) . 'js/facebook.js' );
	wp_enqueue_script( 'facebook' );
}
add_action( 'wp_enqueue_scripts', 'wb_facebook' );

/* twitter */
function wb_twitter() {
	wp_register_script( 'twitter',  plugin_dir_url( __FILE__ ) . 'js/twitter.js' );
	wp_enqueue_script( 'twitter' );
}
add_action( 'wp_enqueue_scripts', 'wb_twitter' );

/* google plus */
function wb_google_plus() {
	wp_register_script( 'google_plus',  plugin_dir_url( __FILE__ ) . 'js/google-plus.js' );
	wp_enqueue_script( 'google_plus' );
}
add_action( 'wp_enqueue_scripts', 'wb_google_plus' );

/* FONT AWESOME ICONS*/
function wb_font_awesome () {
	wp_register_style( 'wb_font_awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
	wp_enqueue_style( 'wb_font_awesome' );
}
add_action('wp_print_styles', 'wb_font_awesome');

?>