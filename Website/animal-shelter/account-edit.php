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

$editError= false;
if(isset($_SESSION["userEditError"])){
    if($_SESSION["userEditError"] == true){
        $editError = $_SESSION["userEditError"];
    }
}

$animalShelter = AnimalShelter::GetInstance();
$loggedUser= $animalShelter->GetUserHelper()->getUserById($user_id);
?>
    <!DOCTYPE html>
<html lang="en">
    <head>
    <title>Account-Edit-page</title>
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
    <section class="account-edit-content">
        <div class="user-edit-card-wrapper">
            <div class="user-card-header">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="user-card-body">
                <form action="handlers/user-edit-handler.php" method="post" class="user-edit-info-form" onsubmit="return ValidateUserEditInfo()">
                <div id="error_user_edit_name" class="user-error"></div>
                    <div id="user-name" class="user-edit-text-input-wrap">
                        <b>Name:</b>
                        <input id="user_edit_name" class="user-edit-text-input" type="text" name="input-edit-name" placeholder="" value="<?php echo $loggedUser->GetName();?>" />
                    </div>
                    <div id="error_user_edit_password" class="userEPError user-error"></div>
                    <div id="user-password" class="user-edit-text-input-wrap">
                        <b>Password:</b>
                        <input id="user_edit_password" class="user-edit-text-input" type="password" name="input-edit-password" placeholder="" value=""/>
                    </div>
                    <div id="error_user_edit_cpassword" class="user-error"></div>
                    <div id="user-cPassword" class="user-edit-text-input-wrap">
                        <b>Confirm Password:</b>
                        <input id="user_edit_cpassword" class="user-edit-text-input" type="password" name="input-edit-confirm-password" placeholder="" value=""/>
                    </div>
                    <div id="error_user_edit_lastName" class="user-error"></div>
                    <div id="user-lastName" class="user-edit-text-input-wrap">
                        <b>Last Name:</b>
                        <input id="user_edit_lastName" class="user-edit-text-input" type="text" name="input-edit-last-name" placeholder="" value="<?php echo $loggedUser->GetLastName();?>"/>
                    </div>
                    <div id="error_user_edit_email" class="user-error"></div>
                    <div id="user-email" class="user-edit-text-input-wrap">
                        <b>Email:</b>
                        <input id="user_edit_email" class="user-edit-text-input" type="text" name="input-edit-email" placeholder="" value="<?php echo $loggedUser->GetEmail();?>"/>
                    </div>
                    <div id="user-edit-buttons" class="user-edit-form-btn-wrapper">
                        <a href="account-overview.php" class="user-edit-btn">Cancel</a>
                        <input id="user_edit_name" type="submit" name="user-update-btn" value="Submit" class="user-edit-submit-btn" />
                    </div>
                </form>
                <?php
                if($editError == true){
                    echo "<div class=\"user-edit-error\">Invalid input</div>";
                }
                ?>
            </div>
        </div>
    </section>
    <?php include 'includes/main-footer.php'; ?>
    <script src="js/validate-editInfo.js"></script>
    <script src="js/shared.js"></script>
</body>
</html>