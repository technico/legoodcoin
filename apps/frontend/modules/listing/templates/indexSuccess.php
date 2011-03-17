<?php use_helper('Date') ?>
<?php use_helper('Form') ?>
<?php use_helper('I18N') ?>
<?php $url = $form_submit_url ?>
<?php use_stylesheet ('listing.css')?>
<?php use_helper('Date'); ?>
<?php //slot( 'zone_geo', $sZoneGeoNom ) ?>
<?php //slot( 'url_annonce', url_for( 'listing/index?r='.( $mZoneGeoId === NULL ? '0' : $mZoneGeoId ) ) ) ?>
<div id="listing">

	<form method="post" action="<?php echo url_for($form_submit_url) ?>">
        <div id="search" style="margin-top:14px">
<?php echo $filter ?> <input type="submit"  value="<?php echo __('Search') ?>"/>
            <?php if( $sf_user->isAuthenticated() ):?><div><label><input type="checkbox"  />Mes annonces uniquement</label></div><?php endif ?>
<div><label><?php echo checkbox_tag('only_title', 1, $is_only_title_checked, array('name'=>'annonce_filters[only_title]')) ?><?php echo __('Search only in title') ?></label>
</div>       
        </div>
	</form>     

        <div id="tabarea">
            <ul id="tabnav">
                <li class="<?php echo $type_annonce === ''?'tab_all':'tab_private' ?>">
                <?php if($type_annonce === ''): ?>
                    <span class="bold"><?php echo __('All') ?></span> <?php echo $pager->getFirstIndice();?> - <?php echo $pager->getLastIndice(); ?> de <span class="bold"><?php echo $pager->getNbResults(); ?></span>
                <?php else: ?>
                	<a href="<?php echo url_for('listing/index') ?>" title="<?php echo __('Display all ads') ?>"><?php echo __('All') ?><span class="tab_right_links">, <?php echo $nb_tout ?></span></a>
                <?php endif ?>
                </li>
                <li class="<?php echo $type_annonce === 'offre'?'tab_all':'tab_private' ?>">
				<?php if($type_annonce === 'offre'): ?>
                    <span class="bold"><?php echo ucfirst(__('offers')) ?></span> <?php echo $pager->getFirstIndice();?> - <?php echo $pager->getLastIndice(); ?> de <span class="bold"><?php echo $pager->getNbResults(); ?></span>
                <?php else: ?>
                	<a href="<?php echo url_for('listing/offres') ?>" title="<?php echo __('Display only offers') ?>"><?php echo ucfirst(__('offers')) ?><span class="tab_right_links">, <?php echo $nb_offres ?></span></a>
                <?php endif ?>				
				</li>
                <li class="<?php echo $type_annonce === 'demande'?'tab_all':'tab_private' ?>">
                <?php if($type_annonce === 'demande'): ?>
                    <span class="bold"><?php echo ucfirst(__('demands')) ?></span> <?php echo $pager->getFirstIndice();?> - <?php echo $pager->getLastIndice(); ?> de <span class="bold"><?php echo $pager->getNbResults(); ?></span>
                <?php else: ?>
                	<a href="<?php echo url_for('listing/demandes') ?>" title="<?php echo __('Display only demands') ?>"><?php echo ucfirst(__('demands')) ?><span class="tab_right_links">, <?php echo $nb_demandes ?></span></a>
				<?php endif ?>					
				</li>
            </ul>
        </div>

        <table cellspacing="0" cellpadding="0" border="0" style="float: left; width: 728px;" id="hl" class="listing">
            <tbody>
            	<?php foreach( $annonces as $oAnnonce ): ?>
                <tr>
                    <td nowrap="nowrap" width="80px"><?php echo $oAnnonce->getDateMiseEnLigne(); ?></td>
                    <td><?php echo $oAnnonce->getHeureMiseEnLigne(); ?></td>
                    <td>
                    <?php if( count( $oAnnonce->getAnnoncePhoto() ) > 0) : ?>
                    <?php foreach( $oAnnonce->getAnnoncePhoto() as $oAnnoncePhoto): ?>
						<img src="<?php echo Backref::get80( $oAnnoncePhoto->getFilename() ) ?>" />
						<?php break; ?>
					<?php endforeach ?>
					<?php else: ?>
						<img alt="" class="j" src="/images/0_extra.gif" />
					<?php endif; ?>
                    </td>
                    <td nowrap="nowrap" width="400px">
                        <a href="<?php echo url_for( 'detail/index?id='.$oAnnonce->getId() ) ?>"><?php echo $oAnnonce->getTitre(); ?></a><br/>
                        <span style="font-size: 11px;"><?php echo $oAnnonce->getPrix(); ?>&nbsp;€</span></td>
                    <td style="white-space: nowrap; font-size: 11px;"><span style="white-space: nowrap;"><?php echo ucfirst($oAnnonce->getCategorie()); ?></span> Offres <br/>
		        <?php echo ucfirst($oAnnonce->getDepartement()); ?>
                        <br/>Puteaux</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="clear: left;" id="resultcontainer">
            <div id="result_left">
                <?php if( $pager->getPage() != $pager->getPreviousPage() ): ?>
                <span class="nohistory"><a href="<?php echo url_for( $url ); ?>?p=<?php echo $pager->getPreviousPage(); ?>">« <?php echo __('Previous page') ?></a></span>
            	&nbsp;&nbsp;
                <?php endif; ?>
            	<?php foreach( $pager->getLinks() as $oPage ): ?>
            	<?php if( $oPage == $pager->getPage() ): ?>
                <span class="bold">[<?php echo $oPage; ?>]</span>
                <?php else: ?>
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>?p=<?php echo $oPage ?>"><?php echo $oPage; ?></a></span>
                <?php endif; ?>
            	<?php endforeach; ?>
                <?php if( $pager->getPage() != $pager->getNextPage() ): ?>
                &nbsp;&nbsp;
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>?p=<?php echo $pager->getNextPage() ?>"><?php echo __('Next page') ?> »</a></span>
            	<?php endif; ?>
            </div>
            <div id="result_right">
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>?p=<?php echo $pager->getLastPage() ?>"><?php echo __('Last page') ?></a></span>
            </div>
        </div>

</div>

<?php echo '<hr style="clear:both"/>', link_to('Informatique', $form_submit_url.'?c=1') ?><br />
<?php echo link_to('Voitures', $form_submit_url.'?c=2') ?>