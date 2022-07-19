<?php
$db = new mysqli('localhost:8889', 'root', 'root', 'mydb_new');
$comment = $db->query('SELECT * FROM training ORDER BY id DESC');
if (!$comment) {
    die($db->error);
}
