<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$user_name;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
}
else{
    header("Location: index.php");
}

if($_POST["animal-edit-type"] != "" && $_POST["animal-edit-size"] != "" && $_POST["animal-edit-img-link"] != "" && $_POST["animal-edit-description"] != "" && $_POST["animal-edit-age"] != "" && $_POST["animal-edit-gender"] != "" && $_POST["animal-edit-name"] != "" && $_POST["animal-edit-id"] != "" && ($_POST["animal-edit-breed"] != "" || $_POST["animal-edit-species"] != "" )){
    $inputId = $animalShelter->sanitizeString($_POST["animal-edit-id"]);
    $inputName = $_POST["animal-edit-name"];
    $inputType = $animalShelter->sanitizeString($_POST["animal-edit-type"]);
    $inputImgLink = $_POST["animal-edit-img-link"];
    $inputDescription = $_POST["animal-edit-description"];
    $inputAge = $animalShelter->sanitizeString($_POST["animal-edit-age"]);
    $inputGender = $animalShelter->sanitizeString($_POST["animal-edit-gender"]);
    $inputSize = $animalShelter->sanitizeString($_POST["animal-edit-size"]);
    if(is_numeric($inputId)){
        if(strlen($inputType) < 20 || strlen($inputImgLink) < 200 || strlen($inputDescription) < 600 || strlen($inputAge) < 4 || strlen($inputGender) < 7 || strlen($inputName) < 50 || strlen($inputSize) < 10){
            if($inputType == "Canine" || $inputType == "Feline"){
                $inputBreed = $_POST["animal-edit-breed"];
                if($_POST["animal-edit-breed"] != "" && (empty($inputBreed) != true) && strlen($inputBreed) < 50){
                    if($inputType == "Canine"){
                        $animal = new Dog($inputName, $inputAge, $inputGender, $inputSize, $inputDescription, $inputImgLink, "DOG", $inputType, $inputBreed);
                        $animal->SetId($inputId);
                        $animalShelter->GetAnimalHelper()->updateAnimal($animal);
                        $_SESSION["animalEditError"] = false;
                        header("Location: ../admin/animal-overview.php?page=1");
                    }
                    else if($inputType == "Feline"){
                        $animal = new Cat($inputName, $inputAge, $inputGender, $inputSize, $inputDescription, $inputImgLink, "CAT", $inputType, $inputBreed);
                        $animal->SetId($inputId);
                        $animalShelter->GetAnimalHelper()->updateAnimal($animal);
                        $_SESSION["animalEditError"] = false;
                        header("Location: ../admin/animal-overview.php?page=1");
                    }
                }
                else{
                    $_SESSION["animalEditError"] = true;
                    $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $_POST["animal-edit-id"];
                    header($url);
                }
            }
            elseif($inputType == "Avian"){
                $inputSpecies = $_POST["animal-edit-species"];
                if($_POST["animal-edit-species"] != "" && (empty($inputSpecies) != true) && strlen($inputSpecies) < 50){
                    $animal = new Bird($inputName, $inputAge, $inputGender, $inputSize, $inputDescription, $inputImgLink, $inputSpecies, $inputType);
                    $animal->SetId($inputId);
                    $animalShelter->GetAnimalHelper()->updateAnimal($animal);
                    $_SESSION["animalEditError"] = false;
                    header("Location: ../admin/animal-overview.php?page=1");
                }
                else{
                    $_SESSION["animalEditError"] = true;
                    $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $_POST["animal-edit-id"];
                    header($url);
                }
            }
        }
        else{
            $_SESSION["animalEditError"] = true;
            $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $_POST["animal-edit-id"];
            header($url);
        }
    }
    else{
        $_SESSION["animalEditError"] = true;
        $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $_POST["animal-edit-id"];
        header($url);
    }
}
else{
    $_SESSION["animalEditError"] = true;
    $url="Location: ../admin/admin-animal-edit.php" . "?aId=" . $_POST["animal-edit-id"];
    header($url);
}
