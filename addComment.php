<?php
require 'config/database.php';

$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

    if(isset($_SESSION['user_id']) or isset($_SESSION['is_admin'])){
        if(!$comment){
            $_SESSION['add_com'] = "The comment cannot be empty!";
        }else{
            //get user login if user is logged in 
            $current_user_id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
        
            //add user comment to database
            $query_add_comm = "INSERT INTO comments (post_id, user_id, comm_text) 
            VALUES ($id, '$current_user_id', '$comment')";
            $result_add_comm = mysqli_query($conn, $query_add_comm);

            if(!mysqli_errno($conn)){
                $_SESSION['add-comm-succ'] = "New comment add succesfully!";
                header('location: ' . $root . 'singlePost.php?id='.$id);
                die();
            }
        }
    }else{
        $_SESSION['add-comm-error'] = "Log in to add a comment!";
        header('location: ' .$root. 'signIn.php');
        die();
    }  
}

header ('location: ' .$root. 'singlePost.php?id='.$id);
die();