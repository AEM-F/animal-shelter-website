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

if(isset($_POST["request_type"]) && $_POST["request_type"] == "search"){
    $searchAnimalName = $_POST["animal_name"];
    $animalCount = $animalShelter->GetAnimalHelper()->getAllAnimalsByNameCount($searchAnimalName);
    if($animalCount > 0){
        $animalCount = json_encode($animalCount);
        echo $animalCount;
    }
    
}

if(isset($_POST["request_type"]) && $_POST["request_type"] == "all"){
    $animalCount = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
        $animalCount = json_encode($animalCount);
        echo $animalCount;
}

?>
