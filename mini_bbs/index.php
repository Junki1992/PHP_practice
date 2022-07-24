<?php 
require('dbConnect.php');
$comments = $db->query('SELECT * FROM training ORDER BY id DESC');
if (!$comments) {
    die($db->error);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメントリスト</title>
</head>
<body>
    <h1>コメントリスト</h1>
    <a href="input.html" style="font-weight: 700;">新規投稿</a>
    <div>
        <?php while ($comment = $comments->fetch_assoc()):?>
            <h2>
                <a href="comment.php?id=<?php echo $comment['id'];?>">
                    <?php echo htmlspecialchars($comment['comment']);?>
                </a>
            </h2>
            <time><?php echo htmlspecialchars($comment['created']);?></time>
            <hr>
        <?php endwhile;?>
    </div>
</body>
</html>