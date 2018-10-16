<?php

	$pairings = get_field('pairings');
						
	if( $pairings ):
		
		echo '<div class="pairings_wrapper">';
									
		foreach( $pairings as $pairing ):
							
			echo '<div class="pairing">';
				
			$image = $pairing['image'];
				
			echo '<div class="image_content"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '" /></div>';
				
			echo '<h2>' . $pairing['beer'] . '</h2>';
			
			echo '<p>' . $pairing['food_pairing'] . '</p>';
				
			echo '</div>';
																		
		endforeach;
		
		echo '</div>';
									
	endif;	

?>