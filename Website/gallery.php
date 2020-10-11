<?php
include 'includes/class-autoloader.inc.php';
Animal::setDatabase(new Dbh());
$animalView = new AnimalView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animal-Shelter-Gallery</title>
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
    <?php include 'includes/main-navigation.php'; ?>
    <section class="main-gallery-content">

    </section>
    <?php include 'includes/main-footer.php'; ?>
<script src="js/shared.js"></script>
</body>
</html>