<?php



/* == NEW PROFILE FIELDS == */

function wpb_new_contact_methods( $contactmethods ) {

	$contactmethods['wpb_twitter'] = 'Twitter';

	$contactmethods['wpb_facebook'] = 'Facebook';

	$contactmethods['wpb_facebook_page'] = 'Facebook Page';

	$contactmethods['wpb_gplus'] = 'Google Pluss';	

	$contactmethods['wpb_linkedin'] = 'Linkedin';

	$contactmethods['wpb_pinterest'] = 'Pinterest';

	return $contactmethods;

}

add_filter('user_contactmethods','wpb_new_contact_methods');





/* == SOCIAL PROFILES LINKS == */

function wpb_profile_buttons() {

	

	//checks for current author social profiles in wordpress profile information and

	//show a link to it profile page in each social networks it has



	$output = '<div class="wpb-social-buttons">';

	

	$user_fb = get_the_author_meta( 'wpb_facebook' );

	if( $user_fb ) {

		$output .= wpb_fb_profile_button( $user_fb );

	}

	

	$user_fb_page = get_the_author_meta( 'wpb_facebook_page' );

	if( $user_fb_page ) {

		$output .= wpb_fb_page_button( $user_fb_page );

	}



	$user_tw = get_the_author_meta( 'wpb_twitter' );

	if( $user_tw ) {

		$output .= wpb_tw_profile_button( $user_tw );

	}



	$user_gplus = get_the_author_meta( 'wpb_gplus' );

	if( $user_gplus ) {

		$output .= wpb_gplus_profile_button( $user_gplus );

	}



	$user_linkedin = get_the_author_meta( 'wpb_linkedin' );

	if( $user_linkedin ) {

		$output .= wpb_linkedin_profile_button( $user_linkedin );

	}



	$user_pinterest = get_the_author_meta( 'wpb_pinterest' );

	if( $user_pinterest ) {

		$output .= wpb_pinterest_profile_button( $user_pinterest );

	}



	$output .= '</div>';

	

	return $output;



}





function wpb_fb_profile_button( $user ) {

	$output = '<div id="fb-button"><a href="https://www.facebook.com/' . $user . '"><span class="fa fa-facebook"></span></a></div>';

	return $output;

}



function wpb_fb_page_button( $user ) {

	$output = '<div id="fb-button"><a href="https://www.facebook.com/page/' . $user . '"><span class="fa fa-facebook"></span></a></div>';

	return $output;

}



function wpb_tw_profile_button( $user ) {

	$output = '<div id="tw-button"><a href="https://twitter.com/' . $user . '"><span class="fa fa-twitter" ></span></a></div>';

	return $output;

}



function wpb_gplus_profile_button( $user ) {

	$output = '<div id="gp-button"><a href="https://plus.google.com/' . $user . '"><span class="fa fa-google-plus"></span></a></div>';

	return $output;

}



function wpb_linkedin_profile_button( $user ) {

	$output = '<div id="ln-button"><a href="http://www.linkedin.com/in/' . $user . '"><span class="fa fa-linkedin"></span></a></div>';

	return $output;

}



function wpb_pinterest_profile_button( $user ) {

	$output = '<div id="pn-button"><a href="http://pinterest.com/' . $user . '/"><span class="fa fa-pinterest"></span></a></div>';

	return $output;

} ?>