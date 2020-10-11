<?php
include 'includes/class-autoloader.inc.php';
try {
    Animal::setDatabase(new Dbh());
    $animalsArray = Animal::getAllAnimals();
    $animalCount = Animal::getAllAnimalsCount();
    $animalById = Animal::getAnimalById($animalCount);

    //var_dump($animalsArray);
    //var_dump($animalCount);
    //var_dump($animalById);

} catch (PDOException $e) {
    echo "Exception :  " . $e->getMessage();
}

$animalView = new AnimalView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal-Shelter-HomePage</title>
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="new-pet">
    <h1 class="new-pet-title">A new member from our family managed to get a new home</h1>
      <?php
       $lastAddedAnimal = Animal::getAnimalById(Animal::getAllAnimalsCount());
       $animalView->showLastAddedAnimal($lastAddedAnimal);
       ?>
      
</div>
<div class="f-pets">
    <h1 class="f-pet-title">Check out some of our members!</h1>
    <div class="f-pet-cards">
          <?php
          $animal1 = Animal::getAnimalById(1);
          $animal2 = Animal::getAnimalById(2);
          $animal3 = Animal::getAnimalById(3);
          $animalView->showAnimal($animal1);
          $animalView->showAnimal($animal2);
          $animalView->showAnimal($animal3);
          ?>
    </div>
</div>
</main>
</body>
</html>