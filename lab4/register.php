<?php
session_start();
include 'config.php'; 
?>


<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <input type="submit" name="register" value="Register">
</form>
<a href="login.php"><button type="button">Login</button></a>

<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Хешуємо пароль за допомогою md5()

    // Перевірка, чи існує вже такий користувач
    $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Користувач із таким ім'ям або email вже існує!";
    } else {
        // Додаю нового користувача до бази даних
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "Реєстрація успішна!";
        } else {
            echo "Помилка: " . $stmt->error;
        }
    }
}
?>
