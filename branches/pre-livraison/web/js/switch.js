var departement = '#annonce_departement';
var region = '#annonce_region';

var data = {
	"" : [["","&nbsp;"]],
	/*"Alsace" : ["Bas-Rhin","Haut-Rhin"],
	"Aquitaine" : ["Dordogne","Gironde","Landes","Lot-et-Garonne","Pyrenees-Atlantiques"],
	"Auvergne" : ["Allier","Cantal","Haute-Loire","Puy-de-Dome"],
	"Basse-Normandie" : ["Calvados","Manche","Orne"],
	"Bourgogne" : ["Cote-d'Or","Nievre","Saone-et-Loire","Yonne"],
	"Bretagne" : ["Cotes-d'Armor","Finistere","Ille-et-Vilaine","Morbihan"],
	"Centre" : ["Cher","Eure-et-Loir","Indre","Indre-et-Loire","Loir-etCher","Loiret"],
	"Champagne-Ardenne" : ["Ardennes","Aube","Marne","Haute-Marne"],
	"Corse" : ["Corse-du-Sud","Haute-Corse"],
	"Franche-Comte" : ["Doubs","Jura","Haute-Saone","Territoire de Belfort"],
	"Guadeloupe" : ["Guadeloupe"],
	"Guyane" : ["Guyane"],
	"Haute-Normandie" : ["Eure","Seine-Maritime"],*/
	"Ile-de-France" : [[75,"Paris"],/*"Seine-et-Marne","Yvelines","Essonne","Hauts-de-Seine","Seine-Saint-Denis",*/[94,"Val-de-Marne"]/*,"Val-d'Oise"*/],
	/*"Languedoc-Roussillon" : ["Aude","Gard","Herault","Lozere","Pyrenees-Orientales"],
	"Limousin" : ["Correze","Creuse","Haute-Vienne"],
	"Lorraine" : ["Meurthe-et-Moselle","Meuse","Moselle","Vosges"],
	"Martinique" : ["Martinique"],
	"Mayotte" : ["Mayotte"],
	"Midi-Pyrenees" : ["Ariege","Aveyron","Haute-Garonne","Gers","Lot","Hautes-Pyrenees","Tarn","Tarn-et-Garonne"],
	"Nord-Pas-de-Calais" : ["Nord","Pas-de-Calais"],
	"Pays de la Loire" : ["Loire-Atlantique","Maine-et-Loire","Mayenne","Sarthe","Vendee"],
	"Picardie" : ["Aisne","Oise","Somme"],
	"Poitou-Charentes" : ["Charente","Charente-Maritime","Deux-Sevres","Vienne"],*/
	"Provence-Alpes-Cotes d'Azur" : [/*"Alpes-de-Haute-Provence","Hautes-Aples","Alpes-Maritimes","Bouches-du-Rhone",*/[83,"Var"],[84,"Vaucluse"]]//,
	/*"Reunion" : ["Reunion"],	
	"Rhone-Alpes" : ["Ain","Ardeche","Drome","Isere","Loire","Rhone","Savoie","Haute-Savoie"]*/		
}

var mapRegionToSubregion = [[0],[75,94],[83, 84]]; 

function Switch() {

	this.getDepartement = function getDepartement(key){
		return data[key];
	}

	this.buildDepartement = function buildDepartement(tab){
		//$(departement).html("");
		$.each(tab, function(key,val) {
			//$(departement).html($(departement).html() + "<option value=\"" + val[0] + "\>" + val[1] + "</option>");
		});
	}

	this.buildRegion = function buildRegion() {
		var i = 0;
		//$(region).html("");
		$.each(data, function(key,val) {
			//$(region).html($(region).html() + "<option value=\"" + i + "\>" + key + "</option>");
			i++;
		});
		var str = $(region + " option:first").text();
		this.buildDepartement(this.getDepartement(str));
	}
	
	this.getSelected = function getSelected(){
		return $(departement + ":selected");
	}
	
	this.getSubregionRangeIndex = function getSubregionRangeIndex(regionIndex){
		return mapRegionToSubregion[regionIndex];
	}
}

$(function() {
	obj = new Switch();
	//obj.buildRegion();
	$(region).change(function (evt) {
		//var str = "";
		//str += $(region+ " option:selected").text();
		//obj.buildDepartement(obj.getDepartement(str));
		//alert(obj.getSelected());
		var regionIndex = evt.currentTarget.selectedIndex;
		var subregionRangeIndex = obj.getSubregionRangeIndex(regionIndex);
		
		//unselect any options in departement select box
		$(departement).find('option').each(function () {
			$(this).attr('selected', false);
			if(subregionRangeIndex[0]==0)
			{
				$(this).show();
			}
			else if(jQuery.inArray( parseInt($(this)[0].value), subregionRangeIndex )>=0)
			{
				$(this).show();	
			}
			else
			{
				$(this).hide();				
			}
		});

		if(subregionRangeIndex[0]==0)
		{
			$(departement).attr("disabled","disabled");
			return;
		}
		else
		{
			$(departement).attr("disabled",false);				
		}		
	});
});