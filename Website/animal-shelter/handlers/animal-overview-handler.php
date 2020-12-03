<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
    $loggedUser= $animalShelter->GetUserHelper()->getUserById($user_id);
    if($loggedUser->GetRole() != "Admin"){
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../index.php");
}
$animalId=0;
if(isset($_POST["input-animal-id"])){
    $animalId = $animalShelter->sanitizeString($_POST["input-animal-id"]); 
}
else{
    header("Location: ../admin/animal-overview.php?page=1");
}

if (isset($_POST["animal-edit-btn"])) {
    $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $animalId;
    header($url);
}

if(isset($_POST["animal-add-btn"])){
    header("Location: ../admin/admin-animal-add.php");
}

if(isset($_POST["animal-remove-btn"])){
    $animalShelter->GetAnimalHelper()->removeAnimalById($animalId);
    header("Location: ../admin/animal-overview.php?page=1");
}
