<?php
require_once 'src/DB.php';
require_once 'src/Router.php';
require_once 'src/users.php';

$pdo = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $params = [$username, $email, $hashedPassword];
    $db->execute($sql, $params);
    
}

