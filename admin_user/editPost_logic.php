<?php

require 'config/database.php';

//get variables from form
if(isset($_POST['submit'])){
    $author_id = $_SESSION['user_id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipe = filter_var($_POST['recipe'],FILTER_SANITIZE_SPECIAL_CHARS);
    //get ingredients array
    $ingredients = isset($_POST['ingridient']) ? $_POST['ingridient'] : array();
    $ingredients_array = implode(',', $ingredients);
    $time = filter_var($_POST['time'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $portion = filter_var($_POST['portion'],FILTER_SANITIZE_NUMBER_INT);
    $category = filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $difficult = filter_var($_POST['star'],FILTER_SANITIZE_NUMBER_INT);
    $image = $_FILES['image'];

    if(!$title){
        $_SESSION['edit_post'] = "Can't edit post! Enter value.";
    }elseif(!$recipe){
        $_SESSION['edit_post'] = "Can't edit post! Enter value.";
    }elseif(!$ingredients){
        $_SESSION['edit_post'] = "Can't edit post! Enter value.";
    }elseif(!$time){
        $_SESSION['edit_post'] = "Can't edit post! Select value.";
    }elseif(!$portion){
        $_SESSION['edit_post'] = "Can't edit post! Select value.";
    }elseif(!$category){
        $_SESSION['edit_post'] = "Can't edit post! Select value.";
    }elseif(!$difficult){
        $_SESSION['edit_post'] = "Can't edit post! Select value.";
    }else{

    }
}
else{
    header('location: ' . $root . 'admin_user/');
    die();
}