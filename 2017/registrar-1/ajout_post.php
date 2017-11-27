<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once './connexion.inc.php';

$typeClient = $_POST['typeClient'];
$raisonSociale = $_POST['raisonSociale'];
$tva = $_POST['tva'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$codePostal = $_POST['codePostal'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$adressEmail = $_POST['adressEmail'];
$telephone = $_POST['telephone'];

if (empty($typeClient)) {
    $message = "Le champs type client est obligatoire";
} else if (empty($raisonSociale)) {
    $message = "Le champs Raison Social est obligatoire";
} else if (empty($tva)) {
    $message = "Le champs tva  est obligatoire";
} else if (empty($nom)) {
    $message = "Le champs nom  est obligatoire";
} else if (empty($prenom)) {
    $message = "Le champs prenom  est obligatoire";
} else if (empty($adresse)) {
    $message = "Le champs adresse  est obligatoire";
} else if (empty($codePostal)) {
    $message = "Le champs code postal  est obligatoire";
} else if (empty($ville)) {
    $message = "Le champs ville est obligatoire";
} else if (empty($pays)) {
    $message = "Le champs pays  est obligatoire";
} else if (empty($adressEmail)) {
    $message = "Le champs adrese mail  est obligatoire";
} else if (empty($telephone)) {
    $message = "Le champs telephone  est obligatoire";
} else {
    $req = $bdd->prepare('INSERT INTO utilisateur(nom, prenom, email, raisonSocial, tva, adresse, codepostal, ville, pays, telephone, typeclient) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
    $req->execute(array($nom,$prenom,$adressEmail,$raisonSociale,$tva,$adresse,$codePostal,$ville,$pays,$telephone,$typeClient
    ));

    if (!$req) {
      $message = "Enregistrement échoué";
      $bool = 0;
      } else {
      $message = "Enregistrement effectué avec succès! Merci d'avoir rejoins notre ecosystème";
      $bool = 1;
      } 
}
header("Location: signup.php?message=$message&bool=$bool");
