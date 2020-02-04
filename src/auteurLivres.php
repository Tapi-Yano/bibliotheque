<?php
include 'application/connexion_bdd.php';

// requête qui permet d'afficher les livres par auteur
$query=$pdo->prepare('
    SELECT *,
    Personne.nom,
    Personne.prenom
    FROM Livre
    JOIN Auteur ON Livre.isbn = Auteur.idLivre
    JOIN Personne ON Auteur.idPersonne = Personne.id
    WHERE Personne.nom = ?
    ORDER BY Livre.titre;

');
$query->execute(array($_POST['auteur']));
$auteurLivres = $query->fetchAll();

print_r($auteurLivres);

$template = 'auteurLivres';
include 'layout.phtml';