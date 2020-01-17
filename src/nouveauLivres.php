<?php

// connexion bdd
include 'application/connexion_bdd.php';
if(empty($_POST)){


    $query='
        SELECT *
        FROM Editeur ';
    $editeur= $pdo->query($query);
    $resultEditeur= $editeur->fetchALL();

    $query1='
        SELECT *
        FROM Genre ';
    $genre= $pdo->query($query1);
    $resultGenre= $genre->fetchALL();

    $query2 = $pdo->query('
        SELECT *
        FROM Langue ');
    $resultLangue = $query2->fetchALL();   

    $template='nouveauLivres';
    include 'index.phtml';
}else{


    $query3 = $pdo->prepare('
        INSERT INTO Livre (isbn , titre, editeur, annee, genre, langue, nbpages)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ');

    $query3->execute(array($_POST['isbn'], $_POST['titre'], $_POST['editeur'], $_POST['annee'], $_POST['genre'], $_POST['langue'], $_POST['nbpages']));
   
    header('Location: listesLivres.php');

}