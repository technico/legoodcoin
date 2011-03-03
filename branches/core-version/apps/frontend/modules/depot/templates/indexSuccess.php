<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<style>
#depot th {
	width: 100px;
}
</style>
<div id="depot">
<form action="<?php echo url_for('depot/index') ?>" method="POST">
<?php echo $oForm->renderHiddenFields() ?>
<fieldset><legend>Informations</legend>
<table>
<?php echo $oForm[ 'categorie' ]->renderRow() ?>
<?php echo $oForm[ 'type_annonce' ]->renderRow() ?>
<?php echo $oForm[ 'titre' ]->renderRow() ?>
<?php echo $oForm[ 'contenu' ]->renderRow() ?>
<?php echo $oForm[ 'prix' ]->renderRow() ?>
<?php echo $oForm[ 'telephone' ]->renderRow() ?>
</table>
</fieldset>
<fieldset><legend>Localisation</legend>
<table>
<?php echo $oForm[ 'region' ]->renderRow() ?>
<?php echo $oForm[ 'departement' ]->renderRow() ?>
<?php echo $oForm[ 'code_postal' ]->renderRow() ?>
<?php echo $oForm[ 'ville' ]->renderRow() ?>
</table>
</fieldset>
<fieldset><legend>Annonceur</legend>
<table>
<?php echo $oForm[ 'mail' ]->renderRow() ?>
</table>
</fieldset>
<table>
	<tr>
		<td colspan="2"><input type="submit" /></td>
	</tr>
</table>
</form>
</div>
