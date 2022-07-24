<?php
require('dbConnect.php');
$stmt = $db->prepare('SELECT * FROM training WHERE id=?');
if (!$stmt) {
    die($db->error);
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt->bind_param('i', $id);
$result = $stmt->execute();
$stmt->bind_result($id, $comment, $created);
$result = $stmt->fetch();
if (!$result) {
    echo '指定された投稿は存在しません';
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント詳細</title>
</head>
<body>
    <?php echo $comment; ?>
    <br>
    <a href="index.php">→一覧へ戻る</a>
</body>
</html>