<?php

/* == NEW PROFILE FIELDS == */

function wb_new_contact_methods( $contactmethods ) {

	$contactmethods['twitter'] = 'Twitter';
	
	$contactmethods['facebook'] = 'Facebook';
	
	$contactmethods['facebook_page'] = 'Facebook Page';
	
	$contactmethods['gplus'] = 'Google Pluss';
	
	$contactmethods['linkedin'] = 'Linkedin';
	
	$contactmethods['pinterest'] = 'Pinterest';
	
	return $contactmethods;

}


/* == SOCIAL PROFILES LINKS == */

function wb_profile_buttons() {
	
	//checks for current author social profiles in wordpress profile information and
	//show a link to it profile page in each social networks it has

	$output = '<div class="social-profile-buttons">';
	
	$user_fb = get_the_author_meta('facebook');
	if($user_fb) {
		$output .= wb_fb_profile_button($user_fb);
	}
	
	$user_fb_page = get_the_author_meta('facebook_page');
	if($user_fb_page) {
		$output .= wb_fb_page_button($user_fb_page);
	}

	$user_tw = get_the_author_meta('twitter');
	if($user_tw) {
		$output .= wb_tw_profile_button($user_tw);
	}

	$user_gplus = get_the_author_meta('gplus');
	if($user_gplus) {
		$output .= wb_gplus_profile_button($user_gplus);
	}

	$user_linkedin = get_the_author_meta('linkedin');
	if($user_linkedin) {
		$output .= wb_linkedin_profile_button($user_linkedin);
	}

	$user_pinterest = get_the_author_meta('pinterest' );
	if($user_pinterest) {
		$output .= wb_pinterest_profile_button($user_pinterest);
	}

	$output .= '</div>';
	
	return $output;

}


function wb_fb_profile_button($user) {
	$output = '<a href="https://www.facebook.com/' . $user . '"><span class="fa fa-facebook"></span></a>';
	return $output;
}

function wb_fb_page_button($user) {
	$output = '<a href="https://www.facebook.com/page/' . $user . '"><span class="fa fa-facebook"></span></a>';
	return $output;
}

function wb_tw_profile_button($user) {
	$output = '<a href="https://twitter.com/' . $user . '"><span class="fa fa-twitter" ></span></a>';
	return $output;
}

function wb_gplus_profile_button($user) {
	$output = '<a href="https://plus.google.com/' . $user . '"><span class="fa fa-google-plus"></span></a>';
	return $output;
}

function wb_linkedin_profile_button($user) {
	$output = '<a href="http://www.linkedin.com/in/' . $user . '"><span class="fa fa-linkedin"></span></a>';
	return $output;
}

function wb_pinterest_profile_button($user) {
	$output = '<a href="http://pinterest.com/' . $user . '/"><span class="fa fa-pinterest"></span></a>';
	return $output;
}

?>