<?php
include 'includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
if(isset($_SESSION["userId"])){
    header("Location: index.php");
}
$errorVal = false;
if(isset($_SESSION["signupError"])){
$errorVal = $_SESSION["signupError"];
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
        <section class="main-register-content">
            <div class="register-container">
            <?php
                if($errorVal){
                echo "<p id=\"signupError-text\">Invalid input!</p>";
                }
                ?>
                <form method="POST" action="handlers/user-login-signup-handler.php" onsubmit="return ValidateUserSignUpInfo()">
                    <div id="error_user_signup_name" class="user-error"></div>
                    <label for="Name"><b>Name</b></label>
                    <input id="user_signup_name" type="text" placeholder="Enter name" class="UserStyle Input-field" name="FirstName" />
                    <div id="error_user_signup_lastName" class="user-error"></div>
                    <label for="LastName"><b>Last name</b></label>
                    <input id="user_signup_lastName" type="text" placeholder="Enter LastName" class="UserStyle Input-field" name="LastName" />
                    <div id="error_user_signup_email" class="user-error"></div>
                    <label for="Email"><b>Email</b></label>
                    <input id="user_signup_email" type="text" placeholder="Enter email address" class="Input-field" name="Email" />
                    <div id="error_user_signup_password" class="userEPError user-error"></div>
                    <label for="Password"><b>Password</b></label>
                    <input id="user_signup_password" type="password" placeholder="Enter Password" name="Password" class="Input-field" />
                    <div id="error_user_signup_cpassword" class="user-error"></div>
                    <label for="PasswordRpt"><b>Password confirm</b></label>
                    <input id="user_signup_cpassword" type="password" placeholder="Enter Password again" name="PasswordRpt" class="Input-field" />

                    <label class="Check-box-Accept-policy"> <input type="checkbox" checked="checked" name="policyAccept" /> Accept policy </label>

                    <button type="submit" name="signUpButton" class="signUpButtSes">Sign up</button>
                    <label>
                        <h5>Already a member click <a href="login.php" class="singUpText">Here</a></h5>
                    </label>
                </form>
            </div>
        </section>
        <?php include 'includes/main-footer.php'; ?>
        <script src="js/validate-signup.js"></script>
        <script src="js/shared.js"></script>
    </body>
</html>
