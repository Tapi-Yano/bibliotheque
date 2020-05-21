<?php
session_start();
    include 'application/connexion_bdd.php';

    if (empty($_POST))
    {
        if (!array_key_exists('Id',$_GET)) 
        {
            header('Location: listesLivres.php');
            exit();
        }
        $query='
            SELECT *
            FROM Editeur ';
        $editeur= $pdo->query($query);
        $resultEditeur = $editeur->fetchALL();

        $query1='
            SELECT *
            FROM Genre ';
        $genre= $pdo->query($query1);
        $resultGenre = $genre->fetchALL();

        $query2 = $pdo->query('
            SELECT *
            FROM Langue ');
        $resultLangue = $query2->fetchALL();

        $query3= $pdo->prepare('
            SELECT *
            FROM Livre 
            WHERE isbn = ?');
        $query3->execute(array($_GET['Id']));
        $livres = $query3->fetch();

        
        $template='modifier_livre';
        include 'layout.phtml';
    }
    else
    {
        $titre = Htmlspecialchars($_POST['titre']);
        $nomEditeur = Htmlspecialchars($_POST['editeur']);
        if(!isset($_POST['annee']) || ($_POST['annee'] < 1600 || $_POST['annee'] > 2020)){
            echo 'Veuillez rentrée une année valide pour la modification de ce livre';
        }else{
            $annee = Htmlspecialchars($_POST['annee']);
        }
        $genre = Htmlspecialchars($_POST['genre']);
        $langue = Htmlspecialchars($_POST['langue']);
        $nbpages = Htmlspecialchars($_POST['nbpages']);
        if($_POST['nbpages'] == "" || $_POST['nbpages'] == 0){
            $nbpages = NULL;
        }
        $id=$_POST['isbn'];

        $bdd=$pdo->prepare('
            UPDATE Livre 
            SET titre=?, editeur=? , annee=?, genre=?, langue=?, nbpages=?
            WHERE isbn=?
            ');
        $bdd->execute(array($titre, $nomEditeur, $annee, $genre, $langue, $nbpages, $id));
        
        echo'<p style="background-color: green; text-align: center; height: 40px; padding-top: 7px; color: white;"> livre modifié avec succès </p>';
        header('Location: admin.php');
        exit();
    }