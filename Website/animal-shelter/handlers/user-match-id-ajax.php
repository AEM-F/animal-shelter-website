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

if(isset($_POST["user_id"]) && $_POST["user_id"] != 0){
    $selectedUserId = $_POST["user_id"];
    $selectedUser = $animalShelter->GetUserHelper()->getUserById($selectedUserId);
    if($selectedUserId == $loggedUserId){
        $responseData = "loggedUser";
        echo $responseData;
    }
    else if($selectedUser->GetRole() == "Admin" && $selectedUserId != $loggedUserId){
        $responseData = "adminUser";
        echo $responseData;
    }
    else{
        $responseData = "normalUser";
        echo $responseData;
    }
}
?>