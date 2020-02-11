<?php
session_start();
include 'application/connexion_bdd.php';

// requête pour inserer des nouveaux utilisateurs
if(empty($_POST)){

    $template = 'inscription';
    include 'layout.phtml';
}else{
    $query = $pdo->prepare('
    INSERT INTO membres (nom, prenom, email, mot_de_passe, admin)
    VALUES (?,?,?,?,0)
    ');

    $membres = $query->execute(array($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp']));
    header('location: connexion.php');
}


