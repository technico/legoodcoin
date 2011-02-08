<?php echo url_for( '@homepage' ); ?>
<?php include_javascripts_for_form( $form ) ?>
<?php echo form_tag_for($form, '@depot' ); ?>
<table id="job_form">
	<tbody><?php echo $form ?></tbody>
	<tfoot><tr><td colspna="2"><input type="submit" value="rechercher" /></td></tr></tfoot>
</table>
</form>