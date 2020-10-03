<?php
session_start();
include 'application/connexion_bdd.php';

// requête qui permet d'afficher les livres par annee
$query=$pdo->prepare('
    SELECT *
    FROM Livre
    JOIN Editeur ON Livre.editeur = Editeur.id
    WHERE annee = ?
    ORDER BY titre;

');
if(isset($_POST['annee'])){
    $annee = $_POST['annee'];
}
$query->execute(array($annee));/* récuperation via le formulaire de l'annee rentrer */ 
$anneeLivres = $query->fetchAll();
$message_erreur = "<p style='text-align: center;background-color: red;color: white;padding: 2%;'>Désolé aucun livre de la bibliothèque n'a été publié cette année là</p>";
$message_valider = "<p style='text-align: center;background-color: green;color: white;padding: 2%;'>Livre trouvé</p>";
// var_dump($anneeLivres[0]['annee']);
foreach($anneeLivres as $liste){
    if($_POST['annee'] != $liste['annee']){
        echo $message_erreur;
        // header('Location: anneeLivres.php');   
    }else{
        echo $message_valider;
    }
}



$template = 'anneeLivres';
include 'layout.phtml';