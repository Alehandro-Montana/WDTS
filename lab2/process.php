<?php
// Перевірка, чи файл був успішно завантажений
if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
    $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
    $fileName = $_FILES['fileUpload']['name'];
    $fSize = $_FILES['fileUpload']['size'];
    $fType = $_FILES['fileUpload']['type'];
    

    if (!is_uploaded_file($fileTmpPath)) {
        die('Файл не є завантаженим через HTTP POST.');
    }
    
    // Перевірка розширення файлу (лише зображення)
    $allowedExt = ['image/png', 'image/jpg', 'image/jpeg'];
    if (!in_array($fType, $allowedExt)) {
        die('Тільки зображення (PNG, JPG, JPEG) можуть бути завантажені.');
    }

    // Перевірка розміру файлу (не більше 10 МБ)
    if ($fSize > 10 * 1024 * 1024) {
        die('Файл занадто великий. Максимальний розмір: 10 МБ.');
    }

    // Перевірка, чи файл вже існує в папці uploads
    $uploadDir = 'uploads/';
    $destination = $uploadDir . $fileName;

    //  додає унікальний суфікс до імені файлу
    if (file_exists($destination)) {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $destination = $uploadDir . $fileName;
    }

    // Переміщаємо завантажений файл у папку uploads
    if (move_uploaded_file($fileTmpPath, $destination)) {
        echo "Файл успішно завантажено!<br>";
        echo "Ім'я файлу: $fileName<br>";
        echo "Тип файлу: $fType<br>";
        echo "Розмір файлу: " . round($fSize / 1024, 2) . " КБ<br>";
        echo "Посилання для завантаження: <a href='$destination'>Завантажити файл</a>";
    } else {
        echo "Помилка при завантаженні файлу.";
    }
} else {
    echo "Помилка завантаження файлу.";
}
?>
