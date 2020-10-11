<?php
include 'includes/class-autoloader.inc.php';
Animal::setDatabase(new Dbh());
$animal = Animal::setDatabase(new Dbh());
$animalView = new AnimalView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animal-Shelter-HomePage</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/main-navigation.php'; ?>
<section class ="main-index-content">
<div class="adv-showcase">
    <button class="adv-donate-btn">
        <i class="fas fa-donate"></i>Donate</button>
</div>
<div class="d-info">
    <div class="d-medicine">
        <h1 class="adv-title"><i class="fas fa-pills"></i>Medicine</h1>
        <p>Giving oral medication to a cat or dog can be a challenge for a pet.
            If the veterinarian recommends medication for your cat or dog, she/he has your pet's best interest in mind. Fortunately, pilling and treating a pet is not an impossible task once you learn a few tricks of the trade.</p>
    </div>
    <div class="d-food">
        <h1 class="adv-title"><i class="fas fa-utensils"></i>Food</h1>
        <p>To maximize pet quality lifespan, including vitality and longevity, we must focus on pet nutrition. 
        Achieving these goals requires providing Quality Food daily, along with the "Live Nutrition" missing from Pet Foods. 
        It may sound redundant, but we as pet owners should not overlook the importance of pet nutrition.</p>
    </div>
    <div class="d-toys">
        <h1 class="adv-title"><i class="fas fa-bone"></i>Toys</h1>
        <p>Although you may give your pets toys because you just like to watch them play, providing your cats and dogs with toys is actually very important. 
            Playing with a fun toy can provide your animal with both physical and mental exercise, and both of these are key to maintaining good overall health in your cat or dog.</p>
    </div>
</div>
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
</section>
<?php include 'includes/main-footer.php'; ?>
<script src="js/shared.js"></script>
</body>
</html>