<?php
$message = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
$db = new mysqli('localhost:8889', 'root', 'root', 'mydb_new');
$stmt = $db->prepare('INSERT INTO training(comment) VALUES (?)');
if (!$stmt) {
    die($db->error);
}
$stmt->bind_param('s', $message);
$success = $stmt->execute();
if ($success) {
    echo '登録されました。';
} else {
    $db->error;
    echo '登録できませんでした';
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シンプルメモ帳</title>
</head>

<body>
    <br><a href="/PHP_practice/sample04/index.php">→ 戻る</a>
</body>

</html>