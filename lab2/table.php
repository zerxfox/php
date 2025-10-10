<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Создайте две целочисленные переменные $cols и $rows
- Присвойте созданным переменным произвольные значения в диапазоне от 1 до 10
*/

/**
 * Создает переменные для количества столбцов и строк
 * 
 * @return array Массив с количеством столбцов и строк
 */
function createTableDimensions(): array
{
    $cols = 8;
    $rows = 6;
    return ['cols' => $cols, 'rows' => $rows];
}

/**
 * Генерирует HTML таблицу умножения
 * 
 * @param int $cols Количество столбцов
 * @param int $rows Количество строк
 * @return string HTML код таблицы
 */
function generateMultiplicationTable(int $cols, int $rows): string
{
    $html = '<table>';
    
    // Генерируем таблицу умножения
    for ($i = 1; $i <= $rows; $i++) {
        $html .= '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            // Первая строка и первый столбец - заголовки
            if ($i === 1 || $j === 1) {
                $html .= "<th>" . ($i * $j) . "</th>";
            } else {
                $html .= "<td>" . ($i * $j) . "</td>";
            }
        }
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    return $html;
}

// Создаем размеры таблицы
$dimensions = createTableDimensions();
$cols = $dimensions['cols'];
$rows = $dimensions['rows'];
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
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }

        th {
            background-color: yellow;
            font-weight: bold;
        }
        
        td {
            background-color: white;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <?php
    /*
    ЗАДАНИЕ 2
    - Используя циклы отрисуйте таблицу умножения в виде HTML-таблицы на следующих условиях
        - Число столбцов должно быть равно значению переменной $cols
        - Число строк должно быть равно значению переменной $rows
        - Ячейки на пересечении столбцов и строк должны содержать значения, являющиеся произведением порядковых номеров столбца и строки
    - Рекомендуется использовать цикл for    
    
    ЗАДАНИЕ 3
    - Значения в ячейках первой строки и первого столбца должны быть отрисованы полужирным шрифтом и выровнены по центру ячейки
    - Фоновый цвет ячеек первой строки и первого столбца должен быть отличным от фонового цвета таблицы
    */
    
    // Генерируем и выводим таблицу умножения
    echo generateMultiplicationTable($cols, $rows);
    ?> 
</body>
</html>