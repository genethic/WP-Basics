<?php 
/* == AUTHOR BIO == */ 
function wpb_author_info() {  
	if (is_single()) { 
		global $wpb_opt; 
	 
		$output = '<aside class="wpb-author">'; 
		 
		//show author avatar 
		if( isset( $wpb_opt['author_info']['avatar'] ) ){ 
			$output .= '<figure class="wpb-author-avatar">'. get_avatar( get_the_author_meta('ID'), 100 ). '</figure>'; 
		} 
			 
		$output .= '<div class="wpb-author-desc">'; 
			 
		//show title for the box  
		if( isset( $wpb_opt['author_info']['title'] ) ){ 
			$name =  sprintf($wpb_opt['author_title'], get_the_author_meta( 'display_name' )); 
			$output .= '<h2>' . $name . '</h2>'; 
		} 
		 
		//show author biography 
		if( isset( $wpb_opt['author_info']['bio'] ) ){        
			$output .= '<div class="wpb-author-bio">' . get_the_author_meta( 'description' ) . '</div>'; 
		} 
		  
		//show author social profiles links of current author 
		if(isset($wpb_opt['author_info']['share_buttons'] ) ){       
				 $output .= wpb_profile_buttons(); 
		} 
		 
		//show a link to all posts of the current author 
		if(isset( $wpb_opt['author_info']['posts_link'] ) ){      
			$output .= '<div class="wpb-author-links"><p><a href="' . get_author_posts_url(  get_the_author_meta('ID') ) . '">All posts by ' . get_the_author_meta( 'display_name' ) . '</a></p>'; 
		} 
		 
		$output .= '</div></aside>'; 
		 
		return $output; 
	} 
} ?>