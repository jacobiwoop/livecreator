<?php
// 1. Récupération des données envoyées par Telegram
$content = file_get_contents("php://input");

// 2. (Optionnel) Sauvegarde brute pour debug
file_put_contents("data.txt", $content);

// 3. Décodage JSON
$update = json_decode($content, true);

// 4. Vérification que le message existe
if (!isset($update["message"])) exit;

$message = $update["message"];
$chat_id = $message["chat"]["id"];
$text = $message["text"] ?? "";
$username = $message["from"]["username"] ?? $message["from"]["first_name"];

// 5. Connexion à la base de données
require_once 'db.php'; // Assurez-vous que vous avez une fonction getPDO() pour la connexion à la BDD
$pdo = getPDO(); // Connexion à la base de données

// 6. Récupérer les utilisateurs depuis la BDD
function getUsers($pdo) {
    $stmt = $pdo->query("SELECT id, pseudo, ban_by_user, conn_time FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer les mots depuis la BDD
function getMots($pdo) {
    $stmt = $pdo->query("SELECT mot FROM wordlist");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// 7. Enregistrement de l'utilisateur (ajout dans la table `users`)


// Enregistrer l'utilisateur si ce n'est pas déjà fait
$users = getUsers($pdo); // Récupérer tous les utilisateurs depuis la BDD


// 8. Gestion des commandes
if (str_starts_with($text, "/new_word")) {
    $parts = explode(" ", $text, 2);
    if (count($parts) == 2) {
        $mot = trim($parts[1]);

        // Ajouter le mot à la base de données
        $stmt = $pdo->prepare("INSERT INTO wordlist (mot) VALUES (?)");
        $stmt->execute([$mot]);

        sendMessage($chat_id, "✅ Mot ajouté : *$mot*");
    } else {
        sendMessage($chat_id, "❌ Utilise la commande comme ceci : /new_word tonmot");
    }
} elseif ($text === "/list_mot") {
    $mots = getMots($pdo); // Récupérer les mots depuis la base de données
    $response = "📚 Liste des mots enregistrés :\n";
    foreach ($mots as $index => $mot) {
        $response .= ($index + 1) . ". $mot\n";
    }
    sendMessage($chat_id, $response ?: "Aucun mot enregistré.");
}} elseif ($text === "/liste_user") {
    if (empty($users)) {
        sendMessage($chat_id, "Aucun utilisateur trouvé.");
    } else {
        foreach ($users as $user) {
            $message = "👤 *Pseudo* : `{$user['pseudo']}`\n";
            $message .= "🚫 *Mots interdits* : `{$user['ban_by_user'] ?: 'Aucun'}`\n";
            $message .= "⏱ *Heure de connexion* : `{$user['conn_time']}`";

            sendMessage($chat_id, $message);
        }
    }
 else {
    sendMessage($chat_id, "Commande non reconnue. Essaie :\n/new_word mot\n/list_mot\n/liste_user");
}

// 9. Fonction pour envoyer un message Telegram
function sendMessage($chat_id, $text) {
    $token = "7531174156:AAHXorhCGszGYKfTOzpA-3G3f20Oe7LuDKQ";
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'Markdown'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
    curl_close($ch);
}
?>
