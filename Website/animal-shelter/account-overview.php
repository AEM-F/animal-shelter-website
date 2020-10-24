<?php
include 'includes/class-autoloader.inc.php';
session_start();
$user_name;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
}
else{
    header("Location: index.php");
}
$_SESSION["userEditError"] = false;
$userManager = new UserManager();
$loggedUser= $userManager->getUserById($user_id);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Account-overview-page</title>
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
        <div class="account-view-content">
            <div class="user-card-wrapper">
                <div class="user-card-header">
                    <i class="fas fa-user-cog"></i>
                </div>
                <div class="user-card-body">
                    <p class="user-card-textinfo">
                        <?php
                        $userManager->showUser($loggedUser);
                        ?>
                    </p>
                    <a href="account-edit.php" class="user-edit-btn"><i class="fas fa-user-edit"></i>Edit info</a>
                </div>
            </div>
        </div>
        <?php include 'includes/main-footer.php'; ?>
        <script src="js/shared.js"></script>
    </body>
</html>