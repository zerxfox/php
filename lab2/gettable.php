<?php
declare(strict_types=1);

/**
 * Генерирует HTML таблицу умножения
 * 
 * @param int $cols Количество столбцов (по умолчанию 5)
 * @param int $rows Количество строк (по умолчанию 5)
 * @param string $color Цвет фона заголовков (по умолчанию 'yellow')
 * @return int Количество вызовов функции
 */
function getTable(int $cols = 5, int $rows = 5, string $color = 'yellow'): int
{
    static $count = 0;
    $count++;
    
    $html = "<h3>Таблица {$rows}×{$cols} (цвет: $color)</h3>";
    $html .= '<table>';
    
    // Генерируем таблицу умножения
    for ($i = 1; $i <= $rows; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            // Первая строка и первый столбец - заголовки
            if ($i === 1 || $j === 1) {
                $html .= "<th style='background-color: $color;'>" . ($i * $j) . "</th>";
            } else {
                $html .= "<td>" . ($i * $j) . "</td>";
            }
        }
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    echo $html;
    
    return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body> 
    <h1>Таблица умножения</h1>
    <?php
    /*
    ЗАДАНИЕ 3
    - Отрисуйте таблицу умножения вызывая функцию getTable() с различными параметрами
    - Создайте локальную статическую переменную $count для подсчёта числа вызовов функции getTable()
    - Функция getTable() должна возвращать значение переменной $count
    */
    /*
    ЗАДАНИЕ 4
    - Измените входящие параметры функции getTable() на параметры по умолчанию
    - Добавьте описание функции getTable() с помощью стандарта PHPDoc https://ru.wikipedia.org/wiki/PHPDoc
    */
    /*
    ЗАДАНИЕ 5
    - Отрисуйте таблицу умножения вызывая функцию getTable() без параметров
    - Отрисуйте таблицу умножения вызывая функцию getTable() с одним параметром
    - Отрисуйте таблицу умножения вызывая функцию getTable() с двумя параметрами
    - Используя статическую переменную $count выведите общее число вызовов функции getTable()
    */
    
    // Вызов функции без параметров (используются значения по умолчанию)
    $count1 = getTable();
    
    // Вызов функции с одним параметром
    $count2 = getTable(3);
    
    // Вызов функции с двумя параметрами
    $count3 = getTable(4, 6);
    
    // Вызов функции с тремя параметрами
    $count4 = getTable(7, 8, 'lightblue');
    
    // Вывод общего количества вызовов функции
    echo "<p><strong>Общее количество вызовов функции getTable(): $count4</strong></p>";
    ?> 
</body>

</html>

