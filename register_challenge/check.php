<?php
session_start();
require('library.php');

if (isset($_SESSION['form'])) {
    $form = $_SESSION['form'];
} else {
    header('Location: register.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new mysqli('localhost', 'root', 'root', 'bbs_challenge');
    // エラーチェック
    if (!$db) {
        die($db->error);
    }

    $stmt = $db->prepare('INSERT INTO members(name, password) VALUES(?, ?)');

    // パスワードを暗号化
    $password = password_hash($form['password'], PASSWORD_DEFAULT);
    $stmt->bind_param('ss', $form['name'], $password);
    $success = $stmt->execute();
    // エラーチェック
    if (!$success) {
        die($db->error);
    }

    header('Location: thanks.php');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <h2>入力内容の確認</h2>
    <p>下記の内容で登録します</p>
    <form action="" method="POST">
        <dl>
            <dd>
                <h3></h3>ニックネーム：<?php echo h($form['name']); ?></h3>
            </dt>
            <dd>
                <h3>パスワード：【表示されません】</h3>
            </dd>
        </dl>
        <input type="submit" value="登録する">
        <div><a href="register.php?action=rewrite">&laquo;&nbsp;修正する</a></div>
    </form>
</body>
</html>