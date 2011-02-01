<?php foreach($annonce_list as $annonce)?>
<ul>
	<?php echo '<li>'.$annonce->getId().'</li>' ?>
	<?php echo '<li>'.$annonce->getTitre().'</li>' ?>
	<?php echo '<li>'.$annonce->getContenu().'</li>' ?>
</ul>
