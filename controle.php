<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permet l'accès depuis n'importe où (ou remplace * par un domaine précis)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// ... le reste de ton code PHP
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
require_once 'db.php'; // Connexion à la BDD

$data = json_decode(file_get_contents('php://input'), true);
$pseudo = trim($data['pseudo'] ?? '');

if (!$pseudo) {
    echo json_encode(["error" => "Pseudo requis"]);
    exit;
}

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT id, pseudo, ban_by_user, UNIX_TIMESTAMP(conn_time) AS conn_time, TIME_TO_SEC(TIMEDIFF(conn_time + INTERVAL 30 MINUTE, NOW())) AS remaining FROM users WHERE pseudo = ?");
$stmt->execute([$pseudo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && $user['remaining'] > 0) {
    $stmtMots = $pdo->query("SELECT mot FROM wordlist");
    $mots = $stmtMots->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode([
        "id" => $user['id'],
        "temp" => $user['remaining'],
        "mots" => $mots
    ]);
    exit;
} elseif (!$user) {
    // Création si inexistant
    $stmtInsert = $pdo->prepare("INSERT INTO users (pseudo, conn_time) VALUES (?, NOW())");
    $stmtInsert->execute([$pseudo]);
    $userId = $pdo->lastInsertId();

    $stmtMots = $pdo->query("SELECT mot FROM wordlist");
    $mots = $stmtMots->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode([
        "id" => $userId,
        "temp" => 1800, // 30 minutes
        "mots" => $mots
    ]);
    exit;
} else {
    // Connexion expirée → réinitialiser l'heure
    $stmtUpdate = $pdo->prepare("UPDATE users SET conn_time = NOW() WHERE pseudo = ?");
    $stmtUpdate->execute([$pseudo]);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE pseudo = ?");
    $stmt->execute([$pseudo]);
    $userId = $stmt->fetchColumn();

    $stmtMots = $pdo->query("SELECT mot FROM wordlist");
    $mots = $stmtMots->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode([
        "id" => $userId,
        "temp" => 1800,
        "mots" => $mots
    ]);
    exit;
}
