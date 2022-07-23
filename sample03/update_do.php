<?php
$db = new mysqli('localhost:8889', 'root', 'root', 'mydb_new');
$stmt = $db->prepare('UPDATE training SET comment=? WHERE id=?');
if (!$stmt) {
    die($db->error);
}
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
$stmt->bind_param('si', $comment, $id);
$success = $stmt->execute();
if (!$success) {
    die($db->error);
}
