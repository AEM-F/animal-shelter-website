<?php

class Config {

    public static function connect(){

     $host = "localhost" ;
     $username = "root";
     $password = "";
      $dbname = "websiteanimals";

    /* Attempt to connect to MySQL database */
    try{
     $con = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
     
     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    catch(PDOException $e)
    {
            echo "Connection failed". $e -> getMessage();
    }
    return $con;
}
}
// $mysqli = new mysqli($host, $username, $password, $dbname);
 
// Check connection
// if($mysqli === false){
//     die("ERROR: Could not connect. " . $mysqli->connect_error);
// }


/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'demo');
 

?>