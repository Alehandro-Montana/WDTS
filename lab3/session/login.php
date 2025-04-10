<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Привіт, " . $_SESSION['username'] . "!";
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        // Перевірка логіну та паролю
        if ($_POST['login'] == 'admin' && $_POST['password'] == 'password') {
            $_SESSION['username'] = $_POST['login'];
            echo "Вітаємо, " . $_SESSION['username'] . "! Ви успішно увійшли.";
        } else {
            echo "Невірний логін або пароль.";
        }
    } else {
        echo "Будь ласка, увійдіть за допомогою логіну та паролю.";
    }
}
?>

<form method="POST">
    <input type="text" name="login" placeholder="Логін">
    <input type="password" name="password" placeholder="Пароль">
    <input type="submit" value="Увійти">
</form>

<?php
// Кнопка для виходу
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "Ви вийшли. <a href='login.php'>Увійти знову</a>";
}
?>

<form method="POST">
    <input type="submit" name="logout" value="Вихід">
</form>
