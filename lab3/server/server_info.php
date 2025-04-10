<?php
echo "IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "Назва та версія браузера: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "Назва скрипта: " . $_SERVER['PHP_SELF'] . "<br>";
echo "Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Шлях до файлу на сервері: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";

// Перевірка методу запиту
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: server_info.php");
    exit();
}
?>
