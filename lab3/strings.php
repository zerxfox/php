<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Создайте строковую переменную $login и присвойте ей значение ' User '
- Создайте строковую переменную $password и присвойте ей значение 'megaP@ssw0rd'
- Создайте строковую переменную $name и присвойте ей значение 'иван'
- Создайте строковую переменную $email и присвойте ей значение 'ivan@petrov.ru'
- Создайте строковую переменную $code и присвойте ей значение '<?=$login?>'
*/

/**
 * Создает и инициализирует строковые переменные
 * 
 * @return array Массив с переменными
 */
function initializeVariables(): array
{
    $login = ' User ';
    $password = 'megaP@ssw0rd';
    $name = 'иван';
    $email = 'ivan@petrov.ru';
    $code = '<?=$login?>';
    
    return [
        'login' => $login,
        'password' => $password,
        'name' => $name,
        'email' => $email,
        'code' => $code
    ];
}

/**
 * Проверяет сложность пароля
 * 
 * @param string $password Пароль для проверки
 * @return bool true если пароль соответствует требованиям, false в противном случае
 */
function isPasswordStrong(string $password): bool
{
    // Проверка длины
    if (strlen($password) < 8) {
        return false;
    }
    
    // Проверка наличия заглавной латинской буквы
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    
    // Проверка наличия строчной латинской буквы
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }
    
    // Проверка наличия цифры
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }
    
    return true;
}

/**
 * Обрабатывает и проверяет данные
 * 
 * @param array $variables Массив переменных для обработки
 * @return array Массив с результатами обработки
 */
function processData(array $variables): array
{
    $results = [];
    
    // Обработка логина: удаление пробелов и приведение к нижнему регистру
    $results['login'] = strtolower(trim($variables['login']));
    
    // Проверка сложности пароля
    $results['password_strength'] = isPasswordStrong($variables['password']);
    
    // Преобразование имени: первый символ прописной
    $results['name'] = mb_convert_case($variables['name'], MB_CASE_TITLE, 'UTF-8');
    
    // Проверка корректности email с помощью filter_var
    $results['email_valid'] = filter_var($variables['email'], FILTER_VALIDATE_EMAIL) !== false;
    
    // Вывод кода как есть (экранирование специальных символов HTML)
    $results['code'] = htmlspecialchars($variables['code']);
    
    return $results;
}

// Инициализация переменных
$variables = initializeVariables();
$results = processData($variables);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
    <style>
        .result {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1>Использование функций обработки строк</h1>
    
    <?php
    /*
    ЗАДАНИЕ 2
    - Используя строковые функции, удалите пробельные символы в начале и конце переменной $login, а также сделайте все символы строчными (малыми)
    - Проверьте значение переменной $password на сложность: пароль должен содержать минимум одну заглавную латинскую букву, одну строчную и одну цифру, а длина должна быть не меньше 8 символов. Оформите полученный код в виде пользовательской функции.
    - Используя строковые функции, сделайте первый символ значения переменной $name прописной (большой)
    - Используя функцию фильтрации переменных проверьте корректность значения $email
    - Используя строковые функции выведите значение переменной $code в браузер в том же виде как она задана в коде
    */
    ?>
    
    <div class="result">
        <h3>Исходные данные:</h3>
        <p>Логин: '<?= htmlspecialchars($variables['login']) ?>'</p>
        <p>Пароль: '<?= htmlspecialchars($variables['password']) ?>'</p>
        <p>Имя: '<?= htmlspecialchars($variables['name']) ?>'</p>
        <p>Email: '<?= htmlspecialchars($variables['email']) ?>'</p>
        <p>Код: '<?= htmlspecialchars($variables['code']) ?>'</p>
    </div>
    
    <div class="result <?= $results['password_strength'] ? 'success' : 'error' ?>">
        <h3>Результаты обработки:</h3>
        <p>Обработанный логин: '<?= htmlspecialchars($results['login']) ?>'</p>
        <p>Сложность пароля: <?= $results['password_strength'] ? '✅ Соответствует требованиям' : '❌ Не соответствует требованиям' ?></p>
        <p>Обработанное имя: '<?= htmlspecialchars($results['name']) ?>'</p>
        <p>Валидность email: <?= $results['email_valid'] ? '✅ Корректный email' : '❌ Некорректный email' ?></p>
        <p>Вывод кода: <?= $results['code'] ?></p>
    </div>
</body>
</html>