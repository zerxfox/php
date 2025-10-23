<?php
require_once 'inc/lib.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <!-- Заголовок -->
    <h1>Таблица умножения</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <form action=''>
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value='<?php echo isset($_GET['cols']) ? $_GET['cols'] : ''; ?>'>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value='<?php echo isset($_GET['rows']) ? $_GET['rows'] : ''; ?>'>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='<?php echo isset($_GET['color']) ? $_GET['color'] : '#ff0000'; ?>' list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>
		<option>#00ff00</option>
		<option>#0000ff</option>
	</datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php 
    // Получаем параметры из формы или используем произвольные значения по умолчанию
    $cols = isset($_GET['cols']) ? (int)$_GET['cols'] : 6;
    $rows = isset($_GET['rows']) ? (int)$_GET['rows'] : 8;
    $color = isset($_GET['color']) ? $_GET['color'] : 'lightgreen';
    
    // Вызываем функцию getTable() с параметрами из формы или произвольными
    getTable($rows, $cols, $color);
    ?>
    <!-- Таблица -->
    <!-- Область основного контента -->
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a></li>
      <li><a href='about.php'>О нас</a></li>
      <li><a href='contact.php'>Контакты</a></li>
      <li><a href='table.php'>Таблица умножения</a></li>
      <li><a href='calc.php'>Калькулятор</a></li>
    </ul>
    <!-- Меню -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>