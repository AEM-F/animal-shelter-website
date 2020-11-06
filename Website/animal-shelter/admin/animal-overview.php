<?php
include '../includes/class-autoloader.inc.php';
session_start();
$userManager = new UserManager();
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
    $loggedUser= $userManager->getUserById($user_id);
    if($loggedUser->GetRole() != "Admin"){
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../index.php");
}
$animalManager = new AnimalManager();
$totalAnimals = 0;
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$animalsPerPage = 5;
$startNr = ($animalsPerPage * $page) - $animalsPerPage;
$total_pages=0;
$animalsByLimit= array();
$filter="";

if(isset($_GET["animal-all-submit-btn"])){
    if(isset($_SESSION["admAnimalFilter"])){
        unset($_SESSION['admAnimalFilter']);
    }
}

if(isset($_GET["input_animal_name"])){
    $aName = $animalManager->sanitizeString($_GET["input_animal_name"]);
    $_SESSION["admAnimalFilter"] = $aName;
    }

if(isset($_SESSION["admAnimalFilter"])){
    $filter = $_SESSION["admAnimalFilter"];
    $animalsByLimit = $animalManager->getAnimalsByNameAndLimit($startNr,$animalsPerPage, $filter);
    $totalAnimals = $animalManager->getTotalAnimalsByName($filter);
    $total_pages=ceil( $totalAnimals / $animalsPerPage );
    }
else{
    $totalAnimals = $animalManager->getTotalAnimals();
    $total_pages = ceil($totalAnimals / $animalsPerPage);
    $animalsByLimit = $animalManager->getAllAnimalsByLimit($startNr, $animalsPerPage);
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
    <title>Animal-Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="backdrop"></div>
        <?php include '../includes/admin-navigation.php'; ?>
        <div class="animal-dashboard-content">
            <div class="animal-overview-title-container">
                <p>
                    Animal Overview
                </p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="animal-overview-form-search">
                            <label for="input-animal-name">Search Name</label>
                            <input type="text" name="input_animal_name" id="input_search_name">
                        <input type="submit" value="Submit" name="animal-search-submit-btn" class="animal-search-submit-btn">
                    </form>
            <div class="animal-overview-container">
                <div class="animal-overview-list">
                    <?php 
                        foreach ($animalsByLimit as $animal) {
                            $animalManager->showAnimalForAnimalOverview($animal);
                        }
                    ?>
                </div>
                <div class="animal-overview-list-controls">
                <?php
                    if($page>1){
                        // btn first page
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page=1";
                        if($filter != ""){
                            echo"&input_animal_name=". $filter . "&animal-search-submit-btn=Submit";
                        }
                        else{
                            echo "";
                        } 
                         echo "' title='Go to the first page.' class='a-first-page-btn'>";
                            echo "<<";
                        echo "</a>";
                        
                        // btn previous page
                        $prev_page = $page - 1;
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$prev_page}";
                        if($filter != ""){
                            echo"&input_animal_name=". $filter . "&animal-search-submit-btn=Submit";
                        }
                        else{
                            echo "";
                        }
                         echo "' title='Previous page is {$prev_page}.' class='a-previous-page-btn'>";
                            echo "<";
                        echo "</a>";
                        
                    } 
                    echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"get\" class=\"animal-overview-form-all\">
                            <input type=\"submit\" value=\"Show All\" name=\"animal-all-submit-btn\" class=\"animal-search-submit-btn\">
                        </form>";
                        
                    if($page<$total_pages){
                        // btn the next page
                        $next_page = $page + 1;
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$next_page}";
                        if($filter != ""){
                            echo"&input_animal_name=". $filter . "&animal-search-submit-btn=Submit";
                        }
                        else{
                            echo "";
                        }
                        echo "' title='Next page is {$next_page}.' class='a-next-page-btn push'>";
                            echo "> ";
                        echo "</a>";
                        
                        // btn the last page
                        echo "<a href='" . $_SERVER['PHP_SELF'] . "?page={$total_pages}";
                        if($filter != ""){
                            echo"&input_animal_name=". $filter . "&animal-search-submit-btn=Submit";
                        }
                        else{
                            echo "";
                        } 
                         echo "' title='Last page is {$total_pages}.' class='a-last-page-btn'>";
                            echo ">>";
                        echo "</a>";
                    }
                ?>
                </div>
            </div>
            <form action="" method="post" class="animal-overview-form">
                <div class="input-animal-overview-wrapper">
                    <label for="input-animal-id">ID</label>
                    <input type="text" name="input-animal-id" id="input_selected_id">
                </div>
                <div class="animal-form-overview-btn-wrap">
                    <input type="submit" value="Remove" name="animal-remove-btn" class="animal-overview-submit-btn">
                    <input type="submit" value="Edit" name="animal-edit-btn" class="animal-overview-submit-btn">
                    <input type="submit" value="Add" name="animal-add-btn" class="animal-overview-submit-btn">
                </div>
            </form>
        </div>
        <?php include '../includes/admin-footer.php'; ?>
        <script src="../js/shared-admin.js"></script>
        <script src="../js/animal-select.js"></script>
    </body>
</html>