<?php

require 'config/database.php';

//get user id
$id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
//check colormode in database 
$query = "SELECT * FROM  colormode WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$theme = mysqli_fetch_assoc($result);
//query to change color mode 
$query1 = "UPDATE colormode SET color_mode = 0 WHERE user_id = $id";
$query2 = "UPDATE colormode SET color_mode = 1 WHERE user_id = $id";

if($theme['color_mode'] == 0){
    mysqli_query($conn, $query2);
    header('location: ' . $root . 'admin_user/');
}else{
    mysqli_query($conn, $query1);
    header('location: ' . $root . 'admin_user/');
}

