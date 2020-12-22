<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$user_name;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
}
else{
    header("Location: index.php");
}

$loggedUser= $animalShelter->GetUserHelper()->getUserById($user_id);
if(isset($_POST["user-update-btn"]) && $_POST["user-update-btn"] == "Submit"){
    $inputName = $animalShelter->sanitizeString($_POST["input-edit-name"]);
    $inputLastName = $animalShelter->sanitizeString($_POST["input-edit-last-name"]);
    $inputEmail = $animalShelter->sanitizeString($_POST["input-edit-email"]);
    $inputPassword= $animalShelter->sanitizePassword($_POST["input-edit-password"]);
    $inputcPassword= $animalShelter->sanitizePassword($_POST["input-edit-confirm-password"]);
    if(empty($inputName) || empty($inputLastName) || empty($inputEmail) || empty($inputPassword) || empty($inputcPassword)){
        $_SESSION["userEditError"] = true;
        header("Location: ../account-edit.php");
    } 
    else{
        if(strlen($inputName) < 50 || strlen($inputLastName) < 50 || strlen($inputEmail) < 50 || strlen($_POST["input-edit-password"]) < 50){
            if($inputPassword == $inputcPassword){
                if($inputEmail == $loggedUser->GetEmail()){
                    if($loggedUser->GetRole()== "Admin"){
                        $user = new Admin($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                        $user->SetId($loggedUser->GetId());
                    }
                    elseif($loggedUser->GetRole()== "Member"){
                        $user = new Member($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                        $user->SetId($loggedUser->GetId());
                    }
                        
                        $animalShelter->GetUserHelper()->updateUser($user);
                        $_SESSION["userEditError"] = false;
                        //echo "success";
                        header("Location: ../account-overview.php");
                }
                else{
                    if($animalShelter->GetUserHelper()->validateEmail($inputEmail)){
                        $_SESSION["userEditError"] = true;
                        header("Location: ../account-edit.php");
                    }
                    else{
                        if($loggedUser->GetRole()== "Admin"){
                            $user = new Admin($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                            $user->SetId($loggedUser->GetId());
                        }
                        elseif($loggedUser->GetRole()== "Member"){
                            $user = new Member($inputName, $inputLastName, $inputEmail, $inputPassword, $loggedUser->GetRole());
                            $user->SetId($loggedUser->GetId());
                        }
                        $isUpdated = $animalShelter->GetUserHelper()->updateUser($user);
                        if($isUpdated){
                            $_SESSION["userEditError"] = false;
                            //echo "success";
                            header("Location: ../account-overview.php");
                        }
                        else{
                            $_SESSION["userEditError"] = true;
                            //echo "dbh error";
                            header("Location: ../account-edit.php");
                        }
                        
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