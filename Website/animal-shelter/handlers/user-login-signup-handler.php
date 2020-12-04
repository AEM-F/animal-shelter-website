<?php
include '../includes/class-autoloader.inc.php';
$animalShelter = AnimalShelter::GetInstance();
session_start();

//login
if(isset($_POST["loginButton"])){
    $inputEmail = $animalShelter->sanitizeString($_POST["Email"]);
    $inputPassword= $animalShelter->sanitizePassword($_POST["Password"]);
    if(empty($inputEmail) || empty($inputPassword)){
        $_SESSION["logInError"] = true;
        header("Location: ../login.php");
    }
    else{
        if(strlen($inputEmail) < 50 || strlen($_POST["Password"]) < 50){

            $isValid = $animalShelter->GetUserHelper()->ValidateLogIn($inputEmail,$inputPassword);
            if($isValid){
                $user = $animalShelter->GetUserHelper()->getUserByEmail($inputEmail);
                $_SESSION["userId"] = $user->GetId();
                $_SESSION["logInError"] = false;
                if($user->GetRole() == "Admin"){
                    header("Location: ../admin/animal-overview.php");
                }
                else{
                    header("Location: ../index.php");
                }
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
    $inputName = $animalShelter->sanitizeString($_POST["FirstName"]);
    $inputLastName = $animalShelter->sanitizeString($_POST["LastName"]);
    $inputEmail = $animalShelter->sanitizeString($_POST["Email"]);
    $inputPassword= $animalShelter->sanitizePassword($_POST["Password"]);
    $inputcPassword= $animalShelter->sanitizePassword($_POST["PasswordRpt"]);
    if(empty($inputName) || empty($inputLastName) || empty($inputEmail) || empty($inputPassword) || empty($inputcPassword)){
        $_SESSION["signupError"] = true;
        header("Location: ../signup.php");
    }
    else{
        if(strlen($inputName) < 50 || strlen($inputLastName) < 50 || strlen($inputEmail) < 50 || strlen($_POST["input-edit-password"]) < 50){
            if($inputPassword == $inputcPassword){
                if(!$animalShelter->GetUserHelper()->validateEmail($inputEmail)){
                    $animalShelter->GetUserHelper()->insertUser( new Member($inputName, $inputLastName, $inputEmail, $inputPassword, "Member"));
                    $_SESSION["userId"] = $animalShelter->GetUserHelper()->getUserByEmail($inputEmail)->GetId();
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

