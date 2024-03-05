<?php

require 'config/database.php';

if(isset($_GET['id'])) {

    //get comment id
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM comments WHERE id=$id";
    $result = mysqli_query($conn, $query);

    //check that only 1 comment is removed
    if(mysqli_num_rows($result) == 1){
        
        //delete comment from database
        $delete_query = "DELETE FROM comments WHERE id=$id LIMIT 1";
        $delete_result = mysqli_query($conn, $delete_query);

        //show allert if seccessfull
        if(!mysqli_errno($conn)) {
            $_SESSION['delete-com-succ'] = "Comment deleted successfully!";
        }
    }

}
header('location:' . $root . 'admin_user/manageComments.php');
die();