$(document).ready(function() {

	var s = $('.beer_item_wrapper').find('.beer_item').size();
	
	var z = 0;
	
	$('.beer_item_wrapper').find('.beer_item').each(function() {
		
		if (z >= s/2) {
			$(this).appendTo(".beer_item_wrapper.column_2");
		}
		else {
			// nothing
		}

		z++;

	});
	
});