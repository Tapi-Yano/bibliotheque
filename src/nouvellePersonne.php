<?php
session_start();
include 'application/connexion_bdd.php';
// requête pour afficher les auteurs présent dans la base données 

$query1='
    SELECT *
    FROM Personne';
$personnes = $pdo->query($query1)->fetchAll();
//var_dump($personnes);

// requête pour ajouter une nouvelle personne
if(isset($_POST['nom']) && isset($_POST['prenom'])){
    $query = $pdo->prepare('
    INSERT INTO Personne (nom, prenom)
    Values(?, ?)
');

$query->execute(array($_POST['nom'], $_POST['prenom']));
}


$template = 'nouvellePersonne';
include 'layout.phtml';