<?php

function connexion()
{
$base = new PDO("mysql:host = 127.0.0.1;dbname=MLR2", "kisseime", "boMk68QT8A8zGULs");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $base;
}


function getEtudiant($numEtudiant, $base) {
    $sql = "select * from ETUDIANT where ID_ETUD = ?;";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($numEtudiant));
    return $resultat;
}

function setNewEtudiant($tab, $base) {
    $sql = "insert into ETUDIANT(ID_ETUD, NOM, PRENOM, ADRESSE, NUMTEL, MAIL, SITUATION, REVENU_PARENT, PLAFOND_DIFF, DIFF_TOTAL) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($tab["numEtudiant"], $tab["nom"], $tab["prenom"], $tab["adresse"], $tab["numtel"], $tab["mail"], $tab["situation"], $tab["revenu"], $tab["plafond_diff"], $tab["diff_total"]));
}

function setEtudiant($tab, $base) {
    $sql = "update ETUDIANT set NOM = ?, PRENOM = ?, ADRESSE = ?, NUMTEL = ?, MAIL = ?, SITUATION = ?, REVENU_PARENT = ?, PLAFOND_DIFF = ?, DIFF_TOTAL = ? where ID_ETUD = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array( $tab["nom"], $tab["prenom"], $tab["adresse"], $tab["numtel"], $tab["mail"], $tab["situation"], $tab["revenu"], $tab["plafond_diff"] , $tab["diff_total"], $tab["numEtudiant"]));
}

function getMdp($username, $mdp, $base) {
    $sql = "select * from CATEGORIE where LOGIN = ? and MDP = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($username, $mdp));
    return $resultat;
}

function getPaiement($numEtudiant, $base) {
   $sql = "select * from RDV natural join ETUDIANT natural join SERVICE where ID_ETUD = ? and ETAT_PAIE <> ?  order by DATE_RDV DESC";
   $resultat = $base->prepare($sql);
   $resultat->execute(array($numEtudiant, "paye"));
   return $resultat;
}

function countDiffere($numEtudiant, $base) {
    $sql = "select SUM(PRIX_SRV) as somme_differe from RDV natural join ETUDIANT natural join SERVICE where ID_ETUD = ? and ETAT_PAIE = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($numEtudiant, "differe"));
    return $resultat;
}
?>