<?php
session_start();

// Час останньої активності
if (isset($_SESSION['last_activity'])) {
    $inactive = time() - $_SESSION['last_activity'];
    if ($inactive > 300) { // 5 хвилин бездіяльності
        session_unset();
        session_destroy();
        echo "Сесія завершена через 5 хвилин бездіяльності.";
    }
}
// оновлення часу останньої активності
$_SESSION['last_activity'] = time(); 
?>
