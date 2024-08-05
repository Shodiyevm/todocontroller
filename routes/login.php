<?php
require_once 'src/DB.php';

$pdo = new DB();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = ?";
    $params = [$username];
    $user = $pdo->execute($sql, $params);
    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $username;
        header("location:/");
        exit();
    }
}                   