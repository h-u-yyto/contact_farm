<?php
    require_once('function.php');
    require_once('dbconnect.php'); // 追加

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: index.htm');
    }

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES (?, ?, ?)');
    $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了</title>
</head>
<body>
    <h1>お問い合わせありがとうございました！</h1>
    <p><?php echo h($nickname); ?></p>
    <p><?php echo h($email); ?></p>
    <p><?php echo h($content); ?></p>
</body>
</html>