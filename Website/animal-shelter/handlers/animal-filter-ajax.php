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