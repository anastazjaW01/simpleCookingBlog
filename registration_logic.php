<?php
require 'config/connect.php';

//connection with database
$connection = new mysqli($host, $user, $pass, $db_name);

//adding data when user click "create account button"

if(isset($_POST['submit'])){
//downloading variables from the form

//RECAPTCHA


//validation of downloaded variables



//back to signup in case of a problem


//add new user to database

}
else{
    //if button wasn't clicked
    header('location: '. $root . 'signUp.php');
}