<?php
require 'config/connect.php';

//delete all start session and back to login page
session_destroy();
header('location: ' . $root . 'signIn.php');
die();