<?php
session_start();
include 'application/connexion_bdd.php';

// requête qui permet d'afficher les livres par auteur
$query=$pdo->prepare('
    SELECT *,
    Personne.nom,
    Personne.prenom
    FROM Livre
    JOIN Auteur ON Livre.isbn = Auteur.idLivre
    JOIN Personne ON Auteur.idPersonne = Personne.id
    JOIN Editeur ON Livre.editeur = Editeur.id
    WHERE Personne.nom = ?
    ORDER BY Livre.titre;

');
$query->execute(array($_POST['auteur']));
$auteurLivres = $query->fetchAll();


$template = 'auteurLivres';
include 'layout.phtml';