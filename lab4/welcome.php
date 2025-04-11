<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>
<br><a href="logout.php">Logout</a>
