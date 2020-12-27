<?php $title = "Agent"; ?>
<?php ob_start(); ?>


<header>
    <h1> <a href="index.php?motif=<?= $_SESSION['username'] ?>">Universite HMK</a> </h1>
</header>
<main>

    <div class="formulaire">
        <h3>Bienvenu agent !</h3>
        <form action="index.php" method="POST">
            <label for="num">saisir numEtudiant</label>
            <input type="text" name="numEtudiant" id="num" required placeholder="sasir numero Etudiant">
            <select name="motif" id="motif" required>
                <option value="">-- Choisir un motif --</option>
                <option value="getModifier">Saisir, modifier informations</option>
                <option value="getSynthese">synthèse de l'etudiant</option>
                <option value="getPaiement">effectuer un paiement</option>
                <option value="getRDV">prendre un RDV</option>
            </select>
            <input type="submit" value="Valider">
        </form>
    </div>
</main>
<?php $content = ob_get_clean(); ?>

<?php require_once('./vue/gabarit.php'); ?>