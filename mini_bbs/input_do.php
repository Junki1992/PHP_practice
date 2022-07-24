<?php
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
require('dbConnect.php');
$stmt = $db->prepare('INSERT INTO training(comment) VALUES(?)');
if (!$stmt) {
    die($db->error);
}

$stmt->bind_param('s', $comment);
$stmt->execute();
header('Location:index.php');