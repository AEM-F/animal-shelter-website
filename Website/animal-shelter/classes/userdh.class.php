<?php
class UserDh{

    private $database;

    public function __construct(){
        $db = new Dbh();
        $this->database = $db;
    }
    
    public function getUserByName($name){
        $sql="SELECT * FROM website_shelter_users WHERE `Name`=:uname";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['uname' => $name]);

        $obj;
        foreach ($results as $row) {
            $obj = new User($row ["Name"], $row ["LastName"], $row ["Email"], $row ["Password"]);
            $obj->SetId($row ["Id"]);
        }
        return $obj;
    }

    public function getUserByEmail($email){
        $sql="SELECT * FROM website_shelter_users WHERE `Email`=:email";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['email' => $email]);

        $obj;
        foreach ($results as $row) {
            $obj = new User($row ["Name"], $row ["LastName"], $row ["Email"], $row ["Password"]);
            $obj->SetId($row ["Id"]);
        }
        return $obj;
    }

    public function validateLogIn($email,$password){
        $query = "SELECT * FROM website_shelter_users WHERE `Email`=:email AND `Password`=:upassword";
        $results = $this->database->connect()->prepare($query);
        $results->bindValue(":email",$email);
        $results->bindValue(":upassword",$password);

        $results->execute();

        if($results->rowCount() == 1){
            return true;
        }
        else{
            return false;
         }

    }

    public function updateUser($user){
        $sql="UPDATE `website_shelter_users` SET `Name`=:uname, `LastName`=:lastName, `Email`=:email, `Password`=:upassword WHERE `Id`=:id";
        $results=$this->database->connect()->prepare($sql);
        $results->bindValue(':id', $user->GetId());
        $results->bindValue(':uname', $user->GetName());
        $results->bindValue(':lastName', $user->GetLastName());
        $results->bindValue(':email', $user->GetEmail());
        $results->bindValue(':upassword', $user->GetPassword());
        $results->execute();
    }

    public function insertUser($user){
        $sql="INSERT INTO `website_shelter_users` (`Name`, LastName, Email, `Password`) VALUES (:uname, :lastName, :email, :upassword)";
        $results=$this->database->connect()->prepare($sql);

        $results->bindValue(':uname', $user->GetName());
        $results->bindValue(':lastName', $user->GetLastName());
        $results->bindValue(':email', $user->GetEmail());
        $results->bindValue(':upassword', $user->GetPassword());
        $results->execute();
    }

}
?>