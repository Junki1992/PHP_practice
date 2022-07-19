<?php
require('dbconnect.php');
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
    <?php while ($comments = $comment->fetch_assoc()) : ?>
        <div>
            <h2><a href="#"><?php echo htmlspecialchars($comments['comment']); ?></a></h2>
            <time><?php echo htmlspecialchars($comments['created']); ?></time>
        </div>
        <hr>
    <?php endwhile; ?>
</body>

</html>