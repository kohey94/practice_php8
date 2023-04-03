<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>

<body>
    <h1>Simple Form</h1>
    <form action="action.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <h1>DB Data</h1>

    <?php
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

    // データがある場合のみdisplay_users.phpをincludeする
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        include 'display_users.php';
    }

    // 接続を閉じる
    $conn->close();
    ?>
</body>

</html>