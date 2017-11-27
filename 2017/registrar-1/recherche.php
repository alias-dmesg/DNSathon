<?php

session_start();
require_once './connexion.inc.php';
$dispo = 0;
if (isset($_POST['nom']) && isset($_POST['topdomaine'])) {
    if (empty($_POST['nom'])) {
        $message = "Indiquez le nom de domaine svp";
    } else if (empty($_POST['topdomaine'])) {
        $message = "Indiquez le domaine de premier niveau svp";
    } else {
        $nom = $_POST['nom'] . "" . $_POST['topdomaine'];
        $_SESSION['nomdomaine'] = $nom;
        $reponse = $bdd->prepare('SELECT * FROM nom_domaine nd  WHERE nd.libelle=?');
        $reponse->execute(array($nom));
        $donnees = $reponse->fetchAll();
        if ($donnees) {
            $message = "domaine non dispo";
        } else {
            $message = "domaine dispo";
            $dispo = 1;
        }
    }
}

header("Location: index.php?message=$message&dispo=$dispo");
