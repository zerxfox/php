<?php
declare(strict_types=1);

$loaded_extensions = get_loaded_extensions();

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>PHP Functions by Module</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .module { margin: 15px 0; padding: 10px; border: 1px solid #ccc; }
        .module-name { font-weight: bold; color: #0066cc; margin-bottom: 5px; }
        .function { font-family: 'Courier New', monospace; margin: 2px 5px; display: inline-block; }
        .stats { background: #f5f5f5; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Функции загруженных модулей PHP</h1>";

sort($loaded_extensions);

$total_functions = 0;

foreach ($loaded_extensions as $extension) {
    $functions = get_extension_funcs($extension);
    
    if ($functions === false) {
        $functions = array();
    }
    
    $function_count = count($functions);
    $total_functions += $function_count;
    
    echo "<div class='module'>";
    echo "<div class='module-name'>" . htmlspecialchars($extension) . " (" . $function_count . " функций)</div>";
    
    if ($function_count > 0) {
        // Сортируем функции по алфавиту
        sort($functions);
        
        foreach ($functions as $function) {
            echo "<span class='function'>" . htmlspecialchars($function) . "()</span> ";
        }
    } else {
        echo "<em>Нет доступных функций</em>";
    }
    
    echo "</div>";
}

echo "<div class='stats'>";
echo "<strong>Статистика:</strong><br>";
echo "Модулей: " . count($loaded_extensions) . "<br>";
echo "Функций: " . $total_functions;
echo "</div>";

echo "</body>
</html>";
?>
