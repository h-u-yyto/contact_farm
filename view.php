<?php
    require_once('function.php');
    require_once('dbconnect.php');

    // SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys');
    $stmt->execute();
    $results = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一覧</title>
</head>
<body>
    <!-- 画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p><?php echo h($result['nickname']); ?></p>
        <p><?php echo h($result['email']);?></p>
        <p><?php echo h($result['content']);?></p>
    <?php endforeach; ?>
</body>
</html>