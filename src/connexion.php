<?php
session_start();
include 'application/connexion_bdd.php';

// recupération des information d'un membre inscrit
$query = $pdo->prepare('
    SELECT *
    FROM membres
    WHERE email = ?
');
$query->execute(array($_POST['mail']));
$informationM = $query->fetch();
//var_dump($informationM);
    if($_POST['mdp'] == $informationM['mot_de_passe']){
        $_SESSION['connexion'] == TRUE;
        $_SESSION['nom'] = $informationM['nom'];
        $_SESSION['prenom'] = $informationM['prenom'];
        $_SESSION['admin'] = $informationM['admin'];
        //var_dump($_SESSION);
        
    }else{
        echo '<p style="display: block; 
        background-color: #80ff80; 
        height: 50px; 
        padding: 3%; 
        text-align: center;
        font-size: 2em;"><b>mot de passe incorrect!</b></p>';
    }



$template = 'connexion';
include 'layout.phtml';
