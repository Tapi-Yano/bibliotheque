<?php
// connexion avec la base de données
include 'application/connexion_bdd.php';

$query='
    SELECT *
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    ORDER BY titre;

';

$resultat = $pdo->query($query);
$listes_Livres = $resultat->fetchAll();
// var_dump($listes_Livres);


$template = 'listesLivres';
include 'index.phtml';