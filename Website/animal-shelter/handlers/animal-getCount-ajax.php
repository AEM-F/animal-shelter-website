<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();

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

if(isset($_POST["request_type"]) && ($_POST["request_type"] == "Canine" || $_POST["request_type"] == "Feline" || $_POST["request_type"] == "Avian")){
    $animalCount = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), $_POST["request_type"]));
        $animalCount = json_encode($animalCount);
        echo $animalCount;
}

?>
