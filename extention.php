<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger l'extension LiveCreator Filter</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header */
        header {
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: white;
            text-align: center;
            padding: 2rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .tagline {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .extension-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 3rem;
        }
        
        .extension-header {
            background: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        
        .extension-title {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .extension-version {
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .extension-content {
            padding: 2rem;
            display: flex;
            flex-wrap: wrap;
        }
        
        .extension-image {
            flex: 1;
            min-width: 300px;
            padding: 1rem;
        }
        
        .extension-image img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }
        
        .extension-details {
            flex: 1;
            min-width: 300px;
            padding: 1rem;
        }
        
        .features-list {
            margin: 1.5rem 0;
            list-style-type: none;
        }
        
        .features-list li {
            padding: 0.5rem 0;
            position: relative;
            padding-left: 2rem;
        }
        
        .features-list li:before {
            content: "✓";
            color: #6e48aa;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        
        .download-btn {
            display: inline-block;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 1rem;
            border: none;
            cursor: pointer;
        }
        
        .download-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(110, 72, 170, 0.4);
        }
        
        .download-btn i {
            margin-right: 0.5rem;
        }
        
        /* Instructions Section */
        .instructions {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-bottom: 3rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #6e48aa;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 0.5rem;
        }
        
        .steps-list {
            list-style-type: none;
            counter-reset: step-counter;
        }
        
        .steps-list li {
            counter-increment: step-counter;
            margin-bottom: 1.5rem;
            padding-left: 3.5rem;
            position: relative;
        }
        
        .steps-list li:before {
            content: counter(step-counter);
            position: absolute;
            left: 0;
            top: 0;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: white;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        
        .footer-links a {
            color: #bbb;
            margin: 0 1rem;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .copyright {
            opacity: 0.7;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .extension-content {
                flex-direction: column;
            }
            
            .extension-image, .extension-details {
                min-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">LiveCreator Filter</div>
        <div class="tagline">Une extension pour filtrer les messages indésirables sur LiveCreator.com</div>
    </header>
    
    <div class="container">
        <div class="extension-card">
            <div class="extension-header">
                <h1 class="extension-title">Extension LiveCreator Filter</h1>
                <div class="extension-version">Version 1.0.0</div>
            </div>
            <div class="extension-content">
                <div class="extension-image">
                    <img src="https://via.placeholder.com/600x400/6e48aa/ffffff?text=LiveCreator+Filter" alt="Capture d'écran de l'extension">
                </div>
                <div class="extension-details">
                    <p>Cette extension vous permet de filtrer les messages indésirables sur LiveCreator.com selon vos critères personnalisés.</p>
                    
                    <h3>Fonctionnalités :</h3>
                    <ul class="features-list">
                        <li>Filtrage des messages contenant des mots-clés indésirables</li>
                        <li>Liste noire personnalisable</li>
                        <li>Options de filtrage avancées</li>
                        <li>Interface intuitive et facile à utiliser</li>
                        <li>Compatibilité avec tous les navigateurs modernes</li>
                        <li>Mises à jour régulières</li>
                    </ul>
                    
                    <a href="./chat-filter-extension.zip" class="download-btn" id="downloadButton">
                        <i class="fas fa-download"></i> Télécharger maintenant
                    </a>
                </div>
            </div>
        </div>
        
        <div class="instructions">
            <h2 class="section-title">Comment installer l'extension</h2>
            <ul class="steps-list">
                <li>Téléchargez le fichier ZIP de l'extension en cliquant sur le bouton ci-dessus.</li>
                <li>Extrayez le contenu du fichier ZIP dans un dossier de votre choix.</li>
                <li>Ouvrez votre navigateur et accédez à la page des extensions (chrome://extensions pour Chrome).</li>
                <li>Activez le "Mode développeur" en haut à droite de la page.</li>
                <li>Cliquez sur "Charger l'extension non empaquetée" et sélectionnez le dossier extrait.</li>
                <li>L'extension est maintenant installée et prête à être utilisée sur LiveCreator.com!</li>
            </ul>
        </div>
    </div>
    
    <footer>
        <div class="footer-links">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Conditions d'utilisation</a>
            <a href="#">Support</a>
            <a href="#">Contact</a>
        </div>
        <div class="copyright">
            &copy; 2023 LiveCreator Filter. Tous droits réservés.
        </div>
    </footer>
    
    <script>

    </script>
</body>
</html>
