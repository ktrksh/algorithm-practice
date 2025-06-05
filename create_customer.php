<?php
// データベースへの接続情報
$host = '127.0.0.1';
$dbname = 'algorithm_practice_db';
$username = 'root';
$password = 'mysqlpw';

try {
    // PDO（PHP Data Objects）を使ってデータベースに接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // エラーが発生した場合に例外を投げるように設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベースに接続しました。\n\n";

    // 追加したい顧客の情報
    $name = '新しい顧客花子';
    $age = 25;
    $prefecture = '奈良県';

    // INSERT INTO 文：customers テーブルに新しいレコードを追加するSQL
    $sql = "INSERT INTO customers (name, age, prefecture) VALUES (:name, :age, :prefecture)";

    // プリペアドステートメントを作成：SQLインジェクションを防ぐためのセキュリティ対策
    $stmt = $pdo->prepare($sql);

    // プレースホルダに値をバインド：SQL文の中の「:name」などに実際の値を設定
    $stmt->bindParam(':name', $name, PDO::PARAM_STR); // 名前は文字列
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);   // 年齢は整数
    $stmt->bindParam(':prefecture', $prefecture, PDO::PARAM_STR); // 都道府県は文字列

    // SQL文を実行
    $stmt->execute();

    echo "新しい顧客情報を追加しました。\n";

    // データベース接続を閉じる
    $pdo = null;

} catch (PDOException $e) {
    echo "データベースエラー: " . $e->getMessage() . "\n";
}
?>