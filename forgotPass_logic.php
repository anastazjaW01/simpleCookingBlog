<?php 

session_start();

require 'config/connect.php';
require 'generateCodeFunction.php';

$connection = new mysqli($host, $user, $pass, $db_name);

if(isset($_POST['submit'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    $email_query = "SELECT * FROM users WHERE email=$email";
    $email_query_result = mysqli_query($connection, $email_query);

    if(mysqli_num_rows($email_query_result) > 0){
        $_SESSION['token'] = $sixDigitCode;
        handlePasswordReset($email, $sixDigitCode);
        echo "The reset code was sent to your email address.";
        header('Location:' . $root . 'confirmVerificationCode.php');
        exit();
    }else{
        $_SESSION['forgot'] = "Email doesn't exist!";
        die();
    }

}


