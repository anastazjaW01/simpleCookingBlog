<?php 
session_start();
require 'config/connectSession.php';
$connection = new mysqli($host, $user, $pass, $db_name);

if(isset($_SESSION['token'])){
    if(isset($_POST['submit'])){
    $code = filter_var($_POST['code'], FILTER_SANITIZE_NUMBER_INT);
    $token = $_SESSION['token'];

    $stmt = $connection -> prepare("SELECT * FROM users WHERE token = ?");
    $stmt -> bind_param("s", $code);
    $stmt -> execute();
    $result = $stmt -> get_result();

    if($result -> num_rows > 0 && $code === $token){
        header('Location: ' . $root . 'resetPassword.php');
        exit();
    }else{
        $_SESSION['code'] = "Invalid code!";
    }
  }
}
header('Location: ' . $root . 'confirmVerificationCode.php');
die();