<?php
declare(strict_types=1);

/**
 * Функция swap(), которая меняет местами аргументы, переданные по ссылке
 * 
 * @param mixed $a Первая переменная (передаётся по ссылке)
 * @param mixed $b Вторая переменная (передаётся по ссылке)
 */
function swap(&$a, &$b): void
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Демонстрация функции swap</title>
</head>
<body>
    <h1>Демонстрация функции swap</h1>
    <?php
    $a = 5;
    $b = 8;
    echo "До swap: a = $a, b = $b<br>";
    swap($a, $b);
    echo "После swap: a = $a, b = $b<br>";
    echo "5 === \$b: " . (5 === $b ? 'true' : 'false') . "<br>";
    echo "8 === \$a: " . (8 === $a ? 'true' : 'false') . "<br><br>";
    ?> 
</body>
</html>