<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Récupération des données envoyées par Telegram
$content = file_get_contents("php://input");
error_log("🔍 Données brutes reçues : " . $content);

// 2. (Optionnel) Sauvegarde brute pour debug
file_put_contents("data.txt", $content);

// 3. Décodage JSON
$update = json_decode($content, true);
if ($update === null) {
    error_log("❌ JSON invalide !");
} else {
    error_log("✅ JSON décodé !");
}

// 4. Vérification que le message existe
if (!isset($update["message"])) {
    error_log("⛔ Aucun message dans la requête.");
    exit;
}

$message = $update["message"];
$chat_id = $message["chat"]["id"];
$text = $message["text"] ?? "";
$username = $message["from"]["username"] ?? $message["from"]["first_name"];

error_log("📩 Nouveau message reçu : $text de $username");

// 5. Connexion à la base de données
require_once 'db.php';
$pdo = getPDO();
error_log("✅ Connexion à la BDD établie");

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

$users = getUsers($pdo);
error_log("👥 Utilisateurs récupérés : " . count($users));

// 8. Gestion des commandes
if (str_starts_with($text, "/new_word")) {
    $parts = explode(" ", $text, 2);
    if (count($parts) == 2) {
        $mot = trim($parts[1]);
        $stmt = $pdo->prepare("INSERT INTO wordlist (mot) VALUES (?)");
        $stmt->execute([$mot]);
        error_log("📝 Nouveau mot ajouté : $mot");

        sendMessage($chat_id, "✅ Mot ajouté : *$mot*");
    } else {
        error_log("❌ Mauvais format pour /new_word");
        sendMessage($chat_id, "❌ Utilise la commande comme ceci : /new_word tonmot");
    }
} elseif ($text === "/list_mot") {
    $mots = getMots($pdo);
    error_log("📚 Nombre de mots : " . count($mots));

    $response = "📚 Liste des mots enregistrés :\n";
    foreach ($mots as $index => $mot) {
        $response .= ($index + 1) . ". $mot\n";
    }
    sendMessage($chat_id, $response ?: "Aucun mot enregistré.");
} elseif ($text === "/liste_user") {
    error_log("👥 Liste des utilisateurs demandée");

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
} else {
    error_log("❓ Commande inconnue : $text");
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
    $result = curl_exec($ch);
    curl_close($ch);

    error_log("📤 Message envoyé à $chat_id : " . substr($text, 0, 30) . "...");
}
?>
