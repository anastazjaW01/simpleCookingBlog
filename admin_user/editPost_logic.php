<?php

require 'config/database.php';

//get variables from form
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = filter_var($_POST['title'],FILTER_SANITIZE_SPECIAL_CHARS);
    $recipe = filter_var($_POST['recipe'],FILTER_SANITIZE_SPECIAL_CHARS);
    //get ingredients array
    $ingredients = isset($_POST['ingridient']) ? $_POST['ingridient'] : array();
    $ingredients_array = implode(',', $ingredients);
    $previous_img_name=filter_var($_POST['previous_img_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

        //delete actual photo if add new 
        if($image['name']){
            $previous_img_path = '../images/post_images'.$previous_img_name;
            if($previous_img_path){
                unlink($previous_img_path);
            }

            //change new photo
            $current_time = time();
            $image_name = $current_time.$image['name'];
            $image_tmp = $image['tmp_name'];
            $path_image = '..images/post_images/'.$image_name;

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
                $_SESSION['edit_post'] = "The photo is too big!
                The size should be less than 2 meters.";
            }
          }else{
            $_SESSION['edit_post'] = "Photo must be in png, jpg or jpeg format!";
          }
        }
    }

    //back 
    if($_SESSION['edit_post']){
        header('location: ' . $root . 'admin_user/editPost.php?id='. $id);
        die();
    }else{

        //change image name
        $edit_image = isset($image_name) ? $image_name : $previous_img_name;

        //edit post in database
        $query = "UPDATE posts SET title = '$title', recipe_text = '$recipe', ingridients = '$ingredients_array', post_image = '$edit_image', time_needed = $time, portion_amount = $portion, difficult = $difficult, category_id = $category, id = $id LIMIT 1";
        $result = mysqli_query($conn,$query);
        if(!mysqli_errno($conn)){
            $_SESSION['edit-post-succ'] = "New post edited successfully!";
            header('location: ' .$root. 'admin_user/');
            die();
        }
    }
}
else{
    header('location: ' . $root . 'admin_user/');
    $_SESSION['edit_post'] = "The post hasn't been edited!";
    die();
}