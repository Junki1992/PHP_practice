<?php
require('dbconnect.php');
$stmt = $db->prepare('SELECT * FROM training ORDER BY id DESC LIMIT ?, 5');
if (!$stmt) {
    die($db->error);
}
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = ($page ?: 1);
$start = ($page - 1) * 5;
$stmt->bind_param('i', $start);
$result = $stmt->execute();
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
    <h1>メモ帳</h1>
    <a href="/PHP_practice/sample03/input.html">→ 新規投稿</a>
    <?php if (!$result) : ?>
        <p>表示できる投稿がありません</p>
    <?php endif; ?>
    <?php $stmt->bind_result($id, $comment, $created); ?>
    <?php while ($stmt->fetch()) : ?>
        <div>
            <h2>
                <a href="contents.php?id=<?php echo $id; ?>">
                    <?php echo htmlspecialchars($comment); ?>
                </a>
            </h2>
            <time><?php echo htmlspecialchars($created); ?></time>
        </div>
        <hr>
    <?php endwhile; ?>
</body>

</html>