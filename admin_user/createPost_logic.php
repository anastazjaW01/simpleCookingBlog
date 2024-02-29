<?php 
require 'config/connect.php';
$connection = new mysqli($host, $user, $pass, $db_name);

//get data from form
if(isset($_POST['submit'])){
    $autor_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipe = filter_var($_POST['recipe'],FILTER_SANITIZE_SPECIAL_CHARS);
    //get ingredients array
    $ingredients = isset($_POST['ingridient']) ? $_POST['ingridient'] : array();
    $ingredients_array = implode(',', $ingredients);
    $time = (floatval($_POST['time']));
    $portion = filter_var($_POST['portion'],FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $difficult = filter_var($_POST['star'],FILTER_SANITIZE_NUMBER_INT);
    $image = $_FILES['image'];


    //form validation
    if(!$title){
        $_SESSION['add_post'] = "Please enter a title!";
    }elseif(!$recipe){
        $_SESSION['add_post'] = "Please enter a recipe text!";
    }elseif(!$ingredients){
        $_SESSION['add_post'] = "Please enter ingredients!";
    }elseif(!$time){
        $_SESSION['add_post'] = "Please select a time!";
    }elseif(!$portion){
        $_SESSION['add_post'] = "Please select the number of portion!";
    }elseif(!$category){
        $_SESSION['add_post'] = "Please select a category";
    }elseif(!$difficult){
        $_SESSION['add_post'] = "Please select difficulty level!";
    }else{

 
        
    }
}

//back to createPost.php page if something is wrong 
header('location: ' .$root. 'admin_user/createPost.php');