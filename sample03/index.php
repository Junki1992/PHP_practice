<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample03</title>
</head>

<body>
    <?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb_new');
    $message = 'テスト用のコメントです02';
    $stmt = $db->prepare('INSERT INTO training (comment) VALUES (?)');
    if (!$stmt) {
        die($db->error);
    } else {
        $stmt->bind_param('s', $message);
        $ret = $stmt->execute();
        echo 'テスト用のコメントを挿入しました';
    }
    ?>
</body>

</html>