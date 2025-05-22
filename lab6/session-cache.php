<?php
session_start();

if (!isset($_SESSION['cachedData'])) {
    sleep(2); // Затримка симуляції обробки

    $data = [];
    for ($i = 0; $i < 20; $i++) {
        $data[] = [
            'product' => 'Товар ' . rand(1, 100),
            'price' => rand(100, 500)
        ];
    }

    $_SESSION['cachedData'] = $data;
} else {
    $data = $_SESSION['cachedData'];
}

echo "<h2>Список товарів</h2><ul>";
foreach ($data as $item) {
    echo "<li>{$item['product']} – {$item['price']} грн</li>";
}
echo "</ul>";
