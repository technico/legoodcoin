<?php use_helper('Date') ?>
<div id="listing">
<?php if( count( $aAnnonces ) === 0 ): ?>
Aucun résultat
<?php else: ?>
	<form method="GET" action="<?php echo url_for( 'listing/index' ); ?>">
        <div id="search">
            <span>
                <input type="text" maxlength="30" size="30" name="t" value="<?php echo $sTitre; ?>" />
                <select name="c"><?php include_partial( 'categories' ); ?></select>
                <select name="r"><?php include_partial( 'regions' ); ?></select>
                <input type="submit" value="Chercher" />
            </span>
            <div>
                <label><input name="ut" type="checkbox" value="1" style="margin-left: 0;"/>Recherche dans le titre uniquement</label>
            </div>
            <div>
                <label>Code postal&nbsp;:&nbsp;<input name="cp" type="text" maxlength="8" size="8" value="ex:75001" style="color:#999999"/></label>
            </div>

        </div>
	</form>     

        <div id="tabarea">
            <ul id="tabnav">
                <li class="tab_all">
                    <span class="bold">Toutes</span> <?php echo $oPager->getFirstIndice();?> - <?php echo $oPager->getLastIndice(); ?> de <span class="bold"><?php echo $oPager->getNbResults(); ?></span>
                </li>
                <li class="tab_private">
                    <a href="?f=p" title="Afficher uniquement les annonces de particuliers">Particulier<span class="tab_right_links">, 1453808</span></a>
                </li>
                <li class="tab_company">
                    <a href="?f=c" title="Afficher uniquement les annonces de professionnels">Professionnel<span class="tab_right_links">, 118276</span></a>
                </li>
                <li class="tab_right">
                    <a href="?th=0" title="Cacher les photos">Cacher les photos</a>
                    <span style="display: inline;" id="price_container">
                        &nbsp;|&nbsp;
                        <a href=?sp=1" title="Trier les annonces par prix">Trier par prix</a>
                    </span>
                </li>
            </ul>
        </div>

        <table cellspacing="0" cellpadding="0" border="0" style="float: left; width: 728px;" id="hl" class="listing">
            <tbody>
            	<?php foreach( $aAnnonces as $oAnnonce ): ?>
                <tr>
                    <td nowrap="nowrap" width="80px"><?php echo $oAnnonce->getDateMiseEnLigne(); ?></td>
                    <td><?php echo $oAnnonce->getHeureMiseEnLigne(); ?></td>
                    <td><img alt="" class="j" src="/images/0_extra.gif" /></td>
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
                <span class="nohistory"><a href="<?php echo url_for( 'listing/index' ); ?>?p=<?php echo $oPager->getPreviousPage(); ?>&t=<?php echo $sTitre; ?>">« Page précédente</a></span>
            	&nbsp;&nbsp;
                <?php endif; ?>
            	<?php foreach( $oPager->getLinks() as $oPage ): ?>
            	<?php if( $oPage == $oPager->getPage() ): ?>
                <span class="bold">[<?php echo $oPage; ?>]</span>
                <?php else:?>
                <span class="nohistory"><a href="<?php echo url_for( 'listing/index' ); ?>?p=<?php echo $oPage; ?>&t=<?php echo $sTitre; ?>"><?php echo $oPage; ?></a></span>
                <?php endif;?>
            	<?php endforeach; ?>
                <?php if( $oPager->getPage() != $oPager->getNextPage() ): ?>
                &nbsp;&nbsp;
                <span class="nohistory"><a href="<?php echo url_for( 'listing/index' ); ?>?p=<?php echo $oPager->getNextPage(); ?>&t=<?php echo $sTitre; ?>">Page suivante »</a></span>
            	<?php endif; ?>
            </div>
            <div id="result_right">
                <span class="nohistory"><a href="<?php echo url_for( 'listing/index' ); ?>?p=<?php echo $oPager->getLastPage(); ?>&t=<?php echo $sTitre; ?>">Dernière page</a></span>
            </div>
        </div>
<?php endif; ?>
</div>

