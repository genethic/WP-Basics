<?php
/* == PAGINATION == */

function wpb_pagination() {
	
	global $wp_query;
	
	global $wpb_opt; 

	$total_pages = $wp_query->max_num_pages;  

	if ($total_pages > 1){  
	
		$current_page = max(1, get_query_var('paged'));  
	
		echo '<nav class="page_nav">';  
	
		echo paginate_links(array(  
	
		  'base' =>  @add_query_arg('paged','%#%'),  
	
		  'format' => '/page/%#%',  
	
		  'current' => $current_page,  
	
		  'total' => $total_pages,  
	
		  'prev_text' => $wpb_opt['pag_prev_link'],  
	
		  'next_text' => $wpb_opt['pag_next_link']  
	
		));  
	
	  echo '</nav>';   
	
	}  

}

?>