<?php
// 説明：「PHPの開始タグです。」
// 説明：「データベースへの接続情報を定義します。」
$host = 'localhost';
$dbname = 'algorithm_practice_db';
$username = 'root';
$password = 'あなたの新しいパスワード'; // 説明：「ここはご自身のMySQLのパスワードに置き換えます。」

// 説明：「try-catch ブロックでエラーハンドリングを行います。」
try {
    // 説明：「PDOを使ってデータベースに接続します。接続文字列、ユーザー名、パスワードを渡します。」
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // 説明：「PDOのエラーモードを例外発生に設定します。」
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 説明：「接続成功のメッセージを表示します。」
    echo "データベースに接続しました。\n\n";

    // ここにCRUD操作のコードを記述します。

    // 説明：「最後に、データベース接続を閉じます。」
    $pdo = null;

} catch (PDOException $e) {
    // 説明：「エラーが発生した場合の処理です。エラーメッセージを表示します。」
    echo "データベースエラー: " . $e->getMessage() . "\n";
}

// 説明：「新しい顧客の名前、年齢、都道府県を変数に格納します。」
$name = 'KENTARO KASHIO';
$age = 39; // 説明：「ご自身の年齢に合わせて変更してもOKです。」
$prefecture = '福岡県'; // 説明：「ご自身の都道府県に合わせて変更してもOKです。」

// 説明：「INSERT文を作成します。customersテーブルにname, age, prefecture の値を挿入します。」
$sql = "INSERT INTO customers (name, age, prefecture) VALUES (:name, :age, :prefecture)";

// 説明：「プリペアドステートメントを作成します。」
$stmt = $pdo->prepare($sql);

// 説明：「プレースホルダに値をバインドします。それぞれ、名前は文字列、年齢は整数、都道府県は文字列としてバインドします。」
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':age', $age, PDO::PARAM_INT);
$stmt->bindParam(':prefecture', $prefecture, PDO::PARAM_STR);

// 説明：「SQL文を実行します。」
$stmt->execute();

// 説明：「データ追加成功のメッセージを表示します。」
echo "新しい顧客情報（KENTARO KASHIO）を追加しました。\n";

?>