<?php
session_start();
include 'application/connexion_bdd.php';

// recupération des information d'un membre inscrit test pour git
$query = $pdo->prepare('
    SELECT *
    FROM membres
    WHERE email = ?
');
$query->execute(array($_POST['mail']));
$informationM = $query->fetch();
//var_dump($informationM);
    if(isset($_POST['mail']) && $_POST['mdp'] == $informationM['mot_de_passe']){
        $_SESSION['connexion'] = TRUE;
        $_SESSION['nom'] = $informationM['nom'];
        $_SESSION['prenom'] = $informationM['prenom'];
        $_SESSION['mail'] = $informationM['email'];
        $_SESSION['admin'] = $informationM['admin'];

        header('location: listesLivres.php');
        // echo '<p style="display: block; 
        // background-color: green; 
        // height: 50px; 
        // padding: 3%; 
        // text-align: center;
        // font-size: 2em;"><b>Connecté avec succès!</b></p>';
        //var_dump($_SESSION);
        
    }else{
        if(isset($_POST['mail']) && isset($_POST['mdp']) && $_POST['mdp'] != $informationM['mdp']){
            echo '<p style="display: block; 
            background-color: red; 
            height: 50px; 
            padding: 3%; 
            text-align: center;
            font-size: 2em;"><b>mot de passe incorrect!</b></p>';
        } 
    }



$template = 'connexion';
include 'layout.phtml';
