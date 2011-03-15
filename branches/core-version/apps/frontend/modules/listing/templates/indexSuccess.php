<?php $url = "listing/index?t=$sTitre&r=$mZoneGeoId&c=$sCategorie" ?>
<?php use_stylesheet ('listing.css')?>
<?php use_helper('Date'); ?>
<?php slot( 'zone_geo', $sZoneGeoNom ) ?>
<?php slot( 'url_annonce', url_for( 'listing/index?r='.( $mZoneGeoId === NULL ? '0' : $mZoneGeoId ) ) ) ?>
<div id="listing">

	<form method="GET" action="<?php echo url_for( 'listing/index' ); ?>">
        <div id="search" style="margin-top:14px">
            <span>
                <input type="text" maxlength="30" size="30" name="t" value="<?php echo $sTitre; ?>" />
                <select name="r"><?php include_partial( 'regions', array( 'aRegions' => $aRegions, 'mZoneGeoId' => $mZoneGeoId, 'sZoneGeoNom' => $sZoneGeoNom ) ) ?></select>
                <select name="c"><?php include_partial( 'categories', array( 'aCategories' => $aCategories, 'sCategorie' => $sCategorie ) ) ?></select>
                <input type="submit" value="Chercher" />
            </span>
            <?php if( $sf_user->isAuthenticated() ):?><div><label><input type="checkbox"  />Mes annonces uniquement</label></div><?php endif ?>
        </div>
	</form>     
<?php if( count( $aAnnonces ) === 0 ): ?>
<div id="tabarea">Aucun résultat</div>
<?php else: ?>
        <div id="tabarea">
            <ul id="tabnav">
                <li class="tab_all">
                    <span class="bold">Toutes</span> <?php echo $oPager->getFirstIndice();?> - <?php echo $oPager->getLastIndice(); ?> de <span class="bold"><?php echo $oPager->getNbResults(); ?></span>
                </li>
            </ul>
        </div>

        <table cellspacing="0" cellpadding="0" border="0" style="float: left; width: 728px;" id="hl" class="listing">
            <tbody>
            	<?php foreach( $aAnnonces as $oAnnonce ): ?>
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
                <?php if( $oPager->getPage() != $oPager->getPreviousPage() ): ?>
                <span class="nohistory"><a href="<?php echo url_for( $url ); ?>&p=<?php echo $oPager->getPreviousPage(); ?>">« Page précédente</a></span>
            	&nbsp;&nbsp;
                <?php endif; ?>
            	<?php foreach( $oPager->getLinks() as $oPage ): ?>
            	<?php if( $oPage == $oPager->getPage() ): ?>
                <span class="bold">[<?php echo $oPage; ?>]</span>
                <?php else: ?>
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>&p=<?php echo $oPage ?>"><?php echo $oPage; ?></a></span>
                <?php endif; ?>
            	<?php endforeach; ?>
                <?php if( $oPager->getPage() != $oPager->getNextPage() ): ?>
                &nbsp;&nbsp;
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>&p=<?php echo $oPager->getNextPage() ?>">Page suivante »</a></span>
            	<?php endif; ?>
            </div>
            <div id="result_right">
                <span class="nohistory"><a href="<?php echo url_for( $url ) ?>&p=<?php echo $oPager->getLastPage() ?>">Dernière page</a></span>
            </div>
        </div>
<?php endif; ?>
</div>