<?php
// Перевірка, чи існує папка uploads
$uploadDir = 'uploads/';
if (is_dir($uploadDir)) {
    // Отримуємо всі файли в директорії
    $files = scandir($uploadDir);

    echo "<h2>Список файлів у папці uploads:</h2>";

    // Перебираємо всі файли
    foreach ($files as $file) {
        // Пропускаємо поточні директорії "." і ".."
        if ($file != '.' && $file != '..') {
            echo "<a href='$uploadDir$file'>$file</a><br>";
        }
    }
} else {
    echo "Папка uploads не існує.";
}
?>
