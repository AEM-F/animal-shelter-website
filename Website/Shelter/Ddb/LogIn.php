<?php


     $username = "";
     $password = "";


    

if (isset($_POST['loginButton'])){
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    
    echo " Log in worked" . $username . $password;
    // _construct($_POST['username'],$_POST['password']);
    
    // echo header("Location: ../Website/index.php");
    // echo " Log in worked" . $username . $password;
   // exit();
}
else{
    echo "Log in failed";
}
// if (isset($_POST['loginButton'])){

//     require 'dbh.inch.php' ;
    
//     $username = $_POST['uid'];
//     $email = $_POST['mail'];
//     $password = $_POST['pwd'];
//     $passwordRepeat = $_Post['pwd-repeat'];

//     if(empty($username) || empty($email) || empty($password) || empty($passwordRepaet)){
//         header("Location: ..Registration.html?error=emptyfields&uid=".$username."&email=".$email);
//     }
?>