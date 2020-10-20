<?php

session_start();
include_once("config.php");

// $con = Config::connect();
// $con = new Config();
// $con->connect();

if(isset($_POST['signUpButton'])){

    $con = config::connect();
    $firstName = sanitizeString($_POST['FirstName']);
    $lastName = sanitizeString($_POST['LastName']);
    $email = sanitizeString($_POST['Email']);
    $password = sanitizePassword($_POST['Password']);
    if($firstName == "" || $lastName == "" || $email == "" || $password == "")
    {
        return;
    }
    // $passwordRpt = $_POST['PasswordRpt'];
    if(insertDetails($con,$firstName,$lastName ,$email,$password));
    {
        $_SESSION['Email'] = $email;

        header("Location: profile.php");
    }
}

if(isset($_POST['loginButton'])){

    
    $con = config::connect();
    $email = sanitizeString($_POST['Email']);
    $password = sanitizePassword($_POST['Password']);

    if($email == "" || $password == "")
    {
        return; // echo update ,p>
    }
    
    if(checkLogin($con,$email,$password)){
        $_SESSION['Email'] = $email;
        header("Location: profile.php");
    }
    else
    {
        echo "The username and password are incorrect";
    }
    // $passwordRpt = $_POST['PasswordRpt'];
    //    checkLogin($con,$email,$password);

}

if(isset($_POST['UpdateUser'])){

    $con = config::connect();
    $firstName = sanitizeString($_POST['FirstName']);
    $lastName = sanitizeString($_POST['LastName']);
    $email = sanitizeString($_POST['Email']);
    $password = sanitizePassword($_POST['Password']);
    if($firstName == "" || $lastName == "" || $email == "" || $password == "")
    {
        return ;
    }
    // $passwordRpt = $_POST['PasswordRpt'];
    if(insertDetails($con,$firstName,$lastName ,$email,$password));
    {
        $_SESSION['Email'] = $email;

        header("Location: profile.php");
    }
    
    $currentEmail = $_SESSION['Email'];

    $query = $con->prepare("
    
    SELECT * FROM website_signup where Email=:Email

    ");

    $query->bindParam(":Email",$currentEmail);

    $result = $query->fetch(PDO::FETCH_ASSOC);

    $id = $result['id'];

    if(updateDetails($con,$id,$firstName,$lastName,$email,$password)){

    }

}   


function checkLogin($con,$email,$password){
    $query = $con->prepare("
    SELECT * FROM website_signup WHERE Email=:Email AND Password=:Password
    ");

    $query->bindParam(":Email",$email);
    $query->bindParam(":Password",$password);

    $query->execute();

    // check rows

    if($query->rowCount() == 1){
        return true;
    }
    else{
        return false;
    }
}




function insertDetails($con,$firstName,$lastName ,$email,$password){
    // where session is equal to this one
    $query = $con->prepare("
    INSERT INTO website_signup(Name,LastName,Email,Password)
    VALUES(:Name,:LastName,:Email,:Password) 
    ");

    $query->bindParam(":Name",$firstName);
    $query->bindParam(":LastName",$lastName);
    $query->bindParam(":Email",$email);
    $query->bindParam(":Password",$password);

    return $query->execute();
}

 
function sanitizeString ($string)
{
    $string = strip_tags($string);

    $string = str_replace(" ","",$string);

    return $string;
}

function sanitizePassword($string)
{
    $string = md5($string);

    return $string;
}

?>