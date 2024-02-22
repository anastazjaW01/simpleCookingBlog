<?php

require './config/database.php';

$script="";
if($name=="homepage"){ 
    $style=$name;
    $active1="active";
    $title="Home";
}
elseif($name=="singlePost"){
     $style=$name;
     $title="Recipe";
     $script="<script src='scripts/singlePost.js'></script>";
    }
elseif($name=="search"){ 
    $style=$name;
    $title="Search";
}
elseif($name=="category"){ 
    $style=$name;
    $active2="active";
    $title="Category";
}
elseif($name=="about"){ 
    $style=$name;
    $active3="active";
    $title="About";
    $script="<script src='scripts/about.js'></script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$title?></title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/navbar_footer.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="styles/<?=$style?>.css?v=<?php echo time(); ?>">
        <link rel="Shortcut icon" href="images/pathwhite.svg">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid p-0 position-relative" style="min-height:100vw">
    <!--Navbar--> 
    <nav class="color-nav navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container-fluid">
    <a class="navbar-brand" aria-current="page" href="index.php"><img class="img-fluid m-2 logo" width="40" height="40" src="images/path13547.svg"><img class="img-fluid " width="80" height="80" src="images/textGreen.svg"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link login-link <?=$active1?>" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link login-link <?=$active3?>" href="about.php">About</a>
            </li>         
            <!--data-bs-auto-close="outside" -->
            <li class="nav-item dropdown login-link">
            <a class="nav-link dropdown-toggle <?=$active2?>" href="category.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category</a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="category.php">Soups</a></li>
            <li><a class="dropdown-item" href="#">Desserts</a></li>
            <li><a class="dropdown-item" href="#">Salads</a></li>
            <li><a class="dropdown-item" href="#">Snacks</a></li>
            <li><a class="dropdown-item" href="#">Dinners</a></li>
            <li><a class="dropdown-item" href="#">Bread</a></li>
            <li><hr class="dropdown-divider"></li>
            <li class="dropend block-menu">
                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cuisines of the world</a>
                <ul class="dropdown-menu sub-menu">
                <li><a class="dropdown-item" href="#">Italian</a></li>
                <li><a class="dropdown-item" href="#">Spanish</a></li>
                <li><a class="dropdown-item" href="#">Asian</a></li>
                <li><a class="dropdown-item" href="#">American</a></li></ul>
            </li>
            </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link login-link" href="signIn.php">Log in</a>
            </li>
        </ul>
        <form class="d-flex input-group justify-content-end searchForm mt-2 mt-sm-2 mt-md-2" role="search" action="search.php">
        <input class="search form-control-sm border-0" type="search" placeholder="Search" aria-label="Search" aria-describedby="searchbtn">
        <button class="btn btn-sm btn-success border-0" type="submit" id="searchbtn"><i class="bi bi-search"></i></button>
        </form>
    </div>  
    </div>
    </nav>