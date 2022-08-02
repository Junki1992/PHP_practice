<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板チャレンジ!!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <div id="head">
            <h1>ひとこと掲示板</h1>
        </div>
        <div id="content">
            <div style="text-align: right;"><a href="logout.php">ログアウト</a></div>
            <form action="" method="POST">
                <dl>
                    <dt>さん、メッセージどうぞ！！</dt>
                    <dd>
                        <textarea name="message" cols="50" rows="5"></textarea>
                    </dd>
                </dl>
                <div>
                    <p><input type="submit" value="投稿する"></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>