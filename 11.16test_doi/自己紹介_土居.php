<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "git-test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submittedName = htmlspecialchars($_POST["name"]);
    $submittedEmail = htmlspecialchars($_POST["email"]);
    $submittedMessage = htmlspecialchars($_POST["message"]);

    $sql = "INSERT INTO comments (name, mail, message) VALUES ('$submittedName', '$submittedEmail', '$submittedMessage')";

    if ($conn->query($sql) !== TRUE) {
        echo "データベースへの挿入エラー: " . $conn->error;
    }

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自己紹介サイト</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>私の自己紹介</h1>

    <?php
    $name = "土居信哉";
    $age = 34;
    $location = "岡山";
    $profileImage = "images/top4.jpeg";

    echo "<img src='{$profileImage}' alt='プロフィール写真'>";
    echo "<p>私は{$name}です。</p>";
    echo "<p>年齢は{$age}歳です。</p>";
    echo "<p>現在住んでいる場所は{$location}です。</p>";
    ?>

    <h2>お問い合わせ</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">メッセージ:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <input type="submit" value="送信">
    </form>

    <div class="comment-section">
        <h2>今日もらったコメント</h2>

        <?php
        $result = $conn->query("SELECT * FROM comments");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='comment-container'>";
                echo "<p><strong>名前:</strong> " . $row["name"] . "</p>";
                echo "<p><strong>メッセージ:</strong> " . $row["message"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>今日のコメントはまだありません。</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
