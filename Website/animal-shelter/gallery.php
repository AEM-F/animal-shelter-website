<?php
include 'includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$totalAnimals = 0;
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$animalsPerPage = 10;
$startNr = ($animalsPerPage * $page) - $animalsPerPage;
$total_pages=0;
$animalsByLimit= array();
$filter="";
if(isset($_GET["all_filter"])){
    $_SESSION["filter"] = "&all_filter=";
}

if(isset($_GET["dog_filter"])){
    $_SESSION["filter"] = "&dog_filter=";
}

if(isset(($_GET["cat_filter"]))){
    $_SESSION["filter"] = "&cat_filter=";
}

if(isset(($_GET["bird_filter"]))){
    $_SESSION["filter"] = "&bird_filter=";
}

if(isset($_SESSION["filter"])){
    $filter = $_SESSION["filter"];
    if($filter == "&all_filter="){
    $animalsByLimit = $animalShelter->GetAnimalHelper()->getAllAnimalsByLimit($startNr, $animalsPerPage);
    $totalAnimals = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
    $total_pages = ceil($totalAnimals / $animalsPerPage);
    }

    if($filter == "&dog_filter="){
        $animalsByLimit = $animalShelter->GetAnimalHelper()->getTypeAnimalsByLimit($startNr,$animalsPerPage, "Canine");
        $totalAnimals = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), "Canine"));
        $total_pages=ceil( $totalAnimals / $animalsPerPage );
    }
    if($filter == "&cat_filter="){
        $animalsByLimit = $animalShelter->GetAnimalHelper()->getTypeAnimalsByLimit($startNr,$animalsPerPage, "Feline");
        $totalAnimals = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), "Feline"));
        $total_pages=ceil($totalAnimals / $animalsPerPage );
    }
    if($filter == "&bird_filter="){
        $animalsByLimit = $animalShelter->GetAnimalHelper()->getTypeAnimalsByLimit($startNr,$animalsPerPage, "Avian");
        $totalAnimals = count($animalShelter->getAnimalsByType($animalShelter->GetAnimalHelper()->getAllAnimals(), "Avian"));
        $total_pages=ceil($totalAnimals / $animalsPerPage );
    }
        
}
else{
    $totalAnimals = $animalShelter->GetAnimalHelper()->getAllAnimalsCount();
    $total_pages = ceil($totalAnimals / $animalsPerPage);
    $animalsByLimit = $animalShelter->GetAnimalHelper()->getAllAnimalsByLimit($startNr, $animalsPerPage);
}



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
</head>
<body>
    <div class="backdrop"></div>
    <?php include 'includes/main-navigation.php'; ?>
    <section class="main-gallery-content">
        <div class="animal-quick-filter-container">
            <div class="quick-filter-text">
                <h1>What kind of pet will join your familiy?</h1>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <button type="submit" name="all_filter" class="all-filter-btn">ALL</button>
            <button type="submit" name="dog_filter" class="dog-filter-btn">DOG</button>
            <button type="submit" name="cat_filter" class="cat-filter-btn">CAT</button>
            <button type="submit" name="bird_filter" class="bird-filter-btn">BIRD</button>
            </form>
        </div>
        <div class="pet-gallery">
            <div class= "nav-gallery-btns">
            <?php
            if($page>1){
                // btn first page
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={1}" . $filter . "' title='Go to the first page.' class='first-page-btn'>";
                    echo "<<";
                echo "</a>";
                 
                // btn previous page
                $prev_page = $page - 1;
                echo "<a href='" . $_SERVER['PHP_SELF'] 
                        . "?page={$prev_page}". $filter ."' title='Previous page is {$prev_page}.' class='previous-page-btn'>";
                    echo "<";
                echo "</a>";
                 
            } 
            if($page<$total_pages){
                // btn the next page
                $next_page = $page + 1;
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$next_page}". $filter ."' title='Next page is {$next_page}.' class='last-page-btn push'>";
                    echo "> ";
                echo "</a>";
                 
                // btn the last page
                echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$total_pages}". $filter . "' title='Last page is {$total_pages}.' class='next-page-btn'>";
                    echo ">>";
                echo "</a>";
            }
            ?>
            </div>
            <div class="pet-gallery-cards">
              <?php
              foreach($animalsByLimit as $animal){
                  $animalShelter->GetAnimalView()->showAnimalForGallery($animal);
              }
              ?>
            </div>
        </div>

    </section>
    <?php include 'includes/main-footer.php'; ?>
<script src="js/shared.js"></script>
</body>
</html>