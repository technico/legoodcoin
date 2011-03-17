$(document).ready(function() {
	$(".region").add(".region_small").mouseover(function() {
		// Set overlay mouseover image
		$(".index_overlay").addClass(this.id);
	});	
	$(".region").add(".region_small").mouseout(function() {
		// Set overlay mouseover image
		$(".index_overlay").removeClass(this.id);
	});	
});