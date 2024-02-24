<?php
require './config/database.php';

//Get recaptcha public key
$public_key = getenv('PUBLIC_KEY');

//Adding session variable retrieval and cleanup after signup process
$email = isset($_SESSION['signUp_data']['email']) ? $_SESSION['signUp_data']['email'] : null;
$login = isset($_SESSION['signUp_data']['login']) ? $_SESSION['signUp_data']['login'] : null;
$password = isset($_SESSION['signUp_data']['password']) ? $_SESSION['signUp_data']['password'] : null;
$cpassword = isset($_SESSION['signUp_data']['cpassword']) ? $_SESSION['signUp_data']['cpassword'] : null;
unset($_SESSION['signUp_data']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
        <script src="scripts/recaptcha.js?v=<?php echo time(); ?>"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
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
        <!-- show alert by php when validation error occurs -->
        <?php if(isset($_SESSION['signUp'])):?>
            <div>
            <p class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> 
            <?=$_SESSION['signUp'];
                unset($_SESSION['signUp']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
        <?php endif ?>
        <form action="<?= $root ?>registration_logic.php" enctype="multipart/form-data" method="POST" id="recaptcha_verification">
            <div class="form1 form-floating mt-2">
                <input type="email" id="email" name="email" value="<?= $email ?>"  class="form-control border-success" placeholder="jan-kowalski@example.com" required>
                <label for="email">Email</label>
                <span id="infoButton"><i class="bi bi-info-circle tt" id="info" title="Example e-mail should look like example@gmail.com"></i></span>
            </div>
            <!-- wrong email alert -->
            <div class="row wrong-alert alert-hidden mt-1" id="email-alert">
                <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                </svg> Wrong e-mail address! Try again!</p>
                </div>
            <div class="form1 form-floating mt-2">
                <input type="text" id="login" name="login" value="<?= $login ?>" class="form-control border-success" placeholder="User01" >
                <span id="infoButton"><i class="bi bi-info-circle tt" id="info" title="For example: user_01"></i></span>
                <label for="login">Login</label>
            </div>
            <!-- empty login alert -->
            <div class="row wrong-alert alert-hidden mt-1" id="login-alert">
                <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                </svg> Login can't be empty!</p>
                </div>
            <div class=" form1 form-floating mt-2">
                <input type="password" class="form-control border-success" id="password" name="password" value="<?= $password ?>" placeholder="Hasło" required>
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
            <div class="form1 form-floating mt-2 mb-2" >
                <input spellcheck="false" id="cpassword" name="cpassword" value="<?= $cpassword ?>" type="password"  class="form-control border-success"  placeholder="Repeat password" required>
                <span id="eyeButton1" onclick="showHide1()"><i class="bi bi-eye-fill tt" id="icon1" onclick="changeIcon1()" title="Show password"></i></span>
                <label for="cpassword">Re password</label>
                <!-- password don't match alert -->
                <div class="row wrong-alert alert-hidden mt-1" id="match-pass-alert">
                <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-exclamation-circle mb-1" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                </svg> Password doesn't match!</p>
            </div>
                <input type="hidden" name="submit_rec" value="1">
                <button type="submit" class="g-recaptcha btn btn-success col-12 mt-2 mb-1" id="logowanie" name="submit_rec" data-sitekey="<?= $public_key ?>" data-callback='onSubmit' data-action='submit' >Sign up</button>
                <p style="color: #0f5132; font-size: small">You have account?
                <a class="link-success fw-bold" href="signIn.php" style="font-size: small" id="example"  data-bs-placement="bottom">Sign in</a></p>
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
    <script src="scripts/eyeChange.js?v=<?php echo time(); ?>"></script>
    <script src="scripts/validation.js?v=<?php echo time(); ?>"></script>
    <script>
        const tooltip=document.querySelectorAll('.tt')
        tooltip.forEach(t=>{
            new bootstrap.tooltip(t)
        })
    </script>
    </body>
</html>