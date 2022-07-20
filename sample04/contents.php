<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コンテンツ</title>
</head>

<body>
    <?php
    require('dbconnect.php');
    $stmt = $db->prepare('SELECT * FROM training WHERE id = ?');
    if (!$stmt) {
        die($db->error);
    }
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if (!$id) {
        echo '表示するメモを指定してください';
        exit();
    }
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($id, $comment, $created);
    $result = $stmt->fetch();
    if (!$result) {
        echo '指定されたメモは見つかりませんでした';
        exit();
    }
    ?>

    <!-- 内容を表示 -->
    <div>
        <?php echo htmlspecialchars($comment); ?>
    </div>
</body>

</html>