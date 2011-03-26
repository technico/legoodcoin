$map = [{key:"1", value: "Ile de France", mapTo: [{key:"75", value: "Paris"}, {key:"92", value: "Hauts de Seine"}, {key:"94", value: "Val de Marne"}]}, {key:"2", value: "Provence-Alpes-Côte d Azur", mapTo: [{key:"83", value: "Var"}, {key:"84", value: "Vaucluse"}]}];

$('#annonce_region').change(function (evt) {
  $pos_region = -1;
  for($i in $map)
  {
    console.log($map[$i].key);
    console.log(evt.currentTarget.value);
    if($map[$i].key == evt.currentTarget.value) { $pos_region = $i; break; } 
  }

  if($pos_region != -1)
  {
    $('#annonce_departement').children().remove();
    $('#annonce_departement').append('<option></option>');
    for(i=0; i<$map[$pos_region].mapTo.length; i++)
    {
      $option_html = '<option value="' + $map[$pos_region].mapTo[i].key + '">'
                 + $map[$pos_region].mapTo[i].value + '</option>';
      $('#annonce_departement').append($option_html);
    }
  }
});