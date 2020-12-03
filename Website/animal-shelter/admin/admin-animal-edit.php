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

$totalAnimals = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
$animal;
$animalType;
if(isset($_GET['aId'])){
    if($_GET['aId'] > 0 || $_GET['aId'] < $totalAnimals){
        $animal = $animalShelter->GetAnimalHelper()->getAnimalById($_GET['aId']);
    }
    else{
        header("Location: admin-animal-edit.php?aId=1");
    }
}
else{
    header("Location: admin-animal-edit.php?aId=1");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Animal-Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="backdrop"></div>
            <?php include '../includes/admin-navigation.php'; ?>
                <div class = "admin-animal-edit-content">
                    <div class="animal-edit-wrapper">
                        <form action="" method="post" class="animal-edit-form">
                            <div class="animal-rbtns-wrapper rbtns-typeArea">
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_dog">Dog</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_dog" name="animal-edit-type" value="DOG" checked>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_cat">Cat</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_cat" name="animal-edit-type" value="CAT">
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_bird">Bird</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_bird" name="animal-edit-type" value="BIRD">
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="animal-image-wrapper">
                                <img src="../images/paw-DOG.png" alt="Animal Photo">
                            </div>
                            <div class="animal-img-inputArea-wrapper">
                                <div class="animal-image-input-wrapper">
                                    <input type="text" name="animal-edit-img-link" id="input_edit_link_animal" placeholder="Animal Image URL">
                                    <button id="btn-preview-image-animal" class="animal-edit-btn"><i class="fas fa-eye"></i>Preview</button>
                                </div>
                            </div>
                            <div class="animal-descriptionArea-wrapper">
                                <div class="animal-description-input-wrapper">
                                    <div id="error_animal_edit_description" class="animal-error"></div>
                                    <label for="animal-edit-description">Description</label>
                                    <textarea rows="10" cols="50" name="animal-edit-description" id="input_animal_edit_description"></textarea>
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aNameArea-wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_name" class="animal-error"></div>
                                    <label for="animal-edit-text-input">Name</label>
                                    <input type="text" name="animal-edit-name" id="input_animal_edit_name">
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aBreedArea-wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_Breed" class="animal-error"></div>
                                    <label for="animal-edit-text-input">Breed</label>
                                    <input type="text" name="animal-edit-breed" id="input_animal_edit_breed">
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aAgeArea-wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_age" class="animal-error"></div>
                                    <label for="animal-edit-text-input">Age</label>
                                    <input type="text" name="animal-edit-age" id="input_animal_edit_age">
                                </div>
                            </div>
                            <div class="animal-rbtns-wrapper">
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_gender_male">Male</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_gender_male" name="animal-edit-gender" value="MALE" checked>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper rbtns-genderArea">
                                    <label for="rb_animal_gender_female">Female</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_gender_female" name="animal-edit-gender" value="FEMALE">
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="animal-sizeArea-wrapper">
                            <label for="select-animal-size">Size</label>
                                <div class="animal-size-input-container">
                                    <select id="select-animal-size">
                                        <option value="SMALL">SMALL</option>
                                        <option value="MEDIUM">MEDIUM</option>
                                        <option value="LARGE">LARGE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="animal-mainArea-btns-wrapper">
                            <a href="animal-overview.php" class="animal-submit-btn">Cancel</a>
                            <input id="btn_animal_form_submit" type="submit" name="animal-update-btn" value="Submit" class="animal-submit-btn" />
                            </div>
                        </form>
                    </div>
                </div>
            <?php include '../includes/admin-footer.php'; ?>
        <script src="../js/shared-admin.js"></script>
        <script src="../js/animal-select.js"></script>
    </body>
</html>