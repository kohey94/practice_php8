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

// usersテーブルからデータを取得するSQLクエリ
$sql = "SELECT id, name, email FROM users";

// クエリを実行し、結果セットを取得
$result = $conn->query($sql);

// 結果セットが1行以上のデータを持っている場合
if ($result->num_rows > 0) {
    // テーブルを表示
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

    // 結果セットの各行を処理
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

// 接続を閉じる
$conn->close();
