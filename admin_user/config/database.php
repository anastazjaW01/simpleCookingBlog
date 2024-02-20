<?php
require 'config/connect.php';

$conn = new mysqli($host, $user, $pass, $db_name);

if( mysqli_errno($conn) ){
    die( mysqli_error($conn) );
}