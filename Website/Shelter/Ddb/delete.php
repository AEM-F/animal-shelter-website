<?php
session_start();
include_once("config.php");

$con = config::connect();

$email = $_SESSION['Email'];
$password = $_SESSION['Password'];

$query = $con->prepare("
DELETE FROM website_signup WHERE Email=:Email AND Password=:Password
");

$query->bindParam(":Email",$email);
$query->bindParam(":Password",$password);

$query->execute();
// make it go to editor page
header("Location: LogInForm.php");