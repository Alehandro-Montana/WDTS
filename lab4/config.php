<?php

$conn = mysqli_connect("mysql", "started-user", "started-password", "users_db");

// Перевірка з'єднання
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "MySQL Connection successful!";
?>
