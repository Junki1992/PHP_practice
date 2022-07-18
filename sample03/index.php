<?php
$message = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
$db = new mysqli('localhost:8889', 'root', 'root', 'mydb_new');
$stmt = $db->prepare('INSERT INTO training(comment) VALUES (?)');
if (!$stmt) {
    die($db->error);
}
$stmt->bind_param('s', $message);
$success = $stmt->execute();
if ($success) {
    echo '登録されました。';
} else {
    $db->error;
    echo '登録できませんでした';
}
