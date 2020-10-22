<?php
include '../includes/class-autoloader.inc.php';
$userManager = new UserManager();
session_start();


if(isset($_POST["loginButton"])){
    
    $isValid = $userManager->ValidateLogIn($_POST["Email"],$_POST["Password"]);

    if($isValid){
        $user = $userManager->getUserByEmail($_POST["Email"]);
        $_SESSION["userName"] = $user->GetName();
        $_SESSION["logInError"] = false;
        header("Location: ../index.php");
    }
    else{
        $_SESSION["logInError"] = true;
        header("Location: ../login.php");
    }
}
else{
    header("Location: ../login.php");
}

    if(isset($_POST['signUpButton'])){
    if($userManager->addUser($_POST['FirstName'], $_POST['LastName'], $_POST['Email'], $_POST['Password'])){
         $user = $userManager->getUserByEmail($_POST["Email"]);
        $_SESSION["userName"] = $user->GetName();
        header("Location: ../index.php");
    }
    else{
        header("Location: ../signup.php");
    }
    
    } 
    else{
        header("Location: ../login.php");
    }  

?>

