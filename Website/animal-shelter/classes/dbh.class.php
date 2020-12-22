<?php
class Dbh{
    // private $host = "studmysql01.fhict.local";
    // private $user = "dbi437101";
    // private $pwd = "1234";
    // private $dbName = "dbi437101";

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "animalshelter_web";

    public function connect(){
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
        return $pdo;
        } catch (PDOException $e) {
            echo "Exception :  " . $e->getMessage();
        }
    }
}
?>