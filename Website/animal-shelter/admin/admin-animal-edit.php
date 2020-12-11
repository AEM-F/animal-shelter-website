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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    </head>
    <body>
        <div class="backdrop"></div>
            <?php include '../includes/admin-navigation.php'; ?>
                <div class = "admin-animal-edit-content">
                    <div class="animal-edit-wrapper">
                        <form id="animal_edit_form" action="../handlers/animal-edit-handler.php" method="post" class="animal-edit-form" onsubmit="ValidateAnimalEditInfo()">
                        <div class="animal-id-wrapper">
                            <input type="text" name="animal-edit-id" id="input_animal_edit_id" readonly value ="<?php echo $animal->GetId(); ?>">
                        </div>
                            <div class="animal-rbtns-wrapper rbtns-typeArea">
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_dog">Canine</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_dog" name="animal-edit-type" value="Canine" <?php if($animal->GetFamily() == "Canine") echo "checked=\"checked\""; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_cat">Feline</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_cat" name="animal-edit-type" value="Feline" <?php if($animal->GetFamily() == "Feline") echo "checked=\"checked\""; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_type_bird">Avian</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_type_bird" name="animal-edit-type" value="Avian" <?php if($animal->GetFamily() == "Avian") echo "checked=\"checked\""; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="animal-image-wrapper">
                                <img src="<?php echo $animal->GetImgLink(); ?>" alt="Animal Photo" id="animal_edit_img">
                                <div id="error_animal_edit_image" class="animal-error"></div>
                            </div>
                            <div class="animal-img-inputArea-wrapper">
                                <div class="animal-image-input-wrapper">
                                    <input type="text" name="animal-edit-img-link" id="input_edit_link_animal" placeholder="Animal Image URL" value="<?php echo $animal->GetImgLink();?>">
                                    <div id="btn-preview-image-animal" class="animal-edit-btn"><i class="fas fa-eye"></i>Preview</div>
                                </div>
                            </div>
                            <div class="animal-descriptionArea-wrapper">
                                <div class="animal-description-input-wrapper">
                                    <div id="error_animal_edit_description" class="animal-error"></div>
                                    <label for="input_animal_edit_description">Description</label>
                                    <textarea rows="10" cols="50" name="animal-edit-description" id="input_animal_edit_description"><?php echo $animal->GetDescription(); ?></textarea>
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aNameArea-wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_name" class="animal-error"></div>
                                    <label for="input_animal_edit_name">Name</label>
                                    <input type="text" name="animal-edit-name" id="input_animal_edit_name" value="<?php echo $animal->GetName(); ?>">
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aBreedArea-wrapper" id="animal_edit_breed_wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_Breed" class="animal-error"></div>
                                    <label for="input_animal_edit_breed">Breed</label>
                                    <input type="text" name="animal-edit-breed" id="input_animal_edit_breed" value="<?php if($animal->GetFamily() != "Avian") echo $animal->GetBreed(); ?>">
                                </div>
                            </div>
                            <div class="animal-text-inputArea-wrapper aSpeciesArea-wrapper" id="animal_edit_species_wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_species" class="animal-error"></div>
                                    <label for="input_animal_edit_species">Species</label>
                                    <input type="text" name="animal-edit-species" id="input_animal_edit_species"  value="<?php if($animal->GetFamily() != "Canine" || $animal->GetFamily() != "Feline") echo $animal->GetSpecies(); ?>">
                                </div>
                            </div>
                            
                            <div class="animal-text-inputArea-wrapper aAgeArea-wrapper">
                                <div class="animal-text-input-wrapper">
                                    <div id="error_animal_edit_age" class="animal-error"></div>
                                    <label for="animal-edit-text-input">Age</label>
                                    <input type="text" name="animal-edit-age" id="input_animal_edit_age" value="<?php echo $animal->GetAge(); ?>">
                                </div>
                            </div>
                            <div class="animal-rbtns-wrapper">
                                <div class="animal-rb-type-wrapper">
                                    <label for="rb_animal_gender_male">Male</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_gender_male" name="animal-edit-gender" value="MALE" <?php if($animal->GetSex() == "MALE") echo "checked"; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="animal-rb-type-wrapper rbtns-genderArea">
                                    <label for="rb_animal_gender_female">Female</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_animal_gender_female" name="animal-edit-gender" value="FEMALE" <?php if($animal->GetSex() == "FEMALE") echo "checked"; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="animal-sizeArea-wrapper">
                            <label for="select-animal-size">Size</label>
                                <div class="animal-size-input-container">
                                    <select id="select-animal-size" name="animal-edit-size">
                                        <option value="SMALL">SMALL</option>
                                        <option value="MEDIUM">MEDIUM</option>
                                        <option value="LARGE">LARGE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="animal-mainArea-btns-wrapper">
                            <a href="animal-overview.php" class="animal-submit-btn">Cancel</a>
                            <?php
                                if(isset($_SESSION["animalEditError"]) && $_SESSION["animalEditError"] == true){
                                    echo "<p class=\"user-error\">Invalid input</p>";
                                }
                            ?>
                            <div id="btn_animal_form_submit" class="animal-submit-btn">Submit</div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php include '../includes/admin-footer.php'; ?>
        <script src="../js/shared-admin.js"></script>
        <script src="../js/animal-switch-breed-species.js"></script>
        <script src="../js/animal-edit-image.js"></script>
        <script src="../js/validate-edit-animal.js"></script>
    </body>
</html>