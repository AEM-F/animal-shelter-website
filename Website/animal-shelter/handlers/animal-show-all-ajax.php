<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();

if(isset($_POST["animal_page"]) && $_POST["animal_page"] != ""){
    $page = $_POST["animal_page"];
    $animalsPerPage = 5;
    if(is_numeric($page)){
        switch ($_POST["animal_display"]) {
            case 'overview':
                $animalsPerPage = 5;
                break;
            
            case 'gallery':
                $animalsPerPage = 10;
                break;
        }
        
        $startNr = ($animalsPerPage * $page) - $animalsPerPage;
        $totalAnimals = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
            if($totalAnimals > 0){
                $animalsByLimit = $animalShelter->GetAnimalHelper()->getAllAnimalsByLimit($startNr, $animalsPerPage);
                $total_pages=ceil( $totalAnimals / $animalsPerPage );
                switch ($_POST["animal_display"]) {
                    case 'overview':
                        foreach ($animalsByLimit as $animal) {
                            $animalShelter->GetAnimalView()->showAnimalForAnimalOverview($animal);
                        }
                        break;
                    
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