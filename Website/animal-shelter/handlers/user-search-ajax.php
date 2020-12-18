<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();

if(isset($_POST["user_name"]) && $_POST["user_name"] != "" && $_POST["user_page"] != ""){
    $inputName = $_POST["user_name"];
    $page = $_POST["user_page"];
    if(strlen($inputName) < 50 && is_numeric($page)){
        $userPerPage = 5;
        $startNr = ($userPerPage * $page) - $userPerPage;
        $totalUsers = $animalShelter->GetUserHelper()->getAllUsersByNameCount($inputName);
            if($totalUsers > 0){
                $usersByLimit = $animalShelter->GetUserHelper()->getUsersByNameAndLimit($startNr,$userPerPage, $inputName);
                $total_pages=ceil( $totalUsers / $userPerPage );
                    foreach ($usersByLimit as $user) {
                        $animalShelter->GetUserView()->showUserForUserOverview($user);
                    }
            }
            else{
                echo " <div class=\"user-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> No users found with the given name</div>";
            }
    }
    else{
        echo " <div class=\"user-error-overview\"><i class=\"fas fa-exclamation-triangle\"></i> Invalid input</div>";
    }
}
else{
    echo "
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.ico' />
    <link rel=\"stylesheet\" href=\"../main.css\">
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.12.1/css/all.css\" crossorigin=\"anonymous\">
    <link href=\"https://fonts.googleapis.com/css2?family=Bangers&display=swap\" rel=\"stylesheet\"> 
    <link href=\"https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" crossorigin=\"anonymous\">
</head>
    ";
    echo "
    <div class=\"error-page-controls\">
        <a href=\"../index.php\"><i class=\"fas fa-home\"></i>To homepage</a>
    </div>
    ";
    echo "<div class=\"cover-full-page\"><div class=\"user-error-overview error-normal\"><i class=\"fas fa-exclamation-triangle\"></i> Error Call</div></div>";
}
?>