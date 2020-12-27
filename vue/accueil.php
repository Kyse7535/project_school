<?php $title = "accueil"; ?>
<?php ob_start(); ?>

<header>
    <h1> <a href="index.php?motif=accueil">Universite HMK</a> </h1>
</header>
<main>
    <div class="formulaire">
        <h3>Veuillez saisir vos Identifiants</h3>
        <form action="index.php" method="POST">
            <label for="id">Identifiant</label>
            <input type="text" id="id" name="username" placeholder="saisir votre username" required>
            <label for="mdp">Mode de passe</label>
            <input type="password" id="mdp" name="mdp" placeholder="saisir votre mot de passe" required>
            <input type="submit" value="valider">
        </form>
        <?php
        if (isset($msg) && $msg == 1) {
            echo "<h3>Login ou mot de passe incorect</h3>";
        }
         ?>
    </div>
</main>
<?php
 $content = ob_get_clean();
 require_once('./vue/gabarit.php');
  ?>