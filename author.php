<?php

/* == AUTHOR BIO == */

function wb_author_info() { 

	if (is_single()) {

		global $smof_data;
	
		$output = '<aside class="author-info">';
		
		//show author avatar
		if($smof_data['author_info']['avatar'] == true){
			$output .= '<figure class="author-info-avatar">'. get_avatar( get_the_author_meta('ID'), 100 ). '</figure>';
		}
			
		$output .= '<div class="author-info-desc">';
			
		//show title for the box
		if($smof_data['author_info']['title'] == true){
			$name =  sprintf($smof_data['author_title'], get_the_author_meta( 'display_name' ));
			$output .= '<h2>' . $name . '</h2>';
		}
		
		//show author biography
		if($smof_data['author_info']['bio'] == true){       
			$output .= '<div class="author-info-bio">' . get_the_author_meta( 'description' ) . '</div>';
		}
		 
		//show author social profiles links of current author
		if($smof_data['author_info']['social'] == true){      
				 $output .= wb_profile_buttons();
		}
		
		//show a link to all posts of the current author
		if($smof_data['author_info']['posts_link'] == true){     
			$output .= '<div class="author-info-links"><p><a href="' . get_author_posts_url(  get_the_author_meta('ID') ) . '">All posts by ' . get_the_author_meta( 'display_name' ) . '</a></p>';
		}
		
		$output .= '</div></aside>';
		
		return $output;

	}
	
} ?>