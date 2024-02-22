<?php
require 'config/connect.php';

//connection with database
$connection = new mysqli($host, $user, $pass, $db_name);

//adding data when user click "create account button"

if(isset($_POST['submit'])){

//downloading variables from the form
$email = htmlspecialchars(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),ENT_QUOTES);
$login = htmlspecialchars(filter_var($_POST['login'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),ENT_QUOTES);
$password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpassword = filter_var($_POST['cpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$uppercase = preg_match('@[A-Z]@',$password);
$lowercase = preg_match('@[a-z]@',$password);
$number = preg_match('@[0-9]@',$password);
$specialchar = preg_match('/[\'!^$%&()@#?><,.=_+-]/',$password);

//RECAPTCHA


//validation of downloaded variables
if(!$login){
    $_SESSION['signUp'] = "Please enter your login!";
}elseif(!$email){
    $_SESSION['signUp'] = "Please enter your email!";
}elseif(strlen($password) < 8 || strlen($cpassword) < 8 ){
    $_SESSION['signUp'] = "The password must be at least 8 characters long!";
}elseif(!$uppercase || !$lowercase){
    $_SESSION['signUp'] = "The password must contain uppercase and lowercase letters!";
}elseif(!$number){
    $_SESSION['signUp'] = "The password must contain numbers!";
}elseif(!$specialchar){
    $_SESSION['signUp'] = "The password must contain special chars!";
}else{
    //match password
    if($password !== $cpassword){
        $_SESSION['signUp'] = "Password doesn't match!";
    }else{
        //hash password

        //check if email or username exist
    }

}


//back to signup in case of a problem


//add new user to database

}
else{
    //if button wasn't clicked
    header('location: '. $root . 'signUp.php');
}