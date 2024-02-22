<?php
require './config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
        <link rel="Shortcut icon" href="images/pathwhite.svg">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row">
        <div class="login col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 ">
        <div class="row">
        <a href="index.php" class="d-flex justify-content-center"><img src="images/path13547.svg" width=50 height="50"/></a>
            <h3>Simple Cooking</h3> 
        </div>
        <form>
            <div class="form1 form-floating mt-2">
                <input type="email" id="email" name="email" value=""  class="form-control border-success" placeholder="jan-kowalski@example.com">
                <label for="email">Email</label>
            </div>
            <div class=" form1 form-floating mt-3">
                <input type="password" class="form-control border-success" id="password" name="password" placeholder="Hasło">
                <span id="eyeButton" class="eyeButton2" onclick="showHide()"><i class="bi bi-eye-fill" id="icon" onclick="changeIcon()"></i></span>
                <label for="password">Password</label>
                <div class="row mt-1">
                    <div class="col-6">
                    <input class="form-check-input" name="is_featured" type="checkbox" id="flexCheckDefault" style="border: seagreen 1px solid" checked>
                <label class="form-check-label checkBtn" for="flexCheckDefault">
                    Remember me
                </label>
                    </div>
                    <div class="col-6">
                    <a href="forgotPass.php" class="fp link"> Forgot password?</a></div>
                </div>
                <button type="submit" class="btn btn-success col-12 mt-1 mb-1" id="logowanie" name="submit">Sing in</button>
                <p style="color: #0f5132; font-size: small">You dont have an account yet?
                <a class="link-success fw-bold " href="signUp.php" style="font-size: small">Sing up</a></p>
            </div>
        </form>
        </div>
        </div>
        <div class="row">
        <footer class="footter col-md-4 offset-md-4  col-sm-6 offset-sm-3">
        <p>&#169; Anastazja Wierzbicka 2023</p>
        </footer>
        </div>
    </div>
    <script src="scripts/eyeChange.js"></script>
    </body>
</html>