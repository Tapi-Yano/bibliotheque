<?php
session_start();
include 'application/connexion_bdd.php';


// requêt pour afficher tout les langues
$query1='
    SELECT *
    FROM Langue
';
$langues = $pdo->query($query1)->fetchAll();
//var_dump($langues);
// requête pour ajouter un nouveau livre
if(isset($_POST['langue'])){
    $query = $pdo->prepare('
    INSERT INTO Langue (libelle)
    Values(?)
');

$query->execute(array($_POST['langue']));
}


$template = 'nouvelleLangue';
include 'layout.phtml';