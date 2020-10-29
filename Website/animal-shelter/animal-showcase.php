<?php
include 'includes/class-autoloader.inc.php';
session_start();
$userManager = new UserManager();
$animalManager = new AnimalManager();
$totalAnimals = $animalManager->getTotalAnimals();
$animal;
$animalType;
if(isset($_GET['aId'])){
    if($_GET['aId'] > 0 || $_GET['aId'] < $totalAnimals){
        $animal = $animalManager->getAnimalById($_GET['aId']);
        $animalType = $animal->GetType();
    }
    else{
        header("Location: animal-showcase.php?aId=1");
    }
}
else{
    header("Location: animal-showcase.php?aId=1");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Animal-Shelter-View-animal</title>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="main.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="backdrop"></div>
        <?php include 'includes/main-navigation.php'; ?>
        <section class="main-animal-view-content">
            <div class="animal-view-info-card">
                <div class="animal-view-card-top">
                    <?php
                        echo "<img id=\"av-animal-type-img\" src=\"images/img-". $animalType .".png\" alt=\"Animal type image\">";
                    ?>
                    <div class="animal-view-main-image">
                        <?php echo "<img id=\"av-animal-main-img\" src=\"". $animal->GetImgLink() ."\" alt=\"Pet Image\">"; ?>
                    <div class="animal-view-name">
                        <p><?php echo $animal->GetName(); ?></p>
                    </div>
                    </div>
                    <div class="animal-view-paws">
                        <?php 
                            echo "<img id=\"av-paw1-img\" class=\"animal-paw-image\" src=\"images/paw-". $animalType .".png\" alt=\"Paw image\">";
                            echo "<img id=\"av-paw2-img\" class=\"animal-paw-image\" src=\"images/paw-". $animalType .".png\" alt=\"Paw image\">";
                            echo "<img id=\"av-paw3-img\" class=\"animal-paw-image\" src=\"images/paw-". $animalType .".png\" alt=\"Paw image\">";
                            echo "<img id=\"av-paw4-img\" class=\"animal-paw-image\" src=\"images/paw-". $animalType .".png\" alt=\"Paw image\">";
                        ?>
                    </div>
                </div>
                <div class="animal-view-short-info">
                    <p><b><?php echo $animal->GetAnimalShortDescription();?></b></p>
                </div>
            </div>
            <div class="animal-view-description">
                <div class="av-description-top">
                    <p>Description</p>
                </div>
                <div class="av-description-body">
                    <p><?php echo $animal->GetDescription(); ?></p>
                </div>
            </div>
        </section>
        <?php include 'includes/main-footer.php'; ?>
        <script src="js/shared.js"></script>
    </body>
</html>