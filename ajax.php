<?php

?>

<script>
	$(document).ready(function() {

		$(".add-to-cart").click(function () {
			var id = $(this).attr("data-id");
			$.post("/cart/addAjax/"+id, {}, function (data) {
				$.post("#cart-count").html(data);	
			});
			return false;
		});
	});


$.ajax({
	url: 'ajax.html',
})
.always(function(html) {
	$('#result').html(html);
});





</script>