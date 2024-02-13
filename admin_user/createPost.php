<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <title>Create Post</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/createpost.css?v=<?php echo time(); ?>">
        <link rel="Shortcut icon" href="../images/pathwhite.svg"> 
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <div class="container-fluid m-0 p-0 position-relative" style="min-height: 100vh;">
            <!--Navbar--> 
            <nav class="color-nav navbar navbar-expand-lg bg-body-tertiary p-0">
                <div class="container-fluid">
                <a class="navbar-brand" aria-current="page" href="homePage.php"><img class="img-fluid m-2 logo" width="40" height="40" src="../images/path13547.svg"><img class="img-fluid " width="80" height="80" src="../images/textGreen.svg"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link login-link" href="homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link login-link" href="about.php">About</a>
                </li>         
                <!--data-bs-auto-close="outside" -->
                <li class="nav-item dropdown login-link">
                <a class="nav-link dropdown-toggle" href="category.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="category.php">Soups</a></li>
                    <li><a class="dropdown-item" href="#">Desserts</a></li>
                    <li><a class="dropdown-item" href="#">Salads</a></li>
                    <li><a class="dropdown-item" href="#">Snacks</a></li>
                    <li><a class="dropdown-item" href="index.php">Dinners</a></li>
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
                    <a class="nav-link login-link" href="index.php">Log in</a>
                </li>
                </ul>
                <form class="d-flex input-group justify-content-end searchForm mt-2 mt-sm-2 mt-md-2" role="search">
                    <input class="search form-control-sm border-0" type="search" placeholder="Search" aria-label="Search" aria-describedby="searchbtn">
                    <button class="btn btn-sm btn-success border-0" type="submit" id="searchbtn"><i class="bi bi-search"></i></button>
                </form>
                </div>  
                </div>
            </nav>

            <!--Container-->
            <div class="container-fluid main-container">
                <form>
                <div class="row">
                    <div class="col-8">
                        <div class="row" style="height: 80%;">
                            <div class="col-8">
                                <div><div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="Fruit salad">
                                         <label for="floatingInput">Title</label>
                                </div></div>
                                <div>
                                <div class="form-floating">
                                    <textarea class="form-control" style="height: 100%;" placeholder="Write recipe text here..." id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Recipe</label>
                                </div>
                                </div>
                            </div>
                            <div class="col-4 ingredients" id="ingredients">Ingredients
                                <div class="ingredient">
                                    <i class="bi bi-dot"></i>
                                    <input type="text" placeholder="ingredient">
                                    <i class="bi bi-x" id="remove"></i>
                                </div>
                                <div class="add_ingredient" id="add_ingredient" onclick="add_ingredient()">
                                <i class="bi bi-plus"></i>Add next
                                </div>
                            </div>
                        </div>
                        <div class="row" style="height: 20%;">
                            <div class="col-8">Image
                            <div class="mb-3">
                                <input class="form-control" type="file" accept=".jpg, .jpeg, .png" id="formFile">
                            </div>    
                            </div>
                            <div class="col-2">Time
                                <div class="input-group mb-3">
                                 <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-clock-fill"></i></label>
                                    <select class="form-select" id="inputGroupSelect01">
                                         <option selected>Choose...</option>
                                         <option value="1">One</option>
                                         <option value="2">Two</option>
                                         <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">Portion
                            <div class="input-group mb-3">
                                 <label class="input-group-text" for="inputGroupSelect02"><i class="bi bi-pie-chart-fill"></i></label>
                                    <select class="form-select" id="inputGroupSelect02">
                                         <option selected>Choose...</option>
                                         <option value="1">One</option>
                                         <option value="2">Two</option>
                                         <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row" style="height: 80%;">Category
                            <label><input class="" type="radio" value="1" name="category">1</label>
                            <label><input class="" type="radio" value="2" name="category">2</label>
                            <label><input class="" type="radio" value="3" name="category">3</label>
                            <label><input class="" type="radio" value="4" name="category">4</label>
                            <label><input class="" type="radio" value="5" name="category">5</label>
                        </div>
                        <div class="row" style="height: 20%;"><p class="section-title">Difficult</p>
                            <ul class="star_rating">
                                <li class="star" id="5"><label><input type="radio" value="5" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="4"><label><input type="radio" value="4" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="3"><label><input type="radio" value="3" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="2"><label><input type="radio" value="2" name="star"><i class="bi bi-star-fill"></i></label></li>
                                <li class="star" id="1"><label><input type="radio" value="1" name="star"><i class="bi bi-star-fill"></i></label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 pt-3">
                    <div class="col-4"><button class="btn btn-success" type="reset">Reset</button></div>
                    <div class="col-4"><button class="btn btn-success" type="submit">Submit</button></div>
                </div>
                </form>
            </div>
            <!--Footer-->
            <footer class="footer">
            <div class="row mt-1" style="width: 100%;">
            <div class="col-lg-4 col-sm-12 footer-elem">
              <a class="nolink" href="mailto:anxxxxxxxxxxxzzyyya15@gmail.com"><p><i class="bi bi-envelope-fill"></i>
               <br>anxxxxxxxxxxxzzyyya15@gmail.com</p></a>
            </div>
            <div class="col-lg-4 col-sm-12 footer-elem"> &#169; Anastazja Wierzbicka <br>2024</div>
            <div class="col-lg-4 col-sm-12 footer-elem">
            <a class="smLink" href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
            <a class="smLink" href="https://pl.linkedin.com/"><i class="bi bi-linkedin"></i></a>
            <a class="smLink" href="https://github.com/"><i class="bi bi-github"></i></a>
            </div>
        </div>
            </footer>
            
        </div>
        <script src="../scripts/createPost.js?v=<?php echo time(); ?>"></script>
    </body>
</html>