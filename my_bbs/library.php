<?php
// htmlspecialcharsを簡素化
function h($values) {
    return htmlspecialchars($values, ENT_QUOTES);
}
?>