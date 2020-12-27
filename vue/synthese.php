<?php $title = "Synthese";?>
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
    }
    ?>

    <div class="etudiant">
        <h3>Information etudiant n° <?= $donnees["ID_ETUD"] ?></h3>
        <table>
            <tr>
                <th>Nom</th>
                <td><?= $donnees["NOM"] ?></td>
            </tr>
            <tr>
                <th>Prenom</th>
                <td><?= $donnees["PRENOM"] ?></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td><?= $donnees["ADRESSE"] ?></td>
            </tr>
            <tr>
                <th>NumTel</th>
                <td><?= $donnees["NUMTEL"] ?></td>
            </tr>
            <tr>
                <th>Mail</th>
                <td><?= $donnees["MAIL"] ?></td>
            </tr>
            <tr>
                <th>Situation</th>
                <td><?= $donnees["SITUATION"] ?></td>
            </tr>
            <tr>
                <th>revenu parent</th>
                <td><?= $donnees["REVENU_PARENT"] ?></td>
            </tr>
            <tr>
                <th>Plafond diff</th>
                <td><?= $donnees["PLAFOND_DIFF"] ?></td>
            </tr>
            <tr>
                <th>Diff total</th>
                <td><?= $donnees["DIFF_TOTAL"] ?></td>
            </tr>
        </table>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require_once('./vue/gabarit.php'); ?>