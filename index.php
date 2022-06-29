<?php
$uri = $_SERVER['REQUEST_URI'];
header("refresh: 0; " . $uri . "/public");
echo 'loading....';
?>
