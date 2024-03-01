<?php 
require 'config/database.php';
//$connection = new mysqli($host, $user, $pass, $db_name);

//get data from form
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

          //change image name
          $current_time = time();
          $image_name = $current_time.$image['name'];
          $image_tmp = $image['tmp_name'];
          $path_image = "../images/post_images/". $image_name;

          //validation input file
          $allowed_file = ['png', 'jpg', 'jpeg'];
          $extension = explode('.', $image_name);
          $extension = end($extension);

          if(in_array($extension, $allowed_file)){
            //check file size
            if($image['size'] < 2000000){
                //save file in images
                move_uploaded_file($image_tmp, $path_image);
            }else{
                $_SESSION['add_post'] = "The photo is too big!
                The size should be less than 2 meters.";
            }
          }else{
            $_SESSION['add_post'] = "Photo must be in png, jpg or jpeg format!";
          }
    }

    //back to createPost page if something is wrong 
    if(isset($_SESSION['add_post'])){
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . $root . 'admin_user/createPost.php');
        die();
    }else{

        //add post to database
        $query = "INSERT INTO posts (title, recipe_text, ingridients, post_image, time_needed, portion_amount, difficult, category_id, user_id) VALUES ('$title', '$recipe', '$ingredients_array', '$image_name', $time, $portion, $difficult, $category, $author_id);";
        $result = mysqli_query($conn,$query);
        if(!mysqli_errno($conn)){
            $_SESSION['add-post-succ'] = "New post added successfully!";
            header('location: ' .$root. 'admin_user/');
            die();
        }
    }
}else{

//back to createPost.php page if something is wrong 
header('location: ' .$root. 'admin_user/createPost.php');
}