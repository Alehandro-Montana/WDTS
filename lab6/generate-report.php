<?php
$cacheFile = 'cache/report.html';
$cacheTime = 600; // 10 хвилин 

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheTime)) {
    echo file_get_contents($cacheFile);
    exit;
}

sleep(3);

$report = "<h1>Звіт</h1><table border='1'>";
for ($i = 0; $i < 1000; $i++) {
    $name = 'Ім’я_' . rand(1, 100);
    $sum = rand(100, 1000);
    $date = date('Y-m-d', strtotime('-' . rand(0, 365) . ' days'));
    $report .= "<tr><td>$name</td><td>$sum</td><td>$date</td></tr>";
}
$report .= "</table>";

file_put_contents($cacheFile, $report);
echo $report;
