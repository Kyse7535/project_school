<?php while($donnees = $resultat->fetch()){?>
<tr>
    <td><?= $donnees["NOM_SRV"] ?></td>
    <td><?= $donnees["PRIX_SRV"] ?></td>
    <?php if ($donnees["ETAT_PAIE"] == "attente") {
                ?>
    <td><input type="checkbox" name="attente" value="attente" id="<?= $donnees["ID_RDV"] . "_" ?>attente" checked>
    </td>
    <?php } else {
                    ?>
    <td><input type="checkbox" name="attente" value="attente" id="<?= $donnees["ID_RDV"] . "_" ?>attente">
    </td>
    <?php
                }
                if ($donnees["ETAT_PAIE"] == "differe") {
                    ?>
    <td><input type="checkbox" name="differe" value="differe" id="<?= $donnees["ID_RDV"] . "_" ?>differe" checked>
    </td>
    <?php
                }
                else {
                    ?>
    <td><input type="checkbox" name="differe" value="differe" id="<?= $donnees["ID_RDV"] . "_" ?>differe">
    </td>
    <?php
                }
                if ($donnees["ETAT_PAIE"] == "paye") {
                    ?>
    <td><input type="checkbox" name="paye" value="paye" id="<?= $donnees["ID_RDV"] . "_" ?>paye" checked>
    </td>
    <?php
                }
                else {
                    ?>
    <td><input type="checkbox" name="paye" value="paye" id="<?= $donnees["ID_RDV"] . "_" ?>paye"></td>
    <?php
                }
                ?>
</tr>
<?php } ?>