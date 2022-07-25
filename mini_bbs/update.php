<?php 
require('dbConnect.php');
$stmt = $db->prepare('SELECT * FROM training WHERE id=?');
if (!$stmt) {
    die($db->error);
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt->bind_param('i', $id);
$stmt->execute();

$stmt->bind_result($id, $comment, $created);
$result = $stmt->fetch();
if (!$result) {
    die('コメントの指定が正しくありません');
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメントの編集</title>
</head>
<body>
    <form action="update_do.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <textarea name="comment" id="" cols="50" rows="10" placeholder="コメントを入力してください"><?php echo htmlspecialchars($comment);?></textarea>
        <br>
        <button type="submit" value="投稿する">編集する</button>
    </form>
</body>
</html>