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
            <form action="" method="get" class="animal-overview-form-search">
                            <label for="input-animal-name">Search Name</label>
                            <input type="text" name="input-animal-name" id="input_search_name">
                        <input type="submit" value="Submit" name="animal-search-submit-btn" class="animal-search-submit-btn">
                    </form>
            <div class="animal-overview-container">
                <div class="animal-overview-list">
                    <button id="animal-1" class="animal-container-btn">
                        <img src="../images/Mario.jpg" alt="Animal Photo">
                        <div class="animal-short-info">
                            <p>Sex: MALE | Breed: unknown | Size: MEDIUM | Age: unknown</p>
                        </div>
                        <p class="animal-container-name">
                                Mario
                        </p>
                    </button>

                    <button id="animal-2" class="animal-container-btn">
                        <img src="../images/mia.jpg" alt="Animal Photo">
                        <div class="animal-short-info">
                            <p>Sex: FEMALE | Breed: unknown | Size: SMALL | Age: unknown</p>
                        </div>
                        <p class="animal-container-name">
                                Mia
                        </p>
                    </button>

                    <button id="animal-3" class="animal-container-btn">
                        <img src="../images/penelope.jpg" alt="Animal Photo">
                        <div class="animal-short-info">
                            <p>Sex: FEMALE | Breed: unknown | Size: SMALL | Age: unknown</p>
                        </div>
                        <p class="animal-container-name">
                                Penelope
                        </p>
                    </button>

                    <button id="animal-4" class="animal-container-btn">
                        <img src="../images/Maxy-dog-new.jpg" alt="Animal Photo">
                        <div class="animal-short-info">
                            <p>Sex: MALE | Breed: unknown | Size: LARGE | Age: unknown</p>
                        </div>
                        <p class="animal-container-name">
                                Max
                        </p>
                    </button>

                    <button id="animal-5" class="animal-container-btn">
                        <img src="../images/pug.png" alt="Animal Photo">
                        <div class="animal-short-info">
                            <p>Sex: MALE | Breed: unknown | Size: SMALL | Age: unknown</p>
                        </div>
                        <p class="animal-container-name">
                                Frank:)
                        </p>
                    </button>
                </div>
                <div class="animal-overview-list-controls">
                    <a href="" title='Go to the first page.' class="a-first-page-btn"><<</a>
                    <a href="" title='Previous page is .' class="a-previous-page-btn"><</a>
                    <a href="" title='Next page is .' class="a-next-page-btn push">></a>
                    <a href="" title='Last page is .' class="a-last-page-btn">>></a>
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