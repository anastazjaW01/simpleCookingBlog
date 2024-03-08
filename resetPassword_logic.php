<?php

session_start();
require 'config/connectSession.php';
$connection = new mysqli($host, $user, $pass, $db_name);

if(isset($_SESSION['token'])){
    if(isset($_POST['submit'])){

        //get password, cpassword and validation
        $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $cpassword = filter_var($_POST['cpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $uppercase = preg_match('@[A-Z]@',$password);
        $lowercase = preg_match('@[a-z]@',$password);
        $number = preg_match('@[0-9]@',$password);
        $specialchar = preg_match('/[\'!^$%&()@#?><,.=_+-]/',$password);

        if(empty($password)){
            $_SESSION['reset_pass'] = "Please enter your password!";
        }elseif(empty($cpassword)){
            $_SESSION['reset_pass'] = "Please enter your re-password!";
        }elseif(!$uppercase || !$lowercase){
            $_SESSION['reset_pass'] = "The password must contain uppercase and lowercase letters!"; 
        }elseif(!$number){
            $_SESSION['reset_pass'] = "The password must contain numbers!"; 
        }elseif(!$specialchar){
            $_SESSION['reset_pass'] = "The password must contain special chars!"; 
        }elseif($password !== $cpassword){
            $_SESSION['reset_pass'] = "Password doesn't match!";       
        }

        //back if is validation error
        if(isset($_SESSION['reset_pass'])){
            header('location: ' . $root . 'resetPassword.php');
            die();
        }else{
            //hash password
            $hashpassword = password_hash($password,PASSWORD_DEFAULT);
            $token = $_SESSION['token'];

            //update password in databse
            //$query = "UPDATE users SET password=$hashpassword WHERE token=$token";
            //$result = mysqli_query($connection, $query);
            //$rowsAffected = mysqli_affected_rows($query);
            $stmt = $connection->prepare("UPDATE users SET password = ? WHERE token = ?");
            $stmt->bind_param("ss", $hashpassword, $token);
            $stmt->execute();
            $rowsAffected = $stmt->affected_rows;

            //set token to 0 if password is update successfully
            if($rowsAffected > 0){
                $token_query = "UPDATE users SET token = 0 WHERE token = $token";
                $token_result = mysqli_query($connection, $token_query);
                unset($_SESSION['token']);
                $_SESSION['reset_pass_succ'] = "Password changed successfully!";
            }else{
                $_SESSION['reset'] = "Password change failed!";
                header('location: ' . $root . 'resetPassword.php');
            }
        }
    }
}

header('location: ' . $root . 'signIn.php');
die();