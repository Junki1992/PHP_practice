<?php 
require('dbConnect.php');
// 最大ページ数の算出
$counts = $db->query('SELECT COUNT(*) AS cnt FROM training');
$count = $counts->fetch_assoc();
$max_page = floor(($count['cnt']+1)/5+1);

$stmt= $comments = $db->prepare('SELECT * FROM training ORDER BY id DESC LIMIT ?, 5');
if (!$stmt) {
    die($db->error);
}

// ページ数
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
$page = ($page ?: 1);

// ページ毎の1件目の投稿
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
    <title>コメントリスト</title>
</head>
<body>
    <h1>コメントリスト</h1>
    <a href="input.html" style="font-weight: 700;">→新規投稿</a>
    <?php if (!$result) :?>
        <p>表示するコメントはありません</p>
    <?php endif;?>
    <div>
        <?php $stmt->bind_result($id, $comment, $created);?>
        <?php while ($stmt->fetch()):?>
            <h2>
                <a href="comment.php?id=<?php echo $id;?>">
                    <?php echo htmlspecialchars($comment);?>
                </a>
            </h2>
            <time><?php echo htmlspecialchars($created);?></time>
            <hr>
        <?php endwhile;?>
        <p>
            <?php if ($page > 1):?>
                <a href="?page=<?php echo $page-1;?>"><?php echo $page-1;?>ページ目へ</a>
            <?php endif;?>
            <?php if($page < $max_page):?>
                | <a href="?page=<?php echo $page+1;?>"><?php echo $page+1;?>ページ目へ</a>
            <?php endif;?>
        </p>
    </div>
</body>
</html>