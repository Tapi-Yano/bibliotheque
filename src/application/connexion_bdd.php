<?php
try{
    $pdo = new PDO('mysql:host=localhost;port=3308;dbname=tp6','root','', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]); 
    # sert à faire le lien entre ma base de données et mon fichier  
    # sert à renseigner et executer la base données
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage($message));
}