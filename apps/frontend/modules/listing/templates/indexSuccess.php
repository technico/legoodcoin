<?php use_helper('Date') ?>
<div id="listing">
<?php if( count( $aAnnonces ) === 0 ): ?>
Aucun résultat
<?php else: ?>
        <div id="search">
            <span>
                <input type="text" maxlength="30" size="30" />
                <select><?php include 'options-1.php'; ?></select>
                <select><?php include 'options-2.php'; ?></select>
                <input type="submit" value="Chercher" />
            </span>
            <div>
                <label><input type="checkbox" value="1" style="margin-left: 0;"/>Recherche dans le titre uniquement</label>
            </div>
            <div>
                <label>Code postal&nbsp;:&nbsp;<input type="text" maxlength="8" size="8" value="ex:75001" style="color:#999999"/></label>
            </div>
        </div>

        <div id="tabarea">
            <ul id="tabnav">
                <li class="tab_all">
                    <span class="bold">Toutes</span> 1 - 50 de <span class="bold">1572084</span>
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
                    <td nowrap="nowrap"><?php echo $oAnnonce->getDateMiseEnLigne(); ?></td>
                    <td><?php echo $oAnnonce->getHeureMiseEnLigne(); ?></td>
                    <td>&nbsp;</td>
                    <td><img alt="" class="j" src="/images/0_extra.gif" /></td>
                    <td nowrap="nowrap">
                        <a href="?ca=12_s"><?php echo $oAnnonce->getTitre(); ?></a><br/>
                        <span style="font-size: 11px;"><?php echo $oAnnonce->getPrix(); ?>&nbsp;€</span></td>
                    <td style="white-space: nowrap; font-size: 11px;"><span style="white-space: nowrap;"><?php echo ucfirst($oAnnonce->getCategorie()); ?></span> Offres <br/>
		        <?php echo ucfirst($oAnnonce->getDepartement()); ?>
                        <br/>Puteaux</td>
                </tr>
                <?php endforeach; ?>
                <!--
                <tr>
                    <td nowrap="nowrap">Aujourd'hui</td>
                    <td>15:56</td>
                    <td>&nbsp;</td>
                    <td><img alt="" class="j" src="img/0_extra.gif" /></td>
                    <td nowrap="nowrap"><a href="?ca=12_s">Amplificateur Wifly-City Neuf Wireless</a>
                        <br/><span style="font-size: 11px;">10&nbsp;€</span></td>
                    <td style="white-space: nowrap; font-size: 11px;"><span style="white-space: nowrap;">Informatique</span> Offres
                        <br/>Paris
                        <br/>Paris</td>
                </tr>
                -->
            </tbody>
        </table>
        <div style="clear: left;" id="resultcontainer">
            <div id="result_left">
                <span class="bold">[1]</span>
                <span class="nohistory"><a href="?o=2&amp;th=0">2</a></span>
                <span class="nohistory"><a href="?o=3&amp;th=0">3</a></span>
                <span class="nohistory"><a href="?o=4&amp;th=0">4</a></span>
                &nbsp;&nbsp;
                <span class="nohistory"><a href="?o=2&amp;th=0">Page suivante &gt;</a></span>
            </div>
            <div id="result_right">
                <span class="nohistory"><a href="?o=15727&amp;th=0">Dernière page</a></span>
            </div>
        </div>
<?php endif; ?>
</div>