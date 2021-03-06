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

elseif(isset($_POST["request_type"]) && $_POST["request_type"] == "all"){
    $animalCount = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
        $animalCount = json_encode($animalCount);
        echo $animalCount;
}

elseif(isset($_POST["request_type"]) && ($_POST["request_type"] == "Canine" || $_POST["request_type"] == "Feline" || $_POST["request_type"] == "Avian")){
    $animalCount = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), $_POST["request_type"]));
        $animalCount = json_encode($animalCount);
        echo $animalCount;
}
else{
    echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
    <link rel=\"stylesheet\" href=\"../main.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.12.1/css/all.css\" crossorigin=\"anonymous\">
    <link href=\"https://fonts.googleapis.com/css2?family=Bangers&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" crossorigin=\"anonymous\">
</head>
    ";
    echo "
    <div class=\"error-page-controls\">
        <a href=\"../index.php\"><i class=\"fas fa-home\"></i>To homepage</a>
    </div>
    ";
    echo "<div class=\"cover-full-page\"><div class=\"user-error-overview error-normal\"><i class=\"fas fa-exclamation-triangle\"></i> Error Call</div></div>";
}

?>
