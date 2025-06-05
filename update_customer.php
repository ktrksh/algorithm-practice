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

    $customerIdToUpdate = 1; // 例としてIDが1の顧客を更新
    $newAge = 32;
    $newPrefecture = '香川県';

    $sql = "UPDATE customers SET age = :age, prefecture = :prefecture WHERE customer_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':age', $newAge, PDO::PARAM_INT);
    $stmt->bindParam(':prefecture', $newPrefecture, PDO::PARAM_STR);
    $stmt->bindParam(':id', $customerIdToUpdate, PDO::PARAM_INT);
    $stmt->execute();

    echo "顧客ID {$customerIdToUpdate} の情報を更新しました。\n";

    $pdo = null;

} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage() . "\n";
}
?>