<?php

require("./modele/modele.php");
function CtlAccueil() {
    require("./vue/accueil.php");
}


$base = connexion();
function CtlMdp($username, $mdp) {
    $resultat = getMdp($username, $mdp, $GLOBALS["base"]);
    $rowCount = $resultat->rowCount();
    if ($rowCount > 0) {
        $donnees = $resultat->fetch();
        if ($donnees["NOM_CAT"] == "agent_accueil")
            require_once("./vue/agent.php");
    }
    else { 
        $msg = 1;
        require_once('./vue/accueil.php');
    }
}

function CtlgetModifier($numEtudiant) {
    $resultat = getEtudiant($numEtudiant, $GLOBALS["base"]);
    if ($resultat == false) {
        throw new Exception("Impossible de modifier etudiant");
    }
    else {
        require_once('./vue/modifier.php');
    }
}

function CtlgetSynthese($numEtudiant) {
    $resultat = getEtudiant($numEtudiant, $GLOBALS["base"]);
    if ($resultat == false) {
        throw new Exception("Impossible de modifier etudiant");
    }
    else {
        require_once('./vue/synthese.php');
    }
}

function CtlEnregistrer($tab) {
    setNewEtudiant($tab, $GLOBALS["base"]);
}

function CtlgetSaisir() {
    require_once('./vue/saisir.php');
}


function CtlTab($mytab) {
    $tab = [];
    $tab["numEtudiant"] = htmlentities($mytab['numEtudiant']);
    $tab["nom"] = htmlentities($mytab['nom']);
    $tab["prenom"] = htmlentities($mytab['prenom']);
    $tab["adresse"] = htmlentities($mytab['adresse']);
    $tab["numtel"] = htmlentities($mytab['numtel']);
    $tab["mail"] = htmlentities($mytab['mail']);
    $tab["situation"] = htmlentities($mytab['numEtudiant']);
    $tab["revenu"] = intval(htmlentities($mytab['revenu']));
    $tab["plafond_diff"] = htmlentities($mytab['plafond_diff']);
    $tab["diff_total"] = htmlentities($mytab['diff_total']);
    return $tab;
} 

function CtlsetModifier($tab) {
    setEtudiant($tab, $GLOBALS["base"]);
}

function CtlPaiement($numEtudiant) {
    $resultat = getPaiement($numEtudiant, $GLOBALS["base"]);
    $resultat1 = countDiffere($numEtudiant, $GLOBALS["base"]);
    if ($resultat == false || $resultat1 == false) {
        throw new Exception("Erreur affichage paiement");
    }
    else {
        $countDiffereValue = $resultat1->fetch();
        if ($countDiffereValue["somme_differe"] == NULL) {
            $countDiffereValue["somme_differe"] = 0;
        }
        require_once("./vue/paiement.php");
    }
}

function CtlsetPaiement($tab) {
    
}
?>