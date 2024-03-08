<?php 

session_start();

require 'config/connectSession.php';
require 'generateCodeFunction.php';

$connection = new mysqli($host, $user, $pass, $db_name);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    
    $email_query = "SELECT * FROM users WHERE email='$email'";
    $email_query_result = mysqli_query($connection, $email_query);

    if(mysqli_num_rows($email_query_result) > 0){
        $_SESSION['token'] = $sixDigitCode;
        handlePasswordReset($email, $sixDigitCode);

        header('Location:' . $root . 'confirmVerificationCode.php');
        die();
    }else{
        $_SESSION['forgot'] = "Email doesn't exist!";
        die();
    }

}


