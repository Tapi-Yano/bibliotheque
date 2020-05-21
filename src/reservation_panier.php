<?php
session_start();
include 'application/connexion_bdd.php';

// on récupère l'id du membre connecté
if(isset($_SESSION['connexion'])){
    
    // requete pour recuperer les informations du membre
    $query = $pdo->prepare('
        SELECT *
        FROM membres
        WHERE id=?;

    ');
    $query->execute(array($_SESSION['id']));
    $info_membres = $query->fetch();
    var_dump($_SESSION['id']);
}


// requete pour recuperer les informations par rapport au livre reservé
$query1 = $pdo->prepare('
    SELECT *
    FROM Livre
    WHERE isbn=?;

');
$query1->execute(array($_GET['Id']));
$livre_resa = $query1->fetch();
var_dump($livre_resa['titre']);

// ajout d'un livre en reservation
$query2 = $pdo->prepare('
    INSERT INTO Reservation (isbn_livre, titre_livre_resa, date_reservation, id_membres)
    VALUES (?, ?, NOW(), ?)
');
$query2->execute(array($_GET['Id'], $livre_resa['titre'],$_SESSION['id']));
echo'<p style="background-color: green; text-align: center; height: 40px; padding-top: 7px; color: white;"> livre ajouté à liste de réservation </p>';
var_dump($query2);

// on récupère le contenu de la table de reservation

$query3 = $pdo->prepare('
    SELECT *,
    DATE_FORMAT(date_reservation, "%d/%m/%Y") AS date_fr
    FROM Reservation
    WHERE id_membres=?;
');
$query3->execute(array($_SESSION['id']));
$liste_resa = $query3->fetchAll();
var_dump($liste_resa);

$template = 'reservation_panier';
include 'layout.phtml';