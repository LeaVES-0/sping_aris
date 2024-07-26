<?php
require 'config.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // 创建点击计数表
    $pdo->exec("CREATE TABLE IF NOT EXISTS clicks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        count INT NOT NULL
    )");

    // 创建IP点击计数表
    $pdo->exec("CREATE TABLE IF NOT EXISTS ip_clicks (
        id INT PRIMARY KEY AUTO_INCREMENT,
        ip VARCHAR(45) NOT NULL,
        count INT NOT NULL
    )");

    // 初始化点击计数
    $stmt = $pdo->query("SELECT COUNT(*) FROM clicks");
    $row = $stmt->fetch();
    if ($row['COUNT(*)'] == 0) {
        $pdo->exec("INSERT INTO clicks (count) VALUES (0)");
    }

    echo "Database initialized successfully.";
} catch (PDOException $e) {
    echo "Error initializing database: " . $e->getMessage();
}
?>
