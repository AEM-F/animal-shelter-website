<?php
include 'includes/class-autoloader.inc.php';
$animalManager = new AnimalManager();
$totalAnimals = $animalManager->getTotalAnimals();
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$animalsPerPage = 10;
$startNr = ($animalsPerPage * $page) - $animalsPerPage;
$total_pages = ceil($totalAnimals / $animalsPerPage);
$animalsByLimit = $animalManager->getAllAnimalsByLimit($startNr, $animalsPerPage);
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
</head>
<body>
    <?php include 'includes/main-navigation.php'; ?>
    <section class="main-gallery-content">
        <div class="animal-quick-filter-container">
            <div class="quick-filter-text">
                <h1>What kind of pet will join your familiy?</h1>
            </div>
            <button class="dog-filter-btn">DOG</button>
            <button class="cat-filter-btn">CAT</button>
            <button class="bird-filter-btn">BIRD</button>
        </div>
        <div class="pet-gallery">
            <div class= "nav-gallery-btns">
            <?php
            if($page>1){
                // btn first page
                echo "<a href='" . $_SERVER['PHP_SELF'] . "' title='Go to the first page.' class='first-page-btn'>";
                    echo "<<";
                echo "</a>";
                 
                // btn previous page
                $prev_page = $page - 1;
                echo "<a href='" . $_SERVER['PHP_SELF'] 
                        . "?page={$prev_page}' title='Previous page is {$prev_page}.' class='previous-page-btn'>";
                    echo "<";
                echo "</a>";
                 
            } 
            if($page<$total_pages){
                // btn the next page
                $next_page = $page + 1;
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$next_page}' title='Next page is {$next_page}.' class='last-page-btn push'>";
                    echo "> ";
                echo "</a>";
                 
                // btn the last page
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$total_pages}' title='Last page is {$total_pages}.' class='next-page-btn'>";
                    echo ">>";
                echo "</a>";
            }
            ?>
            </div>
            <div class="pet-gallery-cards">
              <?php
              foreach($animalsByLimit as $animal){
                  $animalManager->showAnimalForGallery($animal);
              }
              ?>
            </div>
        </div>

    </section>
    <?php include 'includes/main-footer.php'; ?>
<script src="js/shared.js"></script>
</body>
</html>