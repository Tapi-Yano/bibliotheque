<?php
include 'application/connexion_bdd.php';

// requête qui permet d'afficher les livres par annee
$query=$pdo->prepare('
    SELECT *
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    WHERE annee = ?
    ORDER BY titre;

');
$query->execute(array($_POST['annee']));/* récuperation via le formulaire de l'annee rentrer */ 
$anneeLivres = $query->fetchAll();



$template = 'anneeLivres';
include 'layout.phtml';