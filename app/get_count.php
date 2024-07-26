<?php
require 'config.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $stmt = $pdo->query("SELECT count FROM clicks WHERE id = 1");
    $row = $stmt->fetch();
    $count = $row ? $row['count'] : 0;

    echo json_encode(['count' => $count]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
