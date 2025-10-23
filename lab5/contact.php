<?php
declare(strict_types=1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Проверка на пустые поля
    if (empty($subject) || empty($body)) {
        $message = "<p>Пожалуйста, заполните все поля.</p>";
    } else {
        $to = "f1172017@xsph.ru";
        $from = "admin@center.ogu";
        $headers = "From: $from\r\n" .
            "Reply-To: $from\r\n" .
            "Content-Type: text/plain; charset=utf-8";

        if (mail($to, $subject, $body, $headers)) {
            $message = "<p>Сообщение успешно отправлено!</p>";
        } else {
            $message = "<p>Произошла ошибка при отправке сообщения.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Контакты</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>
        <!-- Заголовок -->
        <h1>Обратная связь</h1>
        <!-- Заголовок -->
        <!-- Область основного контента -->
        <h3>Адрес</h3>
        <address>123456 Москва, Малый Американский переулок 21</address>
        <h3>Задайте вопрос</h3>
        <form method='post'>
            <label>Тема письма: </label>
            <br>
            <input name='subject' type='text' size="50" required>
            <br>
            <label>Содержание: </label>
            <br>
            <textarea name='body' cols="50" rows="10" required></textarea>
            <br>
            <br>
            <input type='submit' value='Отправить'>
        </form>

        <?= $message ?>
        <!-- Область основного контента -->
    </section>

    <footer>
        <!-- Нижняя часть страницы -->
        &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
        <!-- Нижняя часть страницы -->
    </footer>
</body>

</html>