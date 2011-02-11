<?php include_partial( 'form' , array( 'filters' => $filters ) ) ?>
<?php use_helper('Date') ?>

<?php if( count( $aAnnonces ) === 0 ): ?>
Aucun résultat
<?php else: ?>
<table border="1">
	<tbody>
	<?php foreach( $aAnnonces as $oAnnonce ): ?>
		<tr>
			<td nowrap="nowrap" class="date"><?php echo format_date( strtotime( $oAnnonce->getDate_control() ), 'd MMM');?><br>
			<?php echo format_date(strtotime( $oAnnonce->getDate_control() ), 'H:mm');?>
			</td>
			<td class="image">Photo</td>
			<td nowrap="nowrap"><?php echo $oAnnonce->getTitre(); ?> <br>
			<?php echo $oAnnonce->getPrix(); ?>&nbsp;€</td>
			<td style="white-space: nowrap; font-size: 11px;"><span
				style="white-space: nowrap;"> <?php echo $oAnnonce->getCategorie(); ?>
			</span><br>
			<?php echo $oAnnonce->getDepartement(); ?> <br>
			<?php echo $oAnnonce->getVille(); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>