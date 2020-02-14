<?php
session_start();
include 'application/connexion_bdd.php';


// requêt pour afficher tout les genres
$query1='
    SELECT *
    FROM Genre
';
$genres = $pdo->query($query1)->fetchAll();
//var_dump($genres['libelle']);
// requête pour ajouter un nouveau livre


if(isset($_POST['genre'])){
    $query = $pdo->prepare('
    INSERT INTO Genre (libelle)
    Values(?)
    '); 
$query->execute(array($_POST['genre']));
}



$template = 'nouveauGenre';
include 'layout.phtml';