<?php

// MySQLデータベースへの接続情報
$host = '127.0.0.1'; // データベースのホスト名
$dbname = 'algorithm_practice_db'; // 作成したデータベース名
$username = 'root'; // MySQLのユーザー名
$password = 'mysqlpw'; // MySQLのパスワード (設定している場合は入力)

try {
    // MySQLデータベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "MySQLデータベースに接続しました。\n\n";

    // 1. すべての顧客の名前と年齢を表示する
    echo "すべての顧客の名前と年齢:\n";
    $stmt1 = $pdo->query("SELECT name, age FROM customers");
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        echo "名前: " . $row['name'] . ", 年齢: " . $row['age'] . "\n";
    }
    echo "\n";

    // 2. 20歳以上の顧客の名前と都道府県を表示する
    echo "20歳以上の顧客の名前と都道府県:\n";
    $stmt2 = $pdo->query("SELECT name, prefecture FROM customers WHERE age >= 20");
    while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
        echo "名前: " . $row['name'] . ", 都道府県: " . $row['prefecture'] . "\n";
    }
    echo "\n";

    // データベース接続を閉じる
    $pdo = null;

} catch (PDOException $e) {
    echo "MySQLデータベース接続エラー: " . $e->getMessage() . "\n";
}

?>
