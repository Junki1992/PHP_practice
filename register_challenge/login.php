<?php
session_start();
require('library.php');

$error = [];
$name = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if ($name === '' || $password === '') {
        $error['login'] = 'blank';
    } else {
        // ログインチェック
        $db = dbConnect();
        $stmt = $db->prepare('SELECT id, password FROM members WHERE name=? LIMIT 1');
        $stmt->bind_param('s', $name);
        $success = $stmt->execute();
        if (!$success) {
            die($db->error);
        }
        $stmt->bind_result($id, $hash);
        $stmt->fetch();

        if (password_verify($password, $hash)) {
            // ログイン成功
            session_regenerate_id();
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            header('Location: main.php');
        } else {
            $error['login'] = 'failed';
        }
    }
} 
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログインする</h1>
    <div class="lead">
        <p>ニックネームとパスワードを入力してログインしてください</p>
        <form action="" method="POST">
            <dl>
                <dt>ニックネーム</dt>
                <dd>
                    <input type="text" name="name" size="35" maxlength="255" value="<?php echo h($name); ?>">
                    <?php if (isset($error['login']) && $error['login'] === 'blank'): ?>
                        <p style="color: #ff0000;">※ログイン情報を入力してください</p>
                    <?php endif ;?>

                    <?php if (isset($error['login']) && $error['login'] === 'failed'): ?>
                        <p style="color: #ff0000;">※ログイン情報を正しく入力してください</p>
                    <?php endif; ?>
                </dd>
                <dt>パスワード</dt>
                <dd>
                    <input type="password" name="password" size="35" maxlength="255" value="<?php echo h($password); ?>">
                </dd>
            </dl>
            <div>
                <input type="submit" value="ログイン">
            </div>
        </form>
    </div>
</body>
</html>