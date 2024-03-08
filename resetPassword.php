<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset password</title>
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
        <a href="index.php" class="d-flex justify-content-center logo"><img src="images/path13547.svg" width=50 height="50"/></a>
            <h3>Simple Cooking</h3> 
        </div>
        <!-- show alert by php when validation error occurs -->
        <?php if(isset($_SESSION['signIn'])):?>
            <div>
            <p class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> 
            <?=$_SESSION['signIn'];
                unset($_SESSION['signIn']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
        <?php endif ?>
        <form action = "<?= $root ?>signIn_logic.php" method="POST" >
            <div class="form1 form-floating mt-2">
                <input type="password" class="form-control border-success" id="password" name="password" placeholder="Hasło" required>
                <span id="eyeButton" onclick="showHide()"><i class="bi bi-eye-fill tt" id="icon" onclick="changeIcon()" title="Show password"></i></span>
                <label for="password">Password</label>
                <div  class="progress tt" id="passStr" title="Password strenght">
                    <div id="passwordStrength" class="progress-bar bg-danger tt" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
                 <!-- wrong password alerts -->
                <div class="row wrong-alert alert_pass alert-hidden mt-1" id="alert_pass_length">
                    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> The password must be at least 8 characters long</p>
                </div>
                <div class="row wrong-alert alert_pass alert-hidden mt-1" id="alert_pass_upp_low">
                    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> The password must contain uppercase and lowercase letters!</p>
                </div>
                <div class="row wrong-alert alert_pass alert-hidden mt-1" id="alert_pass_number">
                    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> The password must contain numbers!</p>
                </div>
                <div class="row wrong-alert alert_pass alert-hidden mt-1" id="alert_pass_char">
                    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> The password must contain special chars!</p>
                </div>
            <!-- end of wrong password alerts -->
            <div class=" form1 form-floating mt-3">
                <input spellcheck="false" id="cpassword" name="cpassword" type="password"  class="form-control border-success"  placeholder="Repeat password" required>
                <span id="eyeButton1" onclick="showHide1()"><i class="bi bi-eye-fill tt" id="icon1" onclick="changeIcon1()" title="Show password"></i></span>
                <label for="cpassword">Re password</label>  
                <!-- password don't match alert -->
                <div class="row wrong-alert alert-hidden mt-1" id="match-pass-alert">
                    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg> Password doesn't match!</p>
                </div>
                <button type="submit" class="btn btn-success col-12 mt-4 mb-1" id="logowanie" name="submit">Reset password</button>
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
    <script src="scripts/resetPassword_validation.js?v=<?php echo time(); ?>"></script>
    </body>
</html>

