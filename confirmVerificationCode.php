<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Confirm code</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style.css?v=<?php echo time(); ?>">
        <link rel="Shortcut icon" href="images/pathwhite.svg">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row mt-5">
        <div class="login col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
        <div class="row">
        <img class="logo" src="images/path13547.svg" width=50 height="50"/>
            <h5>Enter the verification code</h5> 
        </div>
        <!-- show alert by php when validation error occurs -->
        <?php if(isset($_SESSION['code'])):?>
            <div>
            <p class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle"></i> 
            <?=$_SESSION['code'];
                unset($_SESSION['code']);?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </p>
            </div>
        <?php endif ?>
        <form action="confirmCode_logic.php" method="POST" autocomplete="off">
            <div class="form1 form-floating mt-2">
                <input type="text" id="code" placeholder="Code" name="code" value="" maxlength="6"  class="form-control border-success" required>
                <label for="code">Code</label>
            </div>
            <div class="form1 mt-3">
                <button type="submit" class="btn btn-success col-12 mt-2 mb-1" id="send" name="submit" onclick="changeText()">Send</button>
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