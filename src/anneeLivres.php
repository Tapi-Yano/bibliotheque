<?php
include 'application/connexion_bdd.php';

// requête qui permet d'afficher les livres par annee
$query=$pdo->prepare('
    SELECT *
    FROM Livre
    WHERE annee = ?
    ORDER BY titre;

');
$query->execute(array($_POST['annee']));
$anneeLivres = $query->fetchAll();



$template = 'anneeLivres';
include 'layout.phtml';