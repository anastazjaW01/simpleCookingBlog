<?php
require 'config/database.php';

if(isset($_GET['id'])){

    //get user from database
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query="SELECT * FROM users WHERE id=$id";
    $result=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($result);

    //check that only 1 user is deleted
    if(mysqli_num_rows($result) == 1){

        //delete all posts and images deleted user
        $image_query="SELECT post_image FROM posts where user_id=$id";
        $image_result=mysqli_query($conn,$image_query);
        if(mysqli_num_rows($image_result) > 0){
            while ($image=mysqli_fetch_assoc($image_result)){
                $img_path='../images/post_images'.$image['post_image'];
            if($img_path){
                unlink($img_path);
                }
            }
        }

        //delete user from database
        $delete_user="DELETE FROM user WHERE id=$id";
        $delete_result=mysqli_query($conn,$delete_user);
        if(mysqli_errno($conn)){
        $_SESSION['delete_user']="The user '{$user['login']}' cannot be deleted from the database !";
        }else{
        $_SESSION['delete_user_succ']="User '{$user['login']}' has been successfully deleted !";
        }
    }
}
header('location: ' . $root . 'admin_user/manageUsers.php');
die();