<?php 
session_start();
include 'application/connexion_bdd.php';

// requête pour inserer des nouveaux utilisateurs
if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || empty($_POST['mdp'])){
    echo '<p style="display: block;
        background-color: green;
        padding: 3%"><b>Veuillez remplir tout le formulaire !!</b></p>';
}else{
    // variables du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    // confirmation par mail
    // Mail
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"[VOUS]"<yano.c@hotmail.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    $objet = 'Confirmation de votre inscription' ;
    $message = '
    <html>
    <head>
        <title>Vous vous êtes inscrit sur notre site ...</title>
    </head>
    <body>
        <p>Bonjour Mr/Mmme '. $nom .' '. $prenom .'</p>
        <p>blablablabla</p>
    </body>
    </html>';
                        
    //Envoi du mail
    mail($mail, $objet, $message, $header);
    var_dump(mail());

    $query = $pdo->prepare('
    INSERT INTO membres (nom, prenom, email, mot_de_passe, admin)
    VALUES (?,?,?,?,0)
    ');

    $membres = $query->execute(array($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['mdp']));
    header('location: connexion.php');
}

$template = 'inscription';
include 'layout.phtml';


