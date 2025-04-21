<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permet l'accès depuis n'importe où (ou remplace * par un domaine précis)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// message.php
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
// Paramètres pour Telegram
$TELEGRAM_TOKEN = '7531174156:AAHXorhCGszGYKfTOzpA-3G3f20Oe7LuDKQ';
$CHAT_ID = '7691383619';

$data = json_decode(file_get_contents("php://input"), true);

$pseudo = $data['pseudo'] ?? '';
$id = $data['id'] ?? 0;
$heure = $data['heure'] ?? '';
$mot = $data['mot'] ?? '';

if (!$pseudo || !$id || !$mot) {
    http_response_code(400);
    echo json_encode(["error" => "Données manquantes"]);
    exit;
}

$pdo = getPDO();

// Récupérer les anciens mots (séparés par virgule)
$stmt = $pdo->prepare("SELECT ban_by_user FROM users WHERE id = ?");
$stmt->execute([$id]);
$ancien = $stmt->fetchColumn();

$liste = array_filter(array_map('trim', explode(',', $ancien)));
if (!in_array($mot, $liste)) {
    $liste[] = $mot;
    $nouveau = implode(', ', $liste);

    $stmtUpdate = $pdo->prepare("UPDATE users SET ban_by_user = ? WHERE id = ?");
    $stmtUpdate->execute([$nouveau, $id]);
}

// Envoi Telegram
$msg = "⚠️ INFRACTION\n👤 Pseudo : $pseudo\n❌ Mot : $mot";

file_get_contents("https://api.telegram.org/bot$TELEGRAM_TOKEN/sendMessage?" . http_build_query([
    'chat_id' => $CHAT_ID,
    'text' => $msg
]));

echo json_encode(["status" => "ok"]);
