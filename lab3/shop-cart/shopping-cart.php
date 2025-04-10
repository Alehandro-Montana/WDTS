<?php
session_start();

// Додавання товару до кошика
if (isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;
}

// Виведення корзини
echo "Ваш кошик: <br>";
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $product) {
        echo $product . "<br>";
    }
} else {
    echo "Кошик порожній.";
}

// Додавання товарів до попередніх покупок 
if (isset($_SESSION['cart'])) {
    setcookie('previous_purchases', implode(', ', $_SESSION['cart']), time() + 30 * 24 * 60 * 60, '/');
}

// Виведення попередніх покупок
if (isset($_COOKIE['previous_purchases'])) {
    echo "Попередні покупки: " . $_COOKIE['previous_purchases'];
}
?>

<form method="POST">
    <input type="text" name="product" placeholder="Товар">
    <input type="submit" name="add_to_cart" value="Додати до кошика">
</form>
