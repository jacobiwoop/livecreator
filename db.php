<?php
// db.php

function getPDO() {
    $host = 'mnz.domcloud.co';
    $dbname = 'denver_db';
    $username = 'denver';
    $password = '52v_ov6YAXU(3)4eUj';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["error" => "Erreur de connexion à la base de données."]);
        exit;
    }
}
