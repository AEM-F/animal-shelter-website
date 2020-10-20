<?php

$dBhost = "localhost";
$dBuser = "root";
$dBpassword = "admin";
$dbname = "animalshelter_website";
$conn = mysqli_connect($host,$user,$pw);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
    // $conn = new PDO("mysql:host=$host;dbname =$dbname" ,$user,$pw);
    // $conn->collator_set_attribute()

?>
