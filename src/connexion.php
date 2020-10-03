<?php
session_start();
include 'application/connexion_bdd.php';

// recupération des information d'un membre inscrit
$query = $pdo->prepare('
    SELECT *
    FROM membres
    WHERE email = ?
');

if(isset($_POST['mail'])){
    $mail = $_POST['mail'];
    $query->execute(array($mail));/* récuperation via le formulaire du mail rentrer */ 
    // var_dump($annee);
}

$informationM = $query->fetch();
//var_dump($informationM);
    if(isset($_POST['mail']) && $_POST['mdp'] == $informationM['mot_de_passe']){
        $_SESSION['connexion'] = TRUE;
        $_SESSION['id'] = $informationM['id'];
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
