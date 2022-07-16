<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample01</title>
</head>

<body>
    <h2>ご注文のドリンク</h2>
    <?php if (!empty($_REQUEST['selection'])) : ?>
        <?php $ordered = $_REQUEST['selection']; ?>
        <ul>
            <?php foreach ($ordered as $order) : ?>
                <li>
                    <?php echo htmlspecialchars($order, ENT_QUOTES) . '<br>'; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>ドリンクのご注文はありません。</p>
    <?php endif; ?>
</body>

</html>