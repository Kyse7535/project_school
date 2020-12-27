<?php $title = "Saisir";?>
<?php ob_start(); ?>

<header>
    <h1> <a href="index.php?motif=<?= $_SESSION['username'] ?>">Universite HMK</a> </h1>
</header>
<main>
    <div class="etudiant">
        <h3>Saisir information etudiant</h3>
        <form action="index.php" method="POST">

            <table>
                <tr>
                    <th>NumEtudiant</th>
                    <td><input type="text" required name="numEtudiant"></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><input type="text" required name="nom"></td>
                </tr>
                <tr>
                    <th>Prenom</th>
                    <td><input type="text" required name="prenom"></td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td><input type="text" required name="adresse"></td>
                </tr>
                <tr>
                    <th>NumTel</th>
                    <td><input type="text" required name="numtel"></td>
                </tr>
                <tr>
                    <th>Mail</th>
                    <td><input type="text" required name="mail"></td>
                </tr>
                <tr>
                    <th>Situation sociale</th>
                    <td><input type="text" required name="situation"></td>
                </tr>
                <tr>
                    <th>Revenu parent</th>
                    <td><input type="text" required name="revenu"></td>
                </tr>
                <tr>
                    <th>Plafond diff</th>
                    <td><input type="text" required name="plafond_diff"></td>
                </tr>
                <tr>
                    <th>Diff total</th>
                    <td><input type="text" required name="diff_total"></td>
                </tr>
                <input type="hidden" name="motif" value="enregistrer">
            </table>
            <input type="submit" value="valider">
        </form>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php require('./vue/gabarit.php'); ?>