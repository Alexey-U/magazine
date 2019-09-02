/*$(document).ready(function() {
	$(".add-to-cart").click(function() {
		var id = $(this).attr("id");
		$.get("/magazine/product-details/"+id, {}, function(data) {
			$("cart-count2").html(data);
		});
		return false;
	});
});
*/

document.querySelector(".add-to-cart").onclick = function () {
	var xhttp = new XMLHttpRequest();
	var id = this.getAttribute("id");
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("cart-count2").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "/product-details/" + id, true);
	xhttp.send();
}

