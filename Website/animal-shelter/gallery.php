<?php
include 'includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$totalAnimals = 0;
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

if(isset($_GET['page'])){
    if($_GET['page'] > $total_pages || $_GET['page'] <= 0){
        header("Location: gallery.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animal-Shelter-Gallery</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="backdrop"></div>
    <?php include 'includes/main-navigation.php'; ?>
    <section class="main-gallery-content">
        <div class="animal-page-wrapper">
            <input type="text" name="animal-page" id="input_animal_page" readonly value ="<?php echo $page; ?>">
        </div>
        <div class="animal-quick-filter-container">
            <div class="quick-filter-text">
                <h1>What kind of pet will join your familiy?</h1>
            </div>
            <div class="quick-filter-btns">
            <button class="all-filter-btn">ALL</button>
            <button class="dog-filter-btn">DOG</button>
            <button class="cat-filter-btn">CAT</button>
            <button class="bird-filter-btn">BIRD</button>
            </div>
        </div>
        <div class="pet-gallery">
            <div class= "nav-gallery-btns">
            </div>
            <div class="pet-gallery-cards">
            </div>
        </div>

    </section>
    <?php include 'includes/main-footer.php'; ?>
<script src="js/shared.js"></script>
<script src="js/ajax/animal-show-all-gallery-ajax.js"></script>
<script src="js/ajax/animal-filter-type-ajax.js"></script>
</body>
</html>