<?php
function calBMI($weight, $height)
{
    $bmi = $weight / ($height * $height);
    return ceil($bmi);
}
