<?php 
require('../library.php');

$form = [
    'name' => '',
    'email' => '',
    'password' => ''
];
$error = [];

// フォームの内容をチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($form['name'] === '') {
        $error['name'] = 'blank';
    }

    $form['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    if ($form['email'] === '') {
        $error['email'] = 'blank';
    }

    $form['password'] = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if ($form['password'] === '') {
        $error['password'] = 'blank';
    }

    // 画像ファイルのチェック
    $image = $_FILES['image'];
    if ($image['name'] !== '' && $image['error'] === 0) {
        $type = mime_content_type($image['tmp_name']);
        if ($type !== 'image/png' && $type !== 'image/jpeg') {
            $error['image'] = 'type';
        }
    }

    // 画像ファイルのアップロード
    if ($image['name'] !== '') {
        $filename = date('YmHis') . '_' . $image['name'];
        if (!move_uploaded_file($image['tmp_name'], '../member_picture/' .$filename)) {
            die('画像のアップロード失敗しました');
        }
        $_SESSION['form']['image'] = $filename;
    } else {
        $_SESSION['form']['image'] = '';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div id="wrap">
        <div id="head">
            <h1>会員登録</h1>
        </div>

        <div id="content">
            <p>次のフォームに必要事項をご記入ください</p>
            <form action="" method="POST" enctype="multipart/form-data">
                <dl>
                    <dt>ニックネーム<span class="required">必須</span></dt>
                    <dd>
                        <input type="text" name="name" size="35" maxlength="225" value="<?php echo h($form['name']); ?>">
                        <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                            <p class="error">※ ニックネームを入力してください</p>
                        <?php endif ;?>
                    </dd>

                    <dt>メールアドレス<span class="required">必須</span></dt>
                    <dd>
                        <input type="email" name="email" size="35" maxlength="225" value="<?php echo h($form['email']); ?>">
                        <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                            <p class="error">※ メールアドレスを入力してください</p>
                        <?php endif ;?>
                        <p class="error">※ 指定されたメールアドレスは既に登録されています。</p>
                    </dd>
                    
                    <dt>パスワード<span class="required">必須</span></dt>
                    <dd>
                        <input type="password" name="password" size="10" maxlength="20">
                        <?php if (isset($error['password']) && $error['password'] === 'blank'): ?>
                            <p class="error">パスワードを入力してください</p>
                        <?php endif ;?>
                        <p class="error">パスワードは4文字以上で入力してください</p>
                    </dd>

                    <dt>写真など</dt>
                    <dd>
                        <input type="file" name="image" size="35" value="">
                        <?php if (isset($error['image']) && $error['image'] === 'type'): ?>
                            <p class="error">写真や画像は「.png」か「.jpeg」をご使用ください</p>
                        <?php endif; ?>
                        <p class="error">恐れ入りますが、画像を改めて指定してください</p>
                    </dd>
                </dl>
                <div><input type="submit" value="入力内容を確認する"></div>
            </form>
        </div>
    </div>
</body>
</html>