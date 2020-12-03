<?php
include '../includes/class-autoloader.inc.php';
session_start();
$animalShelter = AnimalShelter::GetInstance();
$user_name;
if(isset($_SESSION["userId"])){
    $user_id = $_SESSION["userId"];
}
else{
    header("Location: index.php");
}

