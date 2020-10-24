<?php
include '../includes/class-autoloader.inc.php';
$userManager = new UserManager();
session_start();

//login
if(isset($_POST["loginButton"])){
    $inputEmail = $userManager->sanitizeString($_POST["Email"]);
    $inputPassword= $userManager->sanitizePassword($_POST["Password"]);
    if(empty($inputEmail) || empty($inputPassword)){
        $_SESSION["logInError"] = true;
        header("Location: ../login.php");
    }
    else{
        if(strlen($inputEmail) < 50 || strlen($_POST["Password"]) < 50){

            $isValid = $userManager->ValidateLogIn($inputEmail,$inputPassword);
            if($isValid){
                $user = $userManager->getUserByEmail($inputEmail);
                $_SESSION["userId"] = $user->GetId();
                $_SESSION["logInError"] = false;
                header("Location: ../index.php");
            }
            else{
                $_SESSION["logInError"] = true;
                header("Location: ../login.php");
            }
        }
        else{
            $_SESSION["logInError"] = true;
            header("Location: ../login.php");
        }
    }
}

//singup
elseif(isset($_POST['signUpButton'])){
    $inputName = $userManager->sanitizeString($_POST["FirstName"]);
    $inputLastName = $userManager->sanitizeString($_POST["LastName"]);
    $inputEmail = $userManager->sanitizeString($_POST["Email"]);
    $inputPassword= $userManager->sanitizePassword($_POST["Password"]);
    $inputcPassword= $userManager->sanitizePassword($_POST["PasswordRpt"]);
    if(empty($inputName) || empty($inputLastName) || empty($inputEmail) || empty($inputPassword) || empty($inputcPassword)){
        $_SESSION["signupError"] = true;
        header("Location: ../signup.php");
    }
    else{
        if(strlen($inputName) < 50 || strlen($inputLastName) < 50 || strlen($inputEmail) < 50 || strlen($_POST["input-edit-password"]) < 50){
            if($inputPassword == $inputcPassword){
                if(!$userManager->validateEmail($inputEmail)){
                    $userManager->addUser($inputName, $inputLastName, $inputEmail, $inputPassword);
                    $_SESSION["userId"] = $userManager->getUserByEmail($inputEmail)->GetId();
                    $_SESSION["signupError"] = false;
                    header("Location: ../index.php");
                }
                else{
                $_SESSION["signupError"] = true;
                header("Location: ../signup.php");
                }
            }
            else{
                $_SESSION["signupError"] = true;
                header("Location: ../signup.php");
            }
        }
        else{
            $_SESSION["signupError"] = true;
            header("Location: ../signup.php");
        }
    }
} 
else{
    header("Location: ../index.php");
}
 
?>

