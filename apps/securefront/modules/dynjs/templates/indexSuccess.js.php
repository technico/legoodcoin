<?php
    $max_regions = count($regions);    
    $out = '[';
    $i=1;
    foreach($regions as $region)
    {
      $out .= '{';
      $out .= 'key:"'.$region->getId().'", value: "'.$region->getNom().'", mapTo: ';
        //
        $out .= '[';
        $departements = $region->getDepartement();
        $max_departements = count($departements);
        $j=1;
        foreach($departements as $departement)
        {
          $out .= '{key:"'.$departement->getCode_dep().'", value: "'.$departement->getNom().'"}';
          if($j++<$max_departements) {$out .= ', ';}
        }
        $out .= ']';
        //
      $out .= '}';
      if($i++<$max_regions) {$out .= ', ';}
    }
    $out .= ']'; 
?>
$(function() {
  $map = <?php echo $out?>;

  $('#annonce_region').change(function (evt) {
    $pos_region = -1;
    for($i in $map)
    {
      if($map[$i].key == $(this).find("option:selected")[0].value) { $pos_region = $i; break; } 
    }

    $('#annonce_departement').children().remove();

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
});
