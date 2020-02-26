<?php 
session_start();
include 'application/connexion_bdd.php';
 
// requête pour effacer un livre de la base de données
$query = $pdo->prepare('
    DELETE
    FROM Livre
    WHERE Livre.isbn = ?
    ');
$query->execute(array($_GET['Id']));

header('location: listesLivres.php');
exit();