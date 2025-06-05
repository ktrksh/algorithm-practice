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

// 説明：「削除したい顧客のIDを変数に格納します。」
$customerIdToDelete = 7; // 説明：「削除したい顧客のIDを指定します。事前にWorkbenchで確認しておくと良いでしょう。」

// 説明：「DELETE文を作成します。customersテーブルから、customer_id が指定の値のレコードを削除します。」
$sql = "DELETE FROM customers WHERE customer_id = :id";

// 説明：「プリペアドステートメントを作成します。」
$stmt = $pdo->prepare($sql);

// 説明：「プレースホルダにIDを整数型としてバインドします。」
$stmt->bindParam(':id', $customerIdToDelete, PDO::PARAM_INT);

// 説明：「SQL文を実行します。」
$stmt->execute();

// 説明：「データ削除成功のメッセージを表示します。」
echo "顧客ID {$customerIdToDelete} の情報を削除しました。\n";

?>