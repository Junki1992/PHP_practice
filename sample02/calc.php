<?php
function calBMI($weight, $height)
{
    $height = $height / 100;
    $bmi = $weight / ($height * $height);
    return ceil($bmi);
}
