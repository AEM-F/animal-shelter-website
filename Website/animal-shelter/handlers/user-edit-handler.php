<?php
include '../includes/class-autoloader.inc.php';
session_start();
$user_name;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
}
else{
    header("Location: index.php");
}

$userManager = new UserManager();
$loggedUser= $userManager->getUserById($user_id);
if(isset($_POST["user-update-btn"]) && $_POST["user-update-btn"] == "Submit"){
    $inputName = $userManager->sanitizeString($_POST["input-edit-name"]);
    $inputLastName = $userManager->sanitizeString($_POST["input-edit-last-name"]);
    $inputEmail = $userManager->sanitizeString($_POST["input-edit-email"]);
    $inputPassword= $userManager->sanitizePassword($_POST["input-edit-password"]);
    $inputcPassword= $userManager->sanitizePassword($_POST["input-edit-confirm-password"]);
    if(empty($inputName) || empty($inputLastName) || empty($inputEmail) || empty($inputPassword) || empty($inputcPassword)){
        $_SESSION["userEditError"] = true;
        header("Location: ../account-edit.php");
    } 
    else{
        if(strlen($inputName) < 50 || strlen($inputLastName) < 50 || strlen($inputEmail) < 50 || strlen($_POST["input-edit-password"]) < 50){
            if($inputPassword == $inputcPassword){
                if($inputEmail == $loggedUser->GetEmail()){
                        $user = new User($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                        $user->SetId($loggedUser->GetId());
                        $userManager->updateUser($user);
                        $_SESSION["userEditError"] = false;
                        //echo "success";
                        header("Location: ../account-overview.php");
                }
                else{
                    if($userManager->validateEmail($inputEmail)){
                        $_SESSION["userEditError"] = true;
                        header("Location: ../account-edit.php");
                    }
                    else{
                        $user = new User($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                        $user->SetId($loggedUser->GetId());
                        $userManager->updateUser($user);
                        $_SESSION["userEditError"] = false;
                        //echo "success";
                        header("Location: ../account-overview.php");
                    }
                }
                
            }
            else{
                $_SESSION["userEditError"] = true;
                //echo "fail at pass match";
                header("Location: ../account-edit.php");
            }
        }
        else{
            $_SESSION["userEditError"] = true;
            header("Location: ../account-edit.php");
           // echo "fail at lenghth";
        }
    }
    
}
else{
    header("Location: ../account-overview.php");
    //echo "fail at submit";
}
?>