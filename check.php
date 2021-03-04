<?php
    require_once('function.php');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: index.htm');
    }

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    if ($nickname == '') {
        $nickname_result = 'ニックネームが入力されていません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname .'様';
    }
    
    if ($email == '') {
        $email_result = 'メールアドレスが入力されていません。';
    } else {
        $email_result = 'メールアドレス：' . $email;
    }

    if ($content == '') {
        $content_result =  'お問い合わせ内容が入力されていません。';
    } else {
        $content_result = 'お問い合わせ内容：' . $content;
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力内容確認</title>
</head>
<body>
    <h1>入力内容確認</h1>
    <p><?php echo h($nickname_result); ?></p>
    <p><?php echo h($email_result); ?></p>
    <p><?php echo h($content_result); ?></p>

    <form method="POST" action="thanks.php">
        <!-- thanks.phpへデータを渡すために formデータじゃないとエラーが起きる -->
        <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
        <input type="hidden" name="email" value="<?php echo h($email); ?>">
        <input type="hidden" name="content" value="<?php echo h($content); ?>">

        <button type="button" onclick="history.back()">戻る</button>
        <?php if ($nickname != '' && $email != '' && $content != ''): ?>
        <button type="submit">OK</button>
        <?php endif; ?>
    </form>
    
</body>
</html>