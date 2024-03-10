<?php
require './config/database.php';

$_SESSION['url'] = $_SERVER['REQUEST_URI'];

//get user from database
if(isset($_SESSION['user_id'])){
    $id = filter_var($_SESSION['user_id'],FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT login FROM users WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $login = mysqli_fetch_assoc($result);
}

//get categories from database 
$main_category_query = "SELECT * FROM categories WHERE type=0";
$main_category_result = mysqli_query($conn, $main_category_query);
$addictional_category_query = "SELECT * FROM categories WHERE type=1";
$addictional_category_result = mysqli_query($conn, $addictional_category_query);

//get color_mode from database
if(isset($_SESSION['user_id'])){
$query_color_mode = "SELECT * FROM colormode WHERE user_id = $id";
$result_color_mode = mysqli_query($conn, $query_color_mode); // Corrected variable name
$theme = mysqli_fetch_assoc($result_color_mode); // Corrected variable name
$color_mode = $theme['color_mode'];

//conditions for color theme 
$bodyThemeClass = ($color_mode == 0) ? '' : 'dark-theme';
$logoTheme = ($color_mode == 0) ? 'path13547.svg' : 'pathWhite.svg';
$logoTextTheme = ($color_mode == 0) ? 'textGreen.svg' : 'textWhite.svg';
$dropdownThemeClass = ($color_mode == 0) ? '' : 'dropdown-menu-dark';
$btnText = ($color_mode == 0) ? '<i class="bi bi-moon-stars pe-2"></i>Dark mode' : '<i class="bi bi-brightness-high pe-2"></i>Light mode';
}

$currentPath = $_SERVER['REQUEST_URI'];

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
        <link rel="stylesheet" href="styles/dark_light_mode.css?v=<?php echo time(); ?>">
        <script src="scripts/colorTheme.js?v=<?php echo time(); ?>"></script>
        <link rel="Shortcut icon" href="images/pathwhite.svg">
    </head>
    <!--Set style for user logged in and not logged in--> 
    <?php if(isset($_SESSION['user_id'])) : ?>
    <body class="<?= $bodyThemeClass ?>">
    <?php else : ?>
    <body>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid p-0 position-relative" style="min-height:100vw">
    <!--Navbar--> 
    <nav class="color-nav navbar navbar-expand-lg bg-body-tertiary p-0">
    <div class="container-fluid">
    <?php if(isset($_SESSION['user_id'])) : ?>
    <a class="navbar-brand" aria-current="page" href="<?= $root ?>index.php"><img class="img-fluid m-2 logo" id="logo" width="40" height="40" src="images/<?= $logoTheme ?>"><img class="img-fluid" id="logoText" width="80" height="80" src="images/<?= $logoTextTheme ?>"></a>
    <?php else : ?>
    <a class="navbar-brand" aria-current="page" href="<?= $root ?>index.php"><img class="img-fluid m-2 logo" id="logo" width="40" height="40" src="images/path13547.svg"><img class="img-fluid" id="logoText" width="80" height="80" src="images/textGreen.svg"></a>
    <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link login-link <?=$active1?>" href="<?= $root ?>index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link login-link <?=$active3?>" href="<?= $root ?>about.php">About</a>
            </li>         
            <!--data-bs-auto-close="outside" -->
            <li class="nav-item dropdown login-link">
            <a class="nav-link dropdown-toggle <?=$active2?>" href="<?= $root ?>category.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category</a>
            <ul class="dropdown-menu <?= $dropdownThemeClass ?>">
            <?php while ($main_category=mysqli_fetch_assoc($main_category_result)) : ?>
            <li><a class="dropdown-item" href="<?=$root?>category.php?id=<?=$main_category['id']?>"><?=$main_category['name']?></a></li>
            <?php endwhile; ?>
            <li><hr class="dropdown-divider"></li>
            <li class="dropend block-menu">
                <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cuisines of the world</a>
                <ul class="dropdown-menu sub-menu <?= $dropdownThemeClass ?>">
                    <?php while($addictional_category = mysqli_fetch_assoc($addictional_category_result)) : ?>
                    <li><a class="dropdown-item" href="<?= $root ?>category.php?id=<?= $addictional_category['id'] ?>"><?= $addictional_category['name'] ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </li>
            </ul>
            </li>
            <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item dropdown login-link">
                <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person pe-1"></i><?php echo htmlspecialchars($login['login'])?>
                </a>
                <ul class="dropdown-menu sub-menu <?= $dropdownThemeClass ?>">
                    <li><a class="dropdown-item" href="<?= $root ?>admin_user/createPost.php"><i class="bi bi-plus-lg pe-2"></i>Add post</a></li>
                    <li><a class="dropdown-item" href="<?= $root ?>admin_user/"><i class="bi bi-person-gear pe-2"></i>Manage panel</a></li>
                    <li><form method="POST" action="<?= $root ?>colorMode.php">
                    <input type="hidden" name="current_page" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
                    <button class="dropdown-item" name="theme" type="submit" id="toogle-btn"><?= $btnText ?></button>
                    </form></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= $root ?>signOut.php"><i class="bi bi-box-arrow-right pe-2"></i>Sign out</a></li>
                </ul>
            </li>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link login-link" href="signIn.php">Log in</a>
            </li>
            <?php endif; ?>
        </ul>
        <form class="d-flex input-group justify-content-end searchForm mt-2 mt-sm-2 mt-md-2" role="search" action="<?= $root ?>search.php" method="GET">
        <input class="search form-control-sm border-0" type="search" name="search" placeholder="Search" aria-label="Search" aria-describedby="searchbtn">
        <button class="btn btn-sm btn-successNav border-0" type="submit" name="submit" id="searchbtn"><i class="bi bi-search"></i></button>
        </form>
    </div>  
    </div>
    </nav>