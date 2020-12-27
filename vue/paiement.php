<?php $title = "paiement"; ?>
<?php ob_start(); ?>

<header>
    <h1> <a href="index.php?motif=<?= $_SESSION['username'] ?>">Universite HMK</a> </h1>
</header>
<main>
    <form action="index.php" method="POST" novalidate id="paiement_form">
        <table>
            <tr>
                <th>Service</th>
                <th>Prix service</th>
                <th>En attente</th>
                <th>différé</th>
                <th>Payé</th>
            </tr>
            <?php while($donnees = $resultat->fetch()){?>
            <tr>
                <td><?= $donnees["NOM_SRV"] ?></td>
                <td><?= $donnees["PRIX_SRV"] ?></td>
                <td><input type="checkbox" name="<?= $donnees["ID_RDV"] . "_" ?>attente" value="attente">
                </td>
                <td><input type="checkbox" name="<?= $donnees["ID_RDV"] . "_" ?>differe" value="differe">
                </td>
                <td><input type="checkbox" name="<?= $donnees["ID_RDV"] . "_" ?>paye" value="paye">
                </td>

                <input type="hidden" name="etat_paie" value="<?= $donnees["ETAT_PAIE"] ?>"
                    id="<?= $donnees["ID_SRV"] ?>">
            </tr>
            <?php
                if (!isset($diff_total)) {
                    $diff_total = $donnees["DIFF_TOTAL"];
                }
             ?>
            <?php } ?>
            <tr>
                <th>Differe</th>
                <td colspan=" 4"><input type="number" name="somme_differe" id="somme_differe" min="0" readonly
                        value="<?= $countDiffereValue["somme_differe"] ?>" max="<?= $diff_total?>"></td>
            </tr>
            <tr>
                <th>Differe Total</th>
                <td colspan="4"><?= $diff_total?></td>
            </tr>
            <h3 id="error_msg">Valeur differe invalide</h3>
        </table>
        <input type="hidden" name="motif" value="setPaiement">
        <td><input type="submit" value="valider" id="btn_valider"></td>
    </form>
</main>
<script src="./vue/index.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require_once("./vue/gabarit.php"); ?>