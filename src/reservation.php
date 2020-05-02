<?php
include 'application/connexion_bdd.php';

// ajout d'un livre en reservation
$query2 = $pdo->prepare('
    INSERT INTO Reservation (nom_livre, date_reservation, id_membres)
    VALUES (?, NOW(), ?)
');
$query2->execute(array($_POST['nomLivre'], $_POST['idMembres']));