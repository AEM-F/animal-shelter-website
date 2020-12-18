<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$loggedUserId = null;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
    $loggedUser= $animalShelter->GetUserHelper()->getUserById($user_id);
    if($loggedUser->GetRole() != "Admin"){
        header("Location: ../index.php");
    }
    $loggedUserId = $user_id;
}
else{
    header("Location: ../index.php");
}
$selectedUserId=null;

if (isset($_POST["user-edit-btn"])) {
    if(isset($_POST["input-user-id"]) && $_POST["input-user-id"] != ""){
        $selectedUserId = $animalShelter->sanitizeString($_POST["input-user-id"]); 
        $url="Location: ../admin/admin-user-edit.php" . "?uId=" . $selectedUserId;
        header($url);
    }
    else{
        header("Location: ../admin/user-overview.php?page=1");
    }
    
}

if(isset($_POST["user-add-btn"])){
    header("Location: ../admin/admin-user-add.php");
   
}

if(isset($_POST["user_remove_btn"]) && $_POST["user_remove_btn"] == "clicked"){
    if(isset($_POST["input_user_id"]) && $_POST["input_user_id"] != ""){
        $selectedUserId = $animalShelter->sanitizeString($_POST["input_user_id"]);
        if ($selectedUserId == $loggedUserId) {
            $_SESSION= array();
            session_destroy();
            session_write_close();
        }
        $animalShelter->GetUserHelper()->removeUserById($selectedUserId);
    }
    header("Location: ../admin/user-overview.php?page=1");
    
}
