<?php
function calBMI($weight, $height)
{
    // 身長をmからcmへ変換
    $height = $height / 100;

    $bmi = $weight / ($height * $height);
    return ceil($bmi);
}
