<?php 
session_start();
// connexion avec la base de données
include 'application/connexion_bdd.php';

// requête qui permet de récuperer la liste des livres
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

// requete qui permet de récuperer la liste des auteurs 
$query1 = '
    SELECT DISTINCT nom, prenom 
    FROM Personne
    JOIN Auteur ON Personne.id = Auteur.idPersonne
    JOIN Role ON Auteur.idRole = Role.id
    WHERE IdRole = 1;

';
$query1 = $pdo->query($query1);
$listes_Auteur = $query1->fetchAll();
//var_dump($listes_Auteur);

$template = 'listesLivres';
include 'layout.phtml';

