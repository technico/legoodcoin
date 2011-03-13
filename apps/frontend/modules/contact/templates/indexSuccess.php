<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<form action="<?php echo url_for('contact/index?id='.$id) ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>