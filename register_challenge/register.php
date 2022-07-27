<?php 
session_start();

$form = [
    'name' => '',
    'password' => '',
];

$error = [];

// htmlspecialcharsを簡略化
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

// 入力された情報をチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($form['name'] === '') {
        $error['name'] = 'blank';
    }

    $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if ($form['password'] === '') {
        $error['password'] = 'blank';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <dl>
            <dd>ニックネーム</dd>
            <input type="text" name="name" size="35" maxlength="225" value="<?php echo h($form['name']); ?>">
            <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                <p style="color: #ff0000;">※この項目は必須です</p>
            <?php endif; ?>
        </dl>
        <dl>
            <dd>パスワード</dd>
            <input type="password" name="password" size="35" maxlength="225" value="<?php echo h($form['password']); ?>">
            <?php if (isset($error['password']) && $error['password'] === 'blank'): ?>
                <p style="color: #ff0000;">※この項目は必須です</p>
            <?php endif; ?>
        </dl>
        <div><input type="submit" value="入力内容を確認する"></div>
    </form>
</body>
</html>