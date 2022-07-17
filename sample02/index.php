<?php
// 計算用の関数を呼び出す
require('calc.php');
$weight = 60.5;
$height = 1.694;
$bmi = calBMI($weight, $height);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI計算</title>
</head>

<body>
  <h2>あなたのBIM: <?php echo ($bmi); ?></h2>
  <?php if ($bmi < 18.5) {
    echo 'ちょっと痩せすぎかもしれん';
  } elseif ($bmi <= 25) {
    echo '標準ですね';
  } elseif ($bmi > 25) {
    echo '肥満です。痩せなさい。';
  } ?>
</body>

</html>