<?php
declare(strict_types=1);

$constants = get_defined_constants(true);

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>PHP Constants</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .constant { margin: 5px 0; padding: 5px; border-bottom: 1px solid #eee; }
        .name { font-weight: bold; color: #0066cc; }
        .value { color: #009900; }
        .category { background: #f0f0f0; padding: 10px; margin: 10px 0; border-radius: 5px; }
        h1 { color: #333; }
    </style>
</head>
<body>
    <h1>Определённые константы в PHP</h1>";

// Выводим константы по категориям
foreach ($constants as $category => $category_constants) {
    echo "<div class='category'>";
    echo "<h2>Категория: " . htmlspecialchars($category) . " (" . count($category_constants) . " констант)</h2>";
    
    // Сортируем константы по имени для удобства чтения
    ksort($category_constants);
    
    foreach ($category_constants as $name => $value) {
        echo "<div class='constant'>";
        echo "<span class='name'>" . htmlspecialchars($name) . "</span> = ";
        echo "<span class='value'>";
        
        // Форматируем вывод значения в зависимости от типа
        if (is_bool($value)) {
            echo $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            echo 'null';
        } elseif (is_array($value)) {
            echo 'Array(' . count($value) . ')';
        } elseif (is_object($value)) {
            echo 'Object(' . get_class($value) . ')';
        } elseif (is_string($value)) {
            echo "'" . htmlspecialchars($value) . "'";
        } else {
            echo htmlspecialchars((string)$value);
        }
        
        echo "</span>";
        echo "</div>";
    }
    echo "</div>";
}

echo "</body>
</html>";
?>
