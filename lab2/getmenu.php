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

// Пример использования функции swap()
$a = 5;
$b = 8;
echo "До swap: a = $a, b = $b<br>";
swap($a, $b);
echo "После swap: a = $a, b = $b<br>";
echo "5 === \$b: " . (5 === $b ? 'true' : 'false') . "<br>";
echo "8 === \$a: " . (8 === $a ? 'true' : 'false') . "<br><br>";

/**
 * Создает массив с структурой меню
 * 
 * @return array Массив пунктов меню
 */
function createMenuArray(): array
{
    return [
        ['link' => 'Домой', 'href' => 'index.php'],
        ['link' => 'О нас', 'href' => 'about.php'],
        ['link' => 'Контакты', 'href' => 'contact.php'],
        ['link' => 'Таблица умножения', 'href' => 'table.php'],
        ['link' => 'Калькулятор', 'href' => 'calc.php']
    ];
}

/**
 * Генерирует HTML меню из массива
 * 
 * @param array $menu Массив пунктов меню
 * @param bool $vertical Флаг вертикального отображения (true - вертикально, false - горизонтально)
 * @return string HTML код меню
 */
function getMenu(array $menu, bool $vertical = true): string
{
    $cssClass = $vertical ? 'menu vertical' : 'menu horizontal';
    $html = "<ul class=\"$cssClass\">";
    
    foreach ($menu as $menuItem) {
        $html .= "<li><a href='{$menuItem['href']}'>{$menuItem['link']}</a></li>";
    }
    
    $html .= '</ul>';
    return $html;
}

// Создаем массив меню
$leftMenu = createMenuArray();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style>
       .menu {
			list-style-type: none;
			margin: 0;	
			padding: 0;
		}

		.horizontal li {
			display: inline;
			padding: 5px
		}
    </style>
</head>
<body>
    <h1>Меню</h1>
    <?php
    /*
    ЗАДАНИЕ 3
    - Отрисуйте вертикальное меню вызывая функцию getMenu() с одним параметром
    */
    echo "<h2>Вертикальное меню</h2>";
    echo getMenu($leftMenu);
    
    /*
    ЗАДАНИЕ 4
    - Отрисуйте горизонтальное меню вызывая функцию getMenu() со вторым параметром равным false
    */
    echo "<h2>Горизонтальное меню</h2>";
    echo getMenu($leftMenu, false);
    ?> 
</body>

</html>
