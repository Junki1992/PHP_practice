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
    <?php $ordered = $_REQUEST['selection']; ?>
    <ul>
        <li>
            <?php foreach ($ordered as $order) : ?>
                <?php echo $order; ?>
            <?php endforeach; ?>
        </li>
    </ul>
</body>

</html>