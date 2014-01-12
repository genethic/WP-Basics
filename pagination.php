<?php
/* == PAGINATION == */

function wb_pagination() {
	
	global $wp_query;
	
	global $smof_data; 

	$total_pages = $wp_query->max_num_pages;  

	if ($total_pages > 1){  
	
		$current_page = max(1, get_query_var('paged'));  
	
		echo '<nav class="page_nav">';  
	
		echo paginate_links(array(  
	
		  'base' =>  @add_query_arg('paged','%#%'),  
	
		  'format' => '/page/%#%',  
	
		  'current' => $current_page,  
	
		  'total' => $total_pages,  
	
		  'prev_text' => $smof_data['pag_prev_link'],  
	
		  'next_text' => $smof_data['pag_next_link']  
	
		));  
	
	  echo '</nav>';   
	
	}  

}

?>