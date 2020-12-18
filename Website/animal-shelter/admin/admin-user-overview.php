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

if(isset($_SESSION["userEditError"]) && $_SESSION["userEditError"] == true){
    $_SESSION["userEditError"]=false;
}
if(isset($_SESSION["animalAddError"]) && $_SESSION["userEditError"] == true){
    $_SESSION["userEditError"]=false;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>User-Dashboard</title>
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
        <div class="user-remove-popup-container"></div>
        <?php include '../includes/admin-navigation.php'; ?>
        <div class="user-dashboard-content">
            <div class="user-page-wrapper">
                <input type="text" name="user-page" id="input_user_page" readonly value ="<?php echo $page; ?>">
            </div>
            <div class="user-overview-title-container">
                <p>
                    User Overview
                </p>
            </div>
            <div id="error_user_search" class="user-error"></div>
            <form action="" method="get" class="user-overview-form-search">
                <label for="input-user-name">Search Name</label>
                <input type="text" name="input_user_name" id="input_search_name">
                <div id="user_search_btn" class="user-search-submit-btn">Search</div>
            </form>
            <div class="user-overview-container">
                <div id="user_overview_list" class="user-overview-list">
                </div>
                <div class="user-overview-list-controls">
                </div>
            </div>
            <form action="../handlers/user-overview-handler.php" method="post" class="user-overview-form">
                <div class="input-user-overview-wrapper">
                    <label for="user-id">ID</label>
                    <input type="text" name="input-user-id" id="input_selected_id">
                </div>
                <div class="user-form-overview-btn-wrap">
                    <div id="user-remove-btn" class="user-overview-submit-btn">Remove</div>
                    <input type="submit" value="Edit" name="user-edit-btn" class="user-overview-submit-btn">
                    <input type="submit" value="Add" name="user-add-btn" class="user-overview-submit-btn">
                </div>
            </form>
        </div>
        <?php include '../includes/admin-footer.php'; ?>
        <script src="../js/shared-admin.js"></script>
        <script src="../js/user-select.js"></script>
        <script src="../js/ajax/user-show-all-ajax.js"></script>
        <script src="../js/ajax/user-search-ajax.js"></script>
        <script src="../js/ajax/user-remove-popup-ajax.js"></script>
    </body>
</html>