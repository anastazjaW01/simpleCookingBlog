<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid p-0 m-0 ">
        
        <div class="login col-4 offset-4">
        <h3> Login </h3>
        <br><br>
        <form>
            <div class="form1 form-floating">
                <input type="email" id="email" name="email" value=""  class="form-control border-success" placeholder="jan-kowalski@example.com">
                <label for="email">Email</label>
            </div><br>
            <div class=" form1 form-floating">
                <input type="password" class="form-control border-success" id="password" name="password" placeholder="Hasło">
                <span id="eyeButton" onclick="showHide()"><i class="bi bi-eye-fill" id="icon" onclick="changeIcon()"></i></span>
                <label for="password">Password</label><br>
                <button type="submit" class="btn btn-success" id="logowanie" name="submit">Sing in</button><br><br>
                <p style="color: #0f5132; font-size: small">You dont have an account yet?</p>
                <a href="rejestracja.php"> <button type="button" class="btn btn-secondary" id="createAccount" >Sing up</button></a>
            </div>
        </form>
        </div>
        <div class="footter col-2 offset-5">
        <p> &#169; Anastazja Wierzbicka 2023</p>
    </div>
    </div>
    </body>
</html>