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

// 5. Chargement des fichiers de "base de données"
$mots_file = "mots.json";
$users_file = "users.json";

if (!file_exists($mots_file)) file_put_contents($mots_file, json_encode([]));
if (!file_exists($users_file)) file_put_contents($users_file, json_encode([]));

$mots = json_decode(file_get_contents($mots_file), true);
$users = json_decode(file_get_contents($users_file), true);

// 6. Enregistrement de l'utilisateur
if (!in_array($username, $users)) {
    $users[] = $username;
    file_put_contents($users_file, json_encode($users));
}

// 7. Gestion des commandes
if (str_starts_with($text, "/new_word")) {
    $parts = explode(" ", $text, 2);
    if (count($parts) == 2) {
        $mot = trim($parts[1]);
        $mots[] = $mot;
        file_put_contents($mots_file, json_encode($mots));
        sendMessage($chat_id, "✅ Mot ajouté : *$mot*");
    } else {
        sendMessage($chat_id, "❌ Utilise la commande comme ceci : /new_word tonmot");
    }
} elseif ($text === "/list_mot") {
    $response = "📚 Liste des mots enregistrés :\n";
    foreach ($mots as $index => $mot) {
        $response .= ($index + 1) . ". $mot\n";
    }
    sendMessage($chat_id, $response ?: "Aucun mot enregistré.");
} elseif ($text === "/liste_user") {
    $response = "👥 Utilisateurs :\n";
    foreach ($users as $index => $user) {
        $response .= ($index + 1) . ". @$user\n";
    }
    sendMessage($chat_id, $response ?: "Aucun utilisateur encore.");
} else {
    sendMessage($chat_id, "Commande non reconnue. Essaie :\n/new_word mot\n/list_mot\n/liste_user");
}

// 8. Fonction pour envoyer un message Telegram
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