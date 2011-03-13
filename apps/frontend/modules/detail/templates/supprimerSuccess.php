<form method="post" action="<?php echo url_for( 'detail/supprimer?id='.$id ) ?>">
<input type="password" name="mdp" /><?php if( isset( $bAuth ) && !$bAuth ): echo 'mauvais pass'; endif;?>
<input type="submit" />
</form>
