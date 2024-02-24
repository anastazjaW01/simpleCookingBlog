<?php
require 'config/connect.php';

//Connection with database
$connection = new mysqli($host, $user, $pass, $db_name);

//Adding data when user click "create account button"

if(isset($_POST['submit_rec'])){

//Downloading variables from the form
$email = htmlspecialchars(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL),ENT_QUOTES);
$login = htmlspecialchars(filter_var($_POST['login'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),ENT_QUOTES);
$password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpassword = filter_var($_POST['cpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$uppercase = preg_match('@[A-Z]@',$password);
$lowercase = preg_match('@[a-z]@',$password);
$number = preg_match('@[0-9]@',$password);
$specialchar = preg_match('/[\'!^$%&()@#?><,.=_+-]/',$password);

//RECAPTCHA
$secretKey = getenv('RECAPTCHA_KEY');
$postData = $valErr = $statusMsg = '';
$status = 'error';

// Checking if the reCAPTCHA response variable is set and not empty
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    $api_captcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    
    // Data to be sent in the POST request to the reCAPTCHA API
    $resq_data = array(
        'secret' => $secretKey,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    );

    // Configuration options for cURL request
    $curlConfig = array(
        CURLOPT_URL => $api_captcha_url,
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $resq_data
    );

    // Initialize cURL session
    $ch = curl_init();
    curl_setopt_array($ch, $curlConfig);
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response from reCAPTCHA API into an object
    $responseData = json_decode($response);


//Validation of downloaded variables
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
}elseif(!($responseData && isset($responseData->success) && $responseData->success === true)){
    $_SESSION['signUp'] = "Recaptcha verification failed!";
}elseif($password !== $cpassword){
    //Match password
    $_SESSION['signUp'] = "Password doesn't match!";
}else
    {
        //Hash password
        $hashpassword = password_hash($password,PASSWORD_DEFAULT);
        //Check if email or username exist
        $query_check_user = "SELECT * FROM users WHERE login='$login' OR email='$email'";
        $check_user_result = mysqli_query($connection,$query_check_user);
        if(mysqli_num_rows($check_user_result) > 0){
            $_SESSION['signUp'] = "Login or email is already in use!";
        }
    }
}
//Back to signup in case of a problem
if(isset($_SESSION['signUp'])){
    $_SESSION['signUp_data'] = $_POST;
    header('location:'. $root . 'signUp.php');
    die();
}else{
    //Add new user to database
    $query_insert_user = "INSERT INTO users (email, login, password, is_admin) VALUES ('$email', '$login', '$hashpassword', 0)";
    $insert_user_result = mysqli_query($connection, $query_insert_user);
    if(!mysqli_errno($connection)){
        //Success
        $_SESSION['signUp-success'] = "Account created! Log in!";
        header('location: '. $root .'signIn.php');
        die();
    }
}

}else{
    //If button wasn't clicked
    header('location: '. $root . 'signUp.php');
}