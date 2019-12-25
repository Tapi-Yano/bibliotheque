<?php
// connexion à la base de données
include 'application/connexion_bdd.php';
// requête pour afficher tout le détails du livre selectionner
$query = $pdo->prepare('
    SELECT *,
        Editeur.libelle AS nomEditeur,
        Langue.libelle AS langue,
        Role.libelle AS role
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    JOIN Auteur ON Livre.isbn = Auteur.idLivre
    JOIN Personne ON Auteur.idPersonne = Personne.id
    JOIN Role ON Auteur.idRole = Role.id
    JOIN Langue ON Livre.langue = Langue.id
    WHERE isbn=?;

');

$query->execute(array($_GET['Id']));
$detailsLivres = $query->fetchAll();
// var_dump($detailsLivres);

$template = 'detailsLivres';
include 'index.phtml';