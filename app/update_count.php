<?php
require 'config.php';

// 获取用户IP
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

session_start();
if (isset($_SESSION['last_click']) && (microtime(true) - $_SESSION['last_click']) < 0.1) {
    echo json_encode(['error' => 'You are clicking too fast. Please wait a moment.']);
    exit;
}
$_SESSION['last_click'] = microtime(true);

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    // 获取用户IP
    $ip = getUserIP();

    // 更新点击次数
    $pdo->exec("UPDATE clicks SET count = count + 1 WHERE id = 1");

    // 更新IP点击次数
    $stmt = $pdo->prepare("SELECT count FROM ip_clicks WHERE ip = :ip");
    $stmt->execute(['ip' => $ip]);
    $row = $stmt->fetch();
    if ($row) {
        $stmt = $pdo->prepare("UPDATE ip_clicks SET count = count + 1 WHERE ip = :ip");
    } else {
        $stmt = $pdo->prepare("INSERT INTO ip_clicks (ip, count) VALUES (:ip, 1)");
    }
    $stmt->execute(['ip' => $ip]);

    // 获取新的点击次数
    $stmt = $pdo->query("SELECT count FROM clicks WHERE id = 1");
    $row = $stmt->fetch();
    $count = $row ? $row['count'] : 0;

    echo json_encode(['count' => $count]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
