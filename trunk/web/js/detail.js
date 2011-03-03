var blocID = 'div#conseil'
var listener = 'a#conseiller'
var timeFor = 150;

$(function() {
	$(listener).toggle( function() {
		$(blocID).fadeIn(timeFor);
	}, function() {
		$(blocID).fadeOut(timeFor);
	});
});