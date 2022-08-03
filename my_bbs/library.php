<?php
// htmlspecialcharsを簡素化
function h($values) {
    return htmlspecialchars($values, ENT_QUOTES);
}

// DB接続
function dbConnect() {
    $db = new mysqli('localhost', 'root', 'root', 'my_bbs');
    if (!$db) {
        die($db->error);
    }
    return $db;
}
?>