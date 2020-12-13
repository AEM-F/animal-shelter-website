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

if(isset($_POST["animal_name"]) && $_POST["animal_name"] != "" && $_POST["animal_page"] != ""){
    $inputName = $_POST["animal_name"];
    $page = $_POST["animal_page"];
    if(strlen($inputName) < 50 && is_numeric($page)){
        $animalsPerPage = 5;
        $startNr = ($animalsPerPage * $page) - $animalsPerPage;
        $totalAnimals = $animalShelter->GetAnimalHelper()->getAllAnimalsByNameCount($inputName);
            if($totalAnimals > 0){
                $animalsByLimit = $animalShelter->GetAnimalHelper()->getAnimalsByNameAndLimit($startNr,$animalsPerPage, $inputName);
                $total_pages=ceil( $totalAnimals / $animalsPerPage );
                    foreach ($animalsByLimit as $animal) {
                        $animalShelter->GetAnimalView()->showAnimalForAnimalOverview($animal);
                    }
            }
            else{
                echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> No animals found with the given name</div>";
            }
    }
    else{
        echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> Invalid input</div>";
    }
}
else{
    echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> Invalid input</div>";
}
?>