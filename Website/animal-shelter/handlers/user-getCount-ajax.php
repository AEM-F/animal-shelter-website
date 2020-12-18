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

if(isset($_POST["request_type"]) && $_POST["request_type"] == "search"){
    $searchUserName = $_POST["user_name"];
    $userCount = $animalShelter->GetUserHelper()->getAllUsersByNameCount($searchUserName);
    if($userCount > 0){
        $userCount = json_encode($userCount);
        echo $userCount;
    }
    
}
if(isset($_POST["request_type"]) && $_POST["request_type"] == "all"){
    $userCount = $animalShelter->GetUserHelper()->getAllUsersCount();
        $userCount = json_encode($userCount);
        echo $userCount;
}

?>