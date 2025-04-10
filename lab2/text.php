<?php
// Перевірка, чи текст надійшов через POST
if (isset($_POST['textInput'])) {
    $textInput = $_POST['textInput'];

    // Перевірка на порожній ввід
    if (empty($textInput)) {
        die('Текст не може бути порожнім.');
    }

    // Записуємо текст у файл log.txt
    $logFile = 'log.txt';
    file_put_contents($logFile, $textInput . "\n", FILE_APPEND);

    echo "Текст успішно записано в файл!";
} else {
    echo "Текст не був надісланий.";
}
?>
