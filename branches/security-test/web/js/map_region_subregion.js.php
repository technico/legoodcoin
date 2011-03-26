<?php Doctrine::getTable('region') ?>
<?php $imax = 2 ?>
var $map_id_pos = [
<?php for($i=0; $i<$imax-1; $i++): ?>
<?php echo $i ?>,
<?php endfor ?>
<?php echo $imax-1 ?>
];