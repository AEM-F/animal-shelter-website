<?php
include 'includes/class-autoloader.inc.php';
session_start();
$errorVal = false;
if(isset($_SESSION["logInError"])){
$errorVal = $_SESSION["logInError"];
  }

if(isset($_SESSION["userName"])){
    header("Location: index.php");
  }
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Animal-Shelter-Login</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="main.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="backdrop"></div>
        <div class="background-login-signup"></div>
        <?php include 'includes/main-navigation.php'; ?>
        <section class="main-login-content">
            <div class="login-container">
                <div class="imgcontainer">
                    <div class="Welcome">
                        <img src="images/cuteDog.png" alt="Avatar" class="avatar" />
                        <h1>Hi! come here often?</h1>
                    </div>
                </div>

                <form action="handlers/user-login-signup-handler.php" method="POST" id="login" class="input-group-logIn">
                    <div class="box-positioning-logIn">
                        <div class="textstuff">
                            <label for="Email"><b>Email</b></label>
                            <input type="text" placeholder="Enter email" class="Input-field" name="Email" required />

                            <label for="Password"><b>Password</b></label>
                            <input type="password" placeholder="Enter password" name="Password" class="Input-field" required />
                        </div>
                        <label class="Check-box-Remember-Me"> <input type="checkbox" checked="checked" name="remember" /> Remember me </label>
                        <!-- Submit -->
                        <button type="submit" name="loginButton" class="loginButtonDes">Login</button>
                    </div>
                    <h5>Not a member click <a href="signup.php" class="singUpText">Here</a></h5>
                </form>
                <?php
                if($errorVal){
                echo "Invalid credentials";
                }
                ?>
            </div>
        </section>
        <?php include 'includes/main-footer.php'; ?>
        <script src="js/shared.js"></script>
    </body>
</html>