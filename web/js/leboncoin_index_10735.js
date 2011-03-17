/* Begin file: index.js */
/*
 * Index page scripts 
 */

/* 
 * Preload onmouseover images
 */
function preload_image(_image) {
	var image = new Image;
	image.src = _image;
}

/* 
 * Change county image onmouseover on index page 
 */
function change_image(base_url, region) {
	var ShowItem = document.getElementById("area_image");
	var LinkItem = document.getElementById("county_" + region);
	ShowItem.style.backgroundImage = 'url(' + base_url + '/images/map_' + region + '.png)';
	LinkItem.style.textDecoration = "underline";
	return true;
}

/* 
 * Change back county image onmouseout on index page
 */ 
function hide_image(base_url, region) {
	var ShowItem = document.getElementById("area_image");
	var LinkItem = document.getElementById("county_" + region);
	ShowItem.style.backgroundImage = 'url(' + base_url + '/images/none.gif)';
	LinkItem.style.textDecoration = "none";
	return true;
}
/* End file: index.js */
/* Begin file: all_pages.js */
function add_bookmark() {
	var ua=navigator.userAgent.toLowerCase();
	var konq=(ua.indexOf('konqueror')!=-1);
	var saf=(ua.indexOf('webkit')!=-1);
	var mac=(ua.indexOf('mac')!=-1);
	var ctrlKey=mac?'Command/Cmd':'CTRL';

	if(window.external && (!document.createTextNode ||(typeof(window.external.AddFavorite)=='unknown'))) {
		window.external.AddFavorite("http://www.leboncoin.fr/","Petites annonces gratuites d'occasion - leboncoin.fr");
	} else if(konq) {
		alert('Veuillez appuyer sur CTRL + B pour ajouter ce site � vos favoris.');
	} else if(window.opera) {
		void(0);
	} else if(window.home||saf) {
		alert('Veuillez appuyer sur '+ctrlKey+' + D pour ajouter ce site � vos favoris.');
	} else if(!window.print || mac) {
		alert('Veuillez appuyer sur Command/Cmd + D pour ajouter ce site � vos favoris.');    
	} else {
		alert('Votre navigateur internet n\'�tant pas reconnu, vous devrez ajouter ce site manuellement � vos favoris.');
	}
}
/* End file: all_pages.js */
