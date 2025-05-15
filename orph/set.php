<?php
$filename = 'webhookurl.txt';
$message = '';

// Si un nouveau webhook est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_webhook'])) {
    $newWebhook = trim($_POST['new_webhook']);

    // Écriture du nouveau webhook dans le fichier
    if (filter_var($newWebhook, FILTER_VALIDATE_URL)) {
        file_put_contents($filename, $newWebhook);
        $message = "✅ Le webhook a été mis à jour avec succès.";
    } else {
        $message = "❌ URL invalide.";
    }
}

// Lire le contenu actuel du fichier
$currentWebhook = file_exists($filename) ? trim(file_get_contents($filename)) : 'Aucun webhook défini.';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l’URL du Webhook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f4f4f4;
        }

        h2 {
            margin-bottom: 10px;
        }

        .box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 500px;
        }

        input[type="url"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>URL Webhook actuelle :</h2>
        <p><strong><?= htmlspecialchars($currentWebhook) ?></strong></p>

        <form method="POST">
            <label for="new_webhook">Nouvelle URL :</label>
            <input type="url" id="new_webhook" name="new_webhook" required placeholder="https://example.com/webhook">
            <button type="submit">Enregistrer</button>
        </form>

        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
