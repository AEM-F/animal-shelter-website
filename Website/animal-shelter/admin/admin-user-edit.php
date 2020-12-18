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

$totalUsers = $animalShelter->GetUserHelper()->getAllUsersCount();
$user;
$userType;
if(isset($_GET['uId'])){
    if($_GET['uId'] > 0){
        $user = $animalShelter->GetUserHelper()->getUserById($_GET['uId']);
        if($user == null){
            header("Location: admin-user-overview.php?page=1");
        }
    }
    else{
        header("Location: admin-user-overview.php?page=1");
    }
}
else{
    header("Location: admin-user-overview.php?page=1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User-Edit</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    </head>
    <body>
        <div class="backdrop"></div>
            <?php include '../includes/admin-navigation.php'; ?>
                <div class = "adm-user-content">
                    <div class="adm-user-wrapper">
                        <form id="adm_user_form" action="../handlers/user-edit-admin-handler.php" method="post" class="adm-user-form" onsubmit="ValidateUserEditInfo()">
                        <div class="adm-user-id-wrapper">
                            <input type="text" name="user-edit-id" id="input_user_edit_id" readonly value ="<?php echo $user->GetId(); ?>">
                        </div>
                            <div class="adm-user-rbtns-wrapper rbtns-typeAreaUser">
                                <div class="adm-user-rb-type-wrapper">
                                    <label for="rb_user_type_Member"><i class="fas fa-user-alt"></i>Member</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_user_type_member" name="user-edit-type" value="Member" <?php if($user->GetRole() == "Member") echo "checked=\"checked\""; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                                <div class="adm-user-rb-type-wrapper">
                                    <label for="rb_user_type_admin"><i class="fas fa-user-shield"></i>Admin</label>
                                    <span class="radio__input">
                                        <input type="radio" id="rb_user_type_admin" name="user-edit-type" value="Admin" <?php if($user->GetRole() == "Admin") echo "checked=\"checked\""; ?>>
                                        <span class="radio__control"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="user-text-inputArea-wrapper uNameArea-wrapper">
                                <div class="adm-user-text-input-wrapper">
                                    <div id="error_user_edit_name" class="user-error"></div>
                                    <label for="input_user_edit_name">Name</label>
                                    <input type="text" name="user-edit-name" id="input_user_edit_name" value="<?php echo $user->GetName(); ?>">
                                </div>
                            </div>
                            <div class="user-text-inputArea-wrapper uLastNameArea-wrapper">
                                <div class="adm-user-text-input-wrapper">
                                    <div id="error_user_edit_lastName" class="user-error"></div>
                                    <label for="input_user_edit_lastName">Last Name</label>
                                    <input type="text" name="user-edit-lastName" id="input_user_edit_lastName" value="<?php echo $user->GetLastName(); ?>">
                                </div>
                            </div>
                            <div class="user-text-inputArea-wrapper uEmailArea-wrapper">
                                <div class="adm-user-text-input-wrapper">
                                    <div id="error_user_edit_email" class="user-error"></div>
                                    <label for="input_user_edit_email">Email</label>
                                    <input type="text" name="user-edit-email" id="input_user_edit_email" value="<?php echo $user->GetEmail(); ?>">
                                </div>
                            </div>
                            <div class="user-text-inputArea-wrapper uPasswordArea-wrapper">
                                <div class="adm-user-text-input-wrapper">
                                    <div id="error_user_edit_password" class="user-error"></div>
                                    <label for="input_user_edit_password">Password</label>
                                    <input type="text" name="user-edit-password" id="input_user_edit_password">
                                </div>
                            </div>
                            <div class="adm-user-mainArea-btns-wrapper">
                                <a href="admin-user-overview.php" class="adm-user-submit-btn">Cancel</a>
                                <?php
                                    if(isset($_SESSION["userAdmEditError"]) && $_SESSION["userAdmEditError"] == true){
                                     echo "<p class=\"user-error\">Invalid input</p>";
                                    }
                                ?>
                            <div id="btn_user_form_submit" class="adm-user-submit-btn">Submit</div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php include '../includes/admin-footer.php'; ?>
        <script src="../js/shared-admin.js"></script>
        <script src="../js/validate-user-admin-edit-info.js"></script>
    </body>
</html>