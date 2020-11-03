<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'includes/class-autoloader.inc.php';
$userManager = new UserManager();

echo "Get by id: <br>";
$samById = $userManager->getUserById(21);
print_r($samById);
// echo "<br>";
// echo "<br>Get by name: <br>";
// $samByEmail = $userManager->getUserByEmail("stimxxx99@gmail.com");
// print_r($samByEmail);
// echo "<br>";
// echo "<br>Validate Login(Test Values: Sam, 6769f693b6aa757cb27fd2e33e7c74d4) : <br>";
// $validateSam = $userManager->validateLogIn("Sam", "6769f693b6aa757cb27fd2e33e7c74d4");
// // $validateSam = $userManager->validateLogIn("stimxxx99@gmail.com", "6769f693b6aa757cb27fd2e33e7c74d4");
// if($validateSam){
//     echo "Login was succesfull";
// }
// else{
//     echo "eh.. next time maybe";
// }
?>