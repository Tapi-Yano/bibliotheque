<?php
include 'application/connexion_bdd.php';

$query='
    SELECT *
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    ORDER BY titre ';
$resultat = $pdo->query($query);
$listeLivres = $resultat->fetchAll();
//var_dump($listeLivres);


$template = 'admin';
include 'layout.phtml';
