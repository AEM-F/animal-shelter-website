<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
if (isset($_SESSION["userId"])) {
    $user_id = $_SESSION["userId"];
} else {
    header("Location: index.php");
}

if (isset($_POST["user-edit-id"]) && isset($_POST["user-edit-type"]) && isset($_POST["user-edit-name"]) && isset($_POST["user-edit-lastName"]) && isset($_POST["user-edit-email"]) && isset($_POST["user-edit-password"])) {
    $inputType = $animalShelter->sanitizeString($_POST["user-edit-type"]);
    $inputName = $animalShelter->sanitizeString($_POST["user-edit-name"]);
    $inputLastName = $animalShelter->sanitizeString($_POST["user-edit-lastName"]);
    $inputEmail = $animalShelter->sanitizeString($_POST["user-edit-email"]);
    $inputPassword = $animalShelter->sanitizePassword($_POST["user-edit-password"]);
    $inputId = $animalShelter->sanitizeString($_POST["user-edit-id"]);
    if (empty($inputName) || empty($inputLastName) || empty($inputEmail) || empty($inputPassword) || empty($inputId)) {
        $_SESSION["admUserAddError"] = true;
        header("Location: ../admin/admin-user-edit.php");
    } else {
        if (strlen($inputName) < 50 || strlen($inputLastName) < 50 || strlen($inputEmail) < 50 || strlen($_POST["user-edit-password"]) < 50) {
            $selectedUser = $animalShelter->GetUserHelper()->getUserById($inputId);
            if ($inputEmail == $selectedUser->GetEmail()) {
                if ($inputType == "Admin") {
                    $user = new Admin($inputName, $inputLastName, $inputEmail, $inputPassword, $inputType);
                    $user->SetId($selectedUser->GetId());
                } elseif ($inputType == "Member") {
                    $user = new Member($inputName, $inputLastName, $inputEmail, $inputPassword, $inputType);
                    $user->SetId($selectedUser->GetId());
                }

                $animalShelter->GetUserHelper()->updateUser($user);
                $_SESSION["admUserAddError"] = false;
                //echo "success";
                header("Location: ../admin/admin-user-overview.php");
            } else {
                if ($animalShelter->GetUserHelper()->validateEmail($inputEmail)) {
                    $_SESSION["admUserAddError"] = true;
                    header("Location: ../admin/admin-user-edit.php");
                } else {
                    if ($inputType == "Admin") {
                        $user = new Admin($inputName, $inputLastName, $inputEmail, $inputPassword, $inputType);
                        $user->SetId($selectedUser->GetId());
                    } elseif ($inputType == "Member") {
                        $user = new Member($inputName, $inputLastName, $inputEmail, $inputPassword, $inputType);
                        $user->SetId($selectedUser->GetId());
                    }
                    $isUpdated = $animalShelter->GetUserHelper()->updateUser($user);
                    $_SESSION["userAdmEditError"] = false;
                    header("Location: ../admin/admin-user-overview.php");
                }
            }
        } else {
            $_SESSION["userAdmEditError"] = true;
            header("Location: ../admin/admin-user-edit.php");
            // echo "fail at lenghth";
        }
    }
} else {
    header("Location: ../admin/admin-user-overview.php");
    //echo "fail at submit";
}
?>