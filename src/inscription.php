<?php session_start();
include 'application/connexion_bdd.php';

// requête pour inserer des nouveaux utilisateurs
if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp'])){
    echo '<p style="display: block;
        background-color: green;
        padding: 3%"><b>Veuillez remplir tout le formulaire !!</b></p>';
}else{
    $query = $pdo->prepare('
    INSERT INTO membres (nom, prenom, email, mot_de_passe, admin)
    VALUES (?,?,?,?,0)
    ');

    $membres = $query->execute(array($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp']));
    header('location: connexion.php');
}

$template = 'inscription';
include 'layout.phtml';


