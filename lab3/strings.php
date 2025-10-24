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
	
	$login = ' User ';
	$password = 'megaP@ssw0rd';
	$name = 'иван';
	$email = 'ivan@petrov.ru';
	$code = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php
	/*
	ЗАДАНИЕ 2
	- Используя строковые функции, удалите пробельные символы в начале и конце переменной $login, а также сделайте все символы строчными (малыми)
	- Проверьте значение переменной $password на сложность: пароль должен содержать минимум одну заглавную латинскую букву, одну строчную и одну цифру, а длина должна быть не меньше 8 символов. Оформите полученный код в виде пользовательской функции.
	- Используя строковые функции, сделайте первый символ значения переменной $name прописной (большой)
	- Используя функцию фильтрации переменных проверьте корректность значения $email
	- Используя строковые функции выведите значение переменной $code в браузер в том же виде как она задана в коде
	*/
	
	// Обработка логина
	$login = trim($login);
	$login = strtolower($login);
	echo "Обработанный логин: '$login'<br>";
	
	// Функция проверки сложности пароля
	function checkPasswordStrength($password) {
		if (strlen($password) < 8) {
			return false;
		}
		
		if (!preg_match('/[A-Z]/', $password)) {
			return false;
		}
		
		if (!preg_match('/[a-z]/', $password)) {
			return false;
		}
		
		if (!preg_match('/[0-9]/', $password)) {
			return false;
		}
		
		return true;
	}
	
	// Проверка пароля
	$isPasswordStrong = checkPasswordStrength($password);
	echo "Пароль сложный: " . ($isPasswordStrong ? 'да' : 'нет') . "<br>";
	
	// Обработка имени
	$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
	echo "Обработанное имя: $name<br>";
	
	// Проверка email
	$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
	echo "Email корректный: " . ($isEmailValid ? 'да' : 'нет') . "<br>";
	
	// Вывод кода
	echo "Код: " . htmlspecialchars($code) . "<br>";
?>
</body>
</html>
