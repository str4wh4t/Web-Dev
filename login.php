<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

$username_valid = "unnes";
$password_valid = "12345";

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.html");
    exit;
}
    
$username = trim($_POST['username']); 
$password = $_POST['password'];

if (($username === $username_valid) && ($password === $password_valid)) {
    session_regenerate_id(true);

    $_SESSION['user'] = [
        "username" => $username,
        "login_at" => date("Y-m-d H:i:s") 
    ];

    $_SESSION['login_count'] = ($_SESSION['login_count'] ?? 0) + 1;

    echo "Selamat datang : " . htmlspecialchars($username) . 
         " anda telah login sebanyak: " . $_SESSION['login_count'] . " kali<br>";
    echo "Login pada: " . date("H:i:s") . " WIB<br>"; 
    echo '<br>';
    echo '<a href="index.html">Back</a><br>';
    echo '<a href="logout.php">Logout</a>';

} else {
    $_SESSION['error'] = "Username atau password salah";
    header("Location: login.html");
    exit;
}
?>