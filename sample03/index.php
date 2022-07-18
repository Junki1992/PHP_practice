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
    $ret = $db->query('INSERT INTO training (comment) VALUES ("テストデータです")');
    if (!$ret) {
        die($db->error);
    } else {
        echo 'テストデータを挿入しました';
    }
    ?>
</body>

</html>