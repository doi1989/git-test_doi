<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>自己紹介サイト</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%; /* 円形のプロフィール写真にするために追加 */
        }
    </style>
</head>
<body>
    <h1>私の自己紹介</h1>

    <?php
    $name = "土居信哉";
    $age = 34;
    $location = "岡山";
    $profileImage = "images/top4.jpeg"; // 例: "images/profile.jpg"

    echo "<img src='{$profileImage}' alt='プロフィール写真'>";
    echo "<p>私は{$name}です。</p>";
    echo "<p>年齢は{$age}歳です。</p>";
    echo "<p>現在住んでいる場所は{$location}です。</p>";
    ?>

</body>
</html>
