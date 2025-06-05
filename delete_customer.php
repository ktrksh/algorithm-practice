<?php
// データベースへの接続情報
$host = '127.0.0.1';
$dbname = 'algorithm_practice_db';
$username = 'root';
$password = 'mysqlpw';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベースに接続しました。\n\n";

    $customerIdToDelete = 5; // 例としてIDが5の顧客を削除

    $sql = "DELETE FROM customers WHERE customer_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $customerIdToDelete, PDO::PARAM_INT);
    $stmt->execute();

    echo "顧客ID {$customerIdToDelete} の情報を削除しました。\n";

    $pdo = null;

} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage() . "\n";
}
?>