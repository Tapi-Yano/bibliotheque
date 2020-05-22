<?php
session_start();
include 'application/connexion_bdd.php';

// requete pour récuperer tout les reservation faites par les membres
$query = '
    SELECT *,
    DATE_FORMAT(date_reservation, "%d/%m/%Y") AS date_fr
    FROM Reservation
    JOIN membres ON Reservation.id_membres = membres.id;
';
$result = $pdo->query($query);
$admin_list_resa = $result->fetchAll();
//var_dump($admin_list_resa);


$template= 'admin_list_resa';
include 'layout.phtml';