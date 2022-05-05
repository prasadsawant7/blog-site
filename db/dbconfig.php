<?php

$host = 'localhost';
$db = 'the_blog_site';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch(PDOException $e) {
    return $e;
}

?>
