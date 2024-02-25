<?php

require 'config/connect.php';
$connection = new mysqli($host, $user, $password, $db_name);

if(isset($_POST['submit'])){

    //Get data from database
    $email = htmlspecialchars(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),ENT_QUOTES);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$email){
        $_SESSION['signIn'] = "Email or login required!";
    }elseif(!$password){
        $_SESSION['signIn'] = "Password required!";
    }else{
        //Get user from database with the given login or email
        $fetch_user_query = "SELECT * FROM users WHERE email='$email' OR login='$email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        //If user exist
        if(mysqli_num_rows($fetch_user_result) == 1){
            //convert to array
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            //compare passwords
            if(password_verify($password, $db_password)){
                //user session
                $_SESSION['user_id'] = $user_record['id'];
                //if user is admin
                if($user_record['is_admin'] == 1){
                    $_SESSION['is_admin'] = true;
                }
                //Log in user
                header('location: ' . $root . 'admin_user/');
            }else{
                $_SESSION['signIn'] = 'Login or password incorrect!';
            }
        }else{
            $_SESSION['signIn'] = "User not exist!";
        }
    }
    //If there is a problem, go back to logging in
    if(isset($_SESSION['signIn'])){
        $_SESSION['signIn-data'] = $_POST;
        header('location: ' . $root . 'signIn.php');
        die();
    }

}else{
    //Get back to login page 
    header('location: '. $root . 'logowanie.php');
}