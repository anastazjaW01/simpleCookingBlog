<?php 
require 'config/database.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    //get data to delete from database
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);

    //check that deleted is 1 row
    if(mysqli_num_rows($result) == 1){
        $post = mysqli_fetch_assoc($result);
        $image_name = $post['image_post'];
        $image_path = '../images/post_images/'. $image_name;

        if($image_path){
            //delete image
            unlink($image_path);

            //delete post from database 
            $delete_post = "DELETE FROM posts WHERE id=$id LIMIT 1";
            $delete_result = mysqli_query($conn, $delete_post);

            if(!mysqli_errno($conn)){
                $_SESSION['delete-post-succ'] = "Post deleted succesfully!";
            }
        }
    }

}
header('location: ' . $root . 'admin_user/');
die();
