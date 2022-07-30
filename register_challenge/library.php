<?php
// htmlspecialcharsを簡略化
function h($value) {
    return htmlspecialchars($value, ENT_QUOTES);
}

// DBへの接続
function dbConnect() {
    $db = new mysqli('localhost', 'root', 'root', 'bbs_challenge');
    if (!$db) {
        die($db->error);
    }
    return $db;
}
?>