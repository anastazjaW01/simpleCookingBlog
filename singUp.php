<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row">
        <div class="login col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 ">
        <div class="row">
        <img class="" src="path13547.svg" width=50 height="50"/>
            <h3>Simple Cooking</h3> 
        </div>
        <form>
            <div class="form1 form-floating mt-2">
                <input type="email" id="email" name="email" value=""  class="form-control border-success" placeholder="jan-kowalski@example.com" required>
                <label for="email">Email</label>
            </div>
            <div class=" form1 form-floating mt-2">
                <input type="password" class="form-control border-success" id="password" name="password" placeholder="Hasło" required>
                <span id="eyeButton" onclick="showHide()"><i class="bi bi-eye-fill" id="icon" onclick="changeIcon()"></i></span>
                <label for="password">Password</label>
                <div  class="progress" id="passStr">
                    <div id="passwordStrength" class="progress-bar bg-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
            <div class="form1 form-floating mt-2 mb-2" >
                <input spellcheck="false" id="cpassword" name="cpassword" value="" onkeyup="disableButton()"  type="password"  class="form-control border-success"  placeholder="Powtórz hasło" required>
                <span id="eyeButton1" onclick="showHide1()"><i class="bi bi-eye-fill" id="icon1" onclick="changeIcon1()"></i></span>
                <label for="cpassword">Re password</label>
                <button type="submit" class="btn btn-success col-12 mt-2 mb-1" id="logowanie" name="submit">Sing up</button>
                <p style="color: #0f5132; font-size: small">You have account?
                <a class="link-success fw-bold " href="index.php" style="font-size: small"  data-bs-toggle="tooltip" data-bs-title="Default tooltip">Sing in</a></p>
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
    <script src="eyeChange.js"></script>
    <script src="validation.js"></script>
    </body>
</html>