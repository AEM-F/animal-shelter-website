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
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if(isset($_GET['page'])){
    if($_GET['page'] > $total_pages || $_GET['page'] <= 0){
        header("Location: animal-overview.php");
    }
}

if(isset($_SESSION["animalEditError"]) && $_SESSION["animalEditError"] == true){
    $_SESSION["animalEditError"]=false;
}
if(isset($_SESSION["animalAddError"]) && $_SESSION["animalAddError"] == true){
    $_SESSION["animalAddError"]=false;
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <div class="backdrop"></div>
        <?php include '../includes/admin-navigation.php'; ?>
        <div class="animal-dashboard-content">
            <div class="animal-page-wrapper">
                <input type="text" name="animal-page" id="input_animal_page" readonly value ="<?php echo $page; ?>">
            </div>
            <div class="animal-overview-title-container">
                <p>
                    Animal Overview
                </p>
            </div>
            <div id="error_animal_search" class="animal-error"></div>
            <form action="" method="get" class="animal-overview-form-search">
                <label for="input-animal-name">Search Name</label>
                <input type="text" name="input_animal_name" id="input_search_name">
                <div id="animal_search_btn" class="animal-search-submit-btn">Search</div>
            </form>
            <div class="animal-overview-container">
                <div id="animal_overview_list" class="animal-overview-list">
                </div>
                <div class="animal-overview-list-controls">
                </div>
            </div>
            <form action="../handlers/animal-overview-handler.php" method="post" class="animal-overview-form">
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
        <script src="../js/ajax/animal-show-all-ajax.js"></script>
        <script src="../js/ajax/animal-search-ajax.js"></script>
    </body>
</html>