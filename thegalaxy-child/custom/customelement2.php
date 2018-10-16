<?php

	$string = 
	    $string = 
	    file_get_contents("https://server.digitalpour.com/DashboardServer/api/v3/MenuItems/5b23f80c3527260eb4b04e8a/1/Tap?apiKey=5b27d8e83527260ba0df18b0");
	
	    $json_taps = json_decode($string, true);  
	
	
		$t=1;
		
		echo '<div class="beer_item_wrapper column_1">';
		
		foreach ($json_taps as $beverage) { 
	    
	        $item_name = $beverage['MenuItemDisplayDetail']['DisplayName'];
	        $producer_name = $beverage['MenuItemProductDetail']['FullProducerList'];
	        $beverage_name = $beverage['MenuItemProductDetail']['BeverageNameWithVintage'];
	        $beverage_style = $beverage['MenuItemProductDetail']['FullStyleName'];
	        $beverage_color = $beverage['MenuItemProductDetail']['Beverage']['StyleColor'];
	        $year = $beverage['MenuItemProductDetail']['Year'];
	        $beverage_abv = $beverage['MenuItemProductDetail']['Beverage']['Abv'];
	        $beverage_type = $beverage['MenuItemProductDetail']['BeverageType'];
	        $producer_location = "";
	        $producer_url = "";
	        switch($beverage_type) {
	            case "Beer":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Brewery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Brewery']['BreweryUrl'];
	                break;
	            case "Cider":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Cidery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Cidery']['CideryUrl'];
	                break;
	            case "Mead":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Meadery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Meadery']['MeaderyUrl'];
	                break;
	            case "Wine":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['Winery']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['Winery']['WineryUrl'];
	                break;
	            case "Kombucha":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['KombuchaMaker']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['KombuchaMaker']['Url'];
	                break;
	            case "Soft Drink":
	                $producer_location = $beverage['MenuItemProductDetail']['Beverage']['SoftDrinkMaker']['Location'];
	                $producer_url = $beverage['MenuItemProductDetail']['Beverage']['SoftDrinkMaker']['Url'];
	                break;
	        }
	        $date_put_on = $beverage['DatePutOn']; 
	        $bottle_size = $beverage['MenuItemProductDetail']['Prices'][0]['Size'];   
	        $bottle_price = $beverage['MenuItemProductDetail']['Prices'][0]['Price'];
	        $beverage_ps = $beverage['MenuItemProductDetail']['Prices'][0]['DisplayName']; 
	        $in_bottles = $beverage['MenuItemProductDetail']['AvailableInBottles'];
	        $keg_size = $beverage['MenuItemProductDetail']['KegSize'];
	        $oz_remaining = $beverage['MenuItemProductDetail']['EstimatedOzLeft'];
	        $scale = 1.0; //
	
	
	    //calculating percentage of keg remaining
	    // Get Percentage out of 100
	    if ( !empty($keg_size) ) { $percent = $oz_remaining  / $keg_size; } 
	    else { $percent = 0; }
	
	    // Limit to 100 percent (if more than the max is allowed)
	    if ( $percent > 1 ) { $percent = 1; }     
	    if ( $percent < 0 ) { $percent = .005; }     
	    $percent_remaining = number_format($percent*100, 0);
	    if ( $percent_remaining < 1 ) {$percent_remaining = "< 1";}
	    
	    if ($percent_remaining >= 75) {
		    
		    $percent_left_color = 'green';
		    
	    } else if ($percent_remaining >= 25) {
		    
		    $percent_left_color = 'yellow';
		    
	    } else if ($percent_remaining >= 0) {
		    
		    $percent_left_color = 'red';
		    
	    }
	
		echo '<div class="beer_item">';
		
		echo '<span class="tap_num">';
		
		echo $item_name;
		
		echo '</span>';
		
		echo '<div class="beer_title">';
		
		echo '<span class="beer_prod">';
		
		if (!empty($producer_url)) {
			
			echo '<a href="http://' . $producer_url . '" target="_blank">';
			
			echo $producer_name;
			
			echo '</a>';
			
		} else {
			
			echo $producer_name;	
			
		}
		
		echo '</span>';
		
		echo '<span class="beer_name">';
		
		if (!empty($producer_name)) {
			
			echo '<a href="http://www.ratebeer.com/advbeersearch.php?BeerName=' . $producer_name . '" target="_blank">';
			
			echo $beverage_name;
			
			echo '</a>';
			
		} else {
			
			echo $beverage_name;
			
		}
		
		echo '</span>';
		
		echo '</div>';
		
		echo '<div class="beer_desc">';
		
		echo '<span class="beer_type">';
		
		echo $beverage_type;
		
		echo '</span>';
		
		echo '<span class="beer_abv">';
		
		echo 'ABV ' . $beverage_abv . '%';
		
		echo '</span>';
		
		echo '</div>';
		
		//echo '<div class="percent_remaining">';
		
		//echo '<span class="' . $percent_left_color . '" style="width:' . $percent_remaining . '%;"></span>';
		
		//echo '<span class="percent_desc">' . $percent_remaining . '% remaining</span>';
		
		//echo '</div>';
		
		echo '</div>';
	
		$t++;    
	 
	}
	
	echo '</div><div class="beer_item_wrapper column_2"></div>';

?>