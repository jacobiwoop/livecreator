<?php
// controle.php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); // Permet l'accès depuis n'importe où (ou remplace * par un domaine précis)
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Gestion de la requête OPTIONS (pré-flight)
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

$stmt = $pdo->prepare("SELECT id, pseudo, conn_time FROM users WHERE pseudo = ?");
$stmt->execute([$pseudo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Conn_time contient la durée de connexion autorisée en heures (par exemple, 1, 2 ou 3 heures)
    $connTime = $user['conn_time']; // Durée de connexion autorisée en heures

    // Convertir conn_time en secondes
    $allowedSessionTimeInSeconds = $connTime * 3600; // 1 heure = 3600 secondes

    // Calculer l'heure de déconnexion
    $deconnexionTime = time() + $allowedSessionTimeInSeconds;

    // Calculer le temps restant
    $remaining = $deconnexionTime - time();

    if ($remaining > 0) {
        // Utilisateur encore connecté
        $stmtMots = $pdo->query("SELECT mot FROM wordlist");
        $mots = $stmtMots->fetchAll(PDO::FETCH_COLUMN);

        echo json_encode([
            "id" => $user['id'],
            "temp" =>7200,
            "mots" => $mots
        ]);
        exit;
    }
}

// Si l'utilisateur n'est pas trouvé ou que la session a expiré, créer un nouvel utilisateur
$stmtInsert = $pdo->prepare("INSERT INTO users (pseudo, conn_time) VALUES (?, ?)");
$stmtInsert->execute([$pseudo, 2]); // 2 heures de connexion autorisées par défaut
$userId = $pdo->lastInsertId();

$stmtMots = $pdo->query("SELECT mot FROM wordlist");
$mots = $stmtMots->fetchAll(PDO::FETCH_COLUMN);

echo json_encode([
    "id" => $userId,
    "temp" => 1800, // 30 minutes (exemple de valeur par défaut)
    "mots" => $mots
]);
exit;
