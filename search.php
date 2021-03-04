<?php
    require_once('function.php');
    require_once('dbconnect.php');

    $nickname = '';
    if (isset($_GET['nickname'])) {
        $nickname = $_GET['nickname'];
    }

    // SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname LIKE ?');
    $stmt->execute(["%$nickname%"]);
    $results = $stmt->fetchAll();
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
    <form action="" method="GET">
        <p>検索したいnicknameを入力してください</p>
        <input type="text" name="nickname">
        <input type="submit" value="検索">
    </form>

    <!-- 画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p><?php echo h($result['nickname']); ?></p>
        <p><?php echo h($result['email']); ?></p>
        <p><?php echo h($result['content']); ?></p>
    <?php endforeach; ?>
    
</body>
</html>