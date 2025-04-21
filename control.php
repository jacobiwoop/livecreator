<?php
// controle.php

header('Content-Type: application/json');

// Lecture brute du JSON
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Vérification simple
if (!isset($data["pseudo"])) {
    http_response_code(400);
    echo json_encode(["error" => "Pseudo manquant"]);
    exit;
}

// Réponse simulée
echo json_encode([
    "id" => 123,
    "temp" => 3600,
    "mots" => ["sexe", "porn", "bite", "pute"]
]);
