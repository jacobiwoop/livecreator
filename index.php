<?php
// 1. Récupération des données envoyées par Telegram
$content = file_get_contents("php://input");

// 2. (Optionnel) Sauvegarde brute pour debug
file_put_contents("telegram_log.txt", $content, FILE_APPEND);

// 3. Décodage JSON
$update = json_decode($content, true);
if ($update === null) {
    error_log("Erreur de décodage JSON");
    exit;
}

// 4. Vérification que le message existe
if (!isset($update["message"])) {
    exit;
}

$message = $update["message"];
$chat_id = $message["chat"]["id"];
$text = $message["text"] ?? "";
$username = $message["from"]["username"] ?? $message["from"]["first_name"];

// 5. Connexion à la base de données
try {
    require_once 'db.php';
    $pdo = getPDO();
    
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur DB: " . $e->getMessage());
    sendMessage($chat_id, "⚠️ Erreur de connexion à la base de données");
    exit;
}

// Fonctions DB
function getUsers($pdo) {
    $stmt = $pdo->query("SELECT id, pseudo, ban_by_user, conn_time FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMots($pdo) {
    $stmt = $pdo->query("SELECT id, mot FROM wordlist");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addUser($pdo, $username) {
    $stmt = $pdo->prepare("INSERT INTO users (pseudo) VALUES (?)");
    return $stmt->execute([$username]);
}

// 6. Gestion des commandes
try {
    if (str_starts_with($text, "/new_word")) {
        $parts = explode(" ", $text, 2);
        if (count($parts) == 2 && !empty(trim($parts[1]))) {
            $mot = trim($parts[1]);
            $stmt = $pdo->prepare("INSERT INTO wordlist (mot) VALUES (?)");
            $stmt->execute([$mot]);
            sendMessage($chat_id, "✅ Mot ajouté : *$mot*");
        } else {
            sendMessage($chat_id, "❌ Format : /new_word _votremot_");
        }
    } 
    elseif ($text === "/list_mot") {
        $mots = getMots($pdo);
        
        if (empty($mots)) {
            sendMessage($chat_id, "📭 Aucun mot enregistré");
        } else {
            $response = "📚 Liste des mots :\n";
            foreach ($mots as $mot) {
                $response .= "- {$mot['id']}. {$mot['mot']}\n";
            }
            sendMessage($chat_id, $response);
        }
    }
    elseif ($text === "/liste_user") {
        $users = getUsers($pdo);
        if (empty($users)) {
            sendMessage($chat_id, "👥 Aucun utilisateur");
        } else {
            $messages = array_map(function($user) {
                return sprintf(
                    "👤 *%s*\n🚫 %s\n⏱ %s",
                    $user['pseudo'],
                    $user['ban_by_user'] ?: 'Aucun ban',
                    $user['conn_time']
                );
            }, $users);
            
            // Envoi par paquets de 5 pour éviter les limites de taille
            foreach (array_chunk($messages, 5) as $chunk) {
                sendMessage($chat_id, implode("\n\n", $chunk));
            }
        }
    } 
    else {
        sendMessage($chat_id, "ℹ️ Commandes disponibles :\n/new_word mot\n/list_mot\n/liste_user");
    }
} catch (PDOException $e) {
    error_log("DB Error: " . $e->getMessage());
    sendMessage($chat_id, "⚠️ Erreur de traitement");
}

// Fonction d'envoi améliorée
function sendMessage($chat_id, $text) {
    $token = "7531174156:AAHXorhCGszGYKfTOzpA-3G3f20Oe7LuDKQ";
    $url = "https://api.telegram.org/bot$token/sendMessage";
    
    $data = [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => 'Markdown',
        'disable_web_page_preview' => true
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        error_log("Erreur d'envoi à Telegram");
    }
}
?>
