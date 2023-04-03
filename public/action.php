<?php ob_start(); ?>

<?php
// データベース接続設定
$servername = "mysql"; // Docker Composeで設定したMySQLコンテナ名
$username = "myuser";
$password = "mypassword";
$dbname = "mydb";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーの確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// POSTで送信されたデータを取得
$name = $_POST['name'];
$email = $_POST['email'];

// SQLクエリの準備
$sql = "INSERT INTO users (name, email) VALUES (?, ?)";

// プリペアドステートメントの作成
$stmt = $conn->prepare($sql);

// プリペアドステートメントにパラメータをバインド
$stmt->bind_param("ss", $name, $email);

// クエリの実行
if ($stmt->execute()) {
    echo "新しいレコードが正常に作成されました。";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// 接続を閉じる
$stmt->close();
$conn->close();

ob_end_clean(); // 出力バッファをクリア
header('Location: index.php');
exit;
?>
