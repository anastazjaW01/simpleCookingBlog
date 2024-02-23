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
if(empty($login)){
    $_SESSION['signUp'] = "Please enter your login!";
}elseif(empty($email)){
    $_SESSION['signUp'] = "Please enter your email!";
}elseif(strlen($password) < 8 || strlen($cpassword) < 8 ){
    $_SESSION['signUp'] = "The password must be at least 8 characters long!";
}elseif(!$uppercase || !$lowercase){
    $_SESSION['signUp'] = "The password must contain uppercase and lowercase letters!";
}elseif(!$number){
    $_SESSION['signUp'] = "The password must contain numbers!";
}elseif(!$specialchar){
    $_SESSION['signUp'] = "The password must contain special chars!";
}elseif($password !== $cpassword){
    //match password
    $_SESSION['signUp'] = "Password doesn't match!";
}else
    {
        //hash password
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        //check if email or username exist
        $query_check_user = "SELECT * FROM users WHERE login='$login' OR email='$email'";
        $check_user_result = mysqli_query($connection,$query_check_user);
        if(mysqli_num_rows($check_user_result) > 0){
            $_SESSION['signUp'] = "Login or email is already in use!";
        }
    }

//back to signup in case of a problem
if(isset($_SESSION['signUp'])){
    $_SESSION['signUp_data'] = $_POST;
    header('location:'. $root . 'signUp.php');
    die();
}else{
    //add new user to database
    $query_insert_user = "INSERT INTO users (email, login, password, is_admin) VALUES ('$email', '$login', '$hashpassword', 0)";
    $insert_user_result = mysqli_query($connection, $query_insert_user);
    if(!mysqli_errno($connection)){
        //success
        $_SESSION['signUp-success'] = "Account created! Log in!";
        header('location: '. $root .'signIn.php');
        die();
    }
}
}else{
    //if button wasn't clicked
    header('location: '. $root . 'signUp.php');
}