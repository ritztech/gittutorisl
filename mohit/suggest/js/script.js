// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 2; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'suggest/ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(itemname,item) {
	// change input value
	$('#country_id').val(itemname.innerHTML);
	//$('#country_id1').val(item);
	// hide proposition list
	h123(item);

	$('#country_list_id').hide();

}

