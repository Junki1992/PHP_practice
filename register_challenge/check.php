<?php
session_start();
require('library.php');

if (isset($_SESSION['form'])) {
    $form = $_SESSION['form'];
} else {
    header('Location: register.php');
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
    <h3>ニックネーム：<?php echo h($form['name']); ?></h3>
    <h3>パスワード：<?php echo h($form['password']); ?></h3>
    <button value="submit">登録する</button>
    <button value="submit">修正する</button>
</body>
</html>