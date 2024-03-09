<?php
require 'config/database.php';

//add like function
function add_like($conn, $post_id, $user_id){
    $query = "INSERT INTO likes (post_id, user_id) VALUES (?, ?)";
    $stmt = $conn -> prepare($query);
    $stmt -> bind_param('ii', $post_id, $user_id);
    $stmt -> execute();

    $like_query = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
    $stmt = $conn -> prepare($like_query);
    $stmt -> bind_param('i', $post_id);
    $stmt -> execute();

}  

//remove like function
function remove_like($conn, $post_id, $user_id){
    $query = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn -> prepare($query);
    $stmt -> bind_param('ii', $post_id, $user_id);
    $stmt -> execute();

    $like_query = "UPDATE posts SET likes = likes - 1 WHERE id = ?";
    $stmt = $conn -> prepare($like_query);
    $stmt -> bind_param('i', $post_id);
    $stmt -> execute();

} 

if(isset($_SESSION['user_id'])){

    if(isset($_GET['id'])){

        $post_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];

        //check that user like post 
        $query = "SELECT COUNT(*) AS count FROM likes WHERE post_id = ? AND user_id = ?";
        $stmt = $conn -> prepare($query);
        $stmt -> bind_param('ii', $post_id, $user_id);
        $stmt -> execute();
        $result = $stmt -> get_result() -> fetch_assoc();

        if($result['count'] == 0){
            //if the user did not like the post, call the add_like function
            add_like($conn, $post_id, $user_id);
        }else{
            //if the user liked the post, call the remove_like function
            remove_like($conn, $post_id, $user_id);
        }
    }

    header('location: ' . $root . 'index.php');
    die();

} else {

    header('location: ' . $root . 'signIn.php');
    die();
}



