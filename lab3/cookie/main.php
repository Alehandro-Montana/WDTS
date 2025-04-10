<?php
if (isset($_COOKIE['username'])) {
    echo "Привіт, " . $_COOKIE['username'] . "!";
} else {
    if (isset($_POST['username'])) {
        setcookie('username', $_POST['username'], time() + 7 * 24 * 60 * 60, '/');
        echo "Привіт, " . $_POST['username'] . "! Ви щойно ввели своє ім'я.";
    } else {
        echo "Введіть ваше ім'я:";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Ваше ім'я">
    <input type="submit" value="Зберегти">
</form>

<?php
// Кнопка для видалення cookie
if (isset($_POST['del_cookie'])) {
    setcookie('username', '', time() - 3600, '/');
    echo "Cookie було видалено.";
}
?>

<form method="POST">
    <input type="submit" name="del_cookie" value="Видалити cookie">
</form>
