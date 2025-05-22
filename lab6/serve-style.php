<?php
$path = 'style.css';
header('Content-Type: text/css');
header('Cache-Control: public, max-age=86400'); // кешування на 1 добу
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 86400) . ' GMT');
readfile($path);
