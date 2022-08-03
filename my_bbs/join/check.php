<?php
session_start();
require('../library.php');

$form = $_SESSION['form'];
var_dump($form);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>

    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div id="wrap">
        <div id="head">
            <h1>会員登録</h1>
        </div>

        <div id="content">
            <p>記入した内容を確認して、「登録」ボタンを押下してください</p>
            <form action="" method="POST">
                <dl>
                    <dt>ニックネーム</dt>
                    <dd><?php echo $form['name']; ?></dd>
                    <dt>メールアドレス</dt>
                    <dd><?php echo $form['email']; ?></dd>
                    <dt>パスワード</dt>
                    <dd>
                        【表示されません】
                    </dd>
                    <dt>写真など</dt>
                    <dd><img src="../member_picture/<?php echo h($form['image']); ?>" width="100%" alt=""></dd>
                </dl>
                <div><a href="">&laquo;&nbsp;修正する</a> | <input type="submit" value="登録する"></div>
            </form>
        </div>
    </div>
</body>
</html>