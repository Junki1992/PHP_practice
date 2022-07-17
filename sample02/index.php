<?php
require('calc.php');
$weight = 60.5;
$height = 169.4;
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
</body>

</html>