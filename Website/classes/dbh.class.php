<?php
class Dbh{
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