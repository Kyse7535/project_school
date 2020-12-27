<?php session_start(); ?>
<?php
require("./controller/controller.php");

try {
    if (isset($_POST["username"]) && isset($_POST['mdp'])) {
        $username = htmlspecialchars($_POST['username']);
        $mdp = htmlspecialchars($_POST['mdp']);
        if (!isset($_SESSION["username"]) && !isset($_SESSION["mdp"])) {
            $_SESSION["username"] = $username;
            $_SESSION["mdp"] = $mdp;
        }
        CtlMdp($username, $mdp);
    }
    elseif (isset($_POST["motif"])) {
        $motif = htmlspecialchars($_POST["motif"]);
        if ($motif == "getModifier") {
            $numEtudiant = htmlspecialchars($_POST["numEtudiant"]);
            CtlgetModifier($numEtudiant);
        }
        elseif ($motif == "getSynthese") {
            $numEtudiant = htmlspecialchars($_POST["numEtudiant"]);
            CtlgetSynthese($numEtudiant);
        }
        elseif ($_POST["motif"] == "setModifier"){
        $tab = CtlTab($_POST);
        CtlsetModifier($tab);
        CtlgetSynthese($tab["numEtudiant"]);
        } 
        elseif ($_POST["motif"] == "enregistrer") {
        $tab = CtlTab($_POST);
        CtlEnregistrer($tab);
        CtlgetSynthese($tab["numEtudiant"]);
        }
        elseif ($motif == "getPaiement") {
            $numEtudiant = htmlspecialchars($_POST['numEtudiant']);
            CtlPaiement($numEtudiant);
        }
        elseif ($motif == "setPaiement") {
         $tab = CtlsetPaiement($_POST);   
        }
        /*
        elseif ($motif == 'getRDV') {
            CtlRDV($numEtudiant);
        }*/
    }
    elseif (isset($_GET["motif"])) {
        if ($_GET["motif"] == "getSaisir")
            CtlgetSaisir();
        elseif( isset($_SESSION["username"]) && $_GET["motif"] == $_SESSION["username"]) 
            require_once("./vue/agent.php");
        elseif ($_GET["motif"] == "accueil") 
            CtlAccueil();
    }
    else {
        CtlAccueil();
    }
} catch (Exception $e) {
    die('Erreur' . $e->getMessage());
}