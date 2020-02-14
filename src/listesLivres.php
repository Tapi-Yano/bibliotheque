<?php
// connexion avec la base de données
include 'application/connexion_bdd.php';

$query='
    SELECT *,
        Editeur.libelle AS nomEditeur,
        Genre.libelle AS nomGenre
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    JOIN Genre ON Livre.genre = Genre.id
    ORDER BY titre;

';

$resultat = $pdo->query($query);
$listes_Livres = $resultat->fetchAll();
//var_dump($listes_Livres);


$template = 'listesLivres';
include 'layout.phtml';

