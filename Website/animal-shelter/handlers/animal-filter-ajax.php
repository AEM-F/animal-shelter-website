<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();

if(isset($_POST["animal_page"]) && $_POST["animal_page"] != "" && isset($_POST["animal_type"])){
    $page = $_POST["animal_page"];
    $animalsPerPage = 10;
    if(is_numeric($page)){
        $startNr = ($animalsPerPage * $page) - $animalsPerPage;
        $totalAnimals = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), $_POST["animal_type"]));
            if($totalAnimals > 0){
                $animalsByLimit = $animalShelter->GetAnimalHelper()->getTypeAnimalsByLimit($startNr, $animalsPerPage, $_POST["animal_type"]);
                $total_pages=ceil( $totalAnimals / $animalsPerPage );
                switch ($_POST["animal_display"]) {
                    case 'gallery':
                        foreach ($animalsByLimit as $animal) {
                            $animalShelter->GetAnimalView()->showAnimalForGallery($animal);
                        }
                        break;
                }
                    
            }
            else{
                echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> No animals found</div>";
            }
    }
    else{
        echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> Invalid page number</div>";
    }
}
else{
    echo " <div class=\"animal-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> Error call</div>";
}
?>