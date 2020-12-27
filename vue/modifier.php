<?php $title = "Agent";?>
<?php ob_start(); ?>

<header>
    <h1> <a href="index.php?motif=<?= $_SESSION['username'] ?>">Universite HMK</a> </h1>
</header>
<main>
    <?php $rowCount = $resultat->rowCount();
    if ($rowCount == 0) {
    ?>
    <div class="reponse">
        <h2>Aucun etudiant trouvé</h2>
        <p> <a href="index.php?motif=getSaisir">Cliquez ici</a> pour saisir un etudiant</p>
    </div>
    <?php
    }
    else {
        $donnees = $resultat->fetch();
     ?>
    <div class="etudiant">
        <h3>Information etudiant n° <?= $donnees["ID_ETUD"] ?></h3>
        <form action="index.php" method="POST">
            <table>
                <tr>
                    <th>NumEtudiant</th>
                    <td><input type="text" name="numEtudiant" value="<?= $donnees["ID_ETUD"] ?>"></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><input type="text" name="nom" value="<?= $donnees["NOM"] ?>"></td>
                </tr>
                <tr>
                    <th>Prenom</th>
                    <td><input type="text" name="prenom" value="<?= $donnees["PRENOM"] ?>"></td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td><input type="text" name="adresse" value="<?= $donnees["ADRESSE"] ?>"></td>
                </tr>
                <tr>
                    <th>NumTel</th>
                    <td><input type="text" name="numtel" value="<?= $donnees["NUMTEL"] ?>"></td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td><input type="text" name="mail" value="<?= $donnees["MAIL"] ?>"></td>
                </tr>
                <tr>
                    <th>Situation sociale</th>
                    <td><input type="text" name="situation" value="<?= $donnees["SITUATION"] ?>"></td>
                </tr>
                <tr>
                    <th>Revenu parent</th>
                    <td><input type="text" name="revenu" value="<?= $donnees["REVENU_PARENT"] ?>"></td>
                </tr>
                <tr>
                    <th>Plafond diff</th>
                    <td><input type="text" name="plafond_diff" value="<?= $donnees["PLAFOND_DIFF"] ?>"></td>
                </tr>
                <tr>
                    <th>Diff total</th>
                    <td><input type="text" name="diff_total" value="<?= $donnees["DIFF_TOTAL"] ?>"></td>
                </tr>
                <input type="hidden" value="setModifier" name="motif">
            </table>
            <input type="submit" value="valider">
        </form>
    </div>
    <?php } ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require_once('./vue/gabarit.php');