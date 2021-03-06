<?php
class UserDh{

    private $database;

    public function __construct(){
        $db = new Dbh();
        $this->database = $db;
    }
    
    public function getUserById($id){
        $sql="SELECT * FROM website_shelter_users WHERE `Id`=:id";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['id' => $id]);

        $obj = null;
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
        }
        return $obj;
    }

    public function getUserByEmail($email){
        $sql="SELECT * FROM website_shelter_users WHERE `Email`=:email";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['email' => $email]);

        $obj = null;
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
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

    public function validateEmail($email){
        $query = "SELECT * FROM website_shelter_users WHERE `Email`=:email";
        $results = $this->database->connect()->prepare($query);
        $results->bindValue(":email",$email);

        $results->execute();

        if($results->rowCount() > 0){
            return true;
        }
        else{
            return false;
         }
    }

    public function updateUser($user){
        $sql="UPDATE `website_shelter_users` SET `Name`=:uname, `LastName`=:lastName, `Email`=:email, `Password`=:upassword, `Role`=:urole WHERE `Id`=:id";
        try{
            $results=$this->database->connect()->prepare($sql);
        $results->bindValue(':id', $user->GetId());
        $results->bindValue(':uname', $user->GetName());
        $results->bindValue(':lastName', $user->GetLastName());
        $results->bindValue(':email', $user->GetEmail());
        $results->bindValue(':upassword', $user->GetPassword());
        $results->bindValue(':urole', $user->GetRole());
        $results->execute();
        }
        catch(Exception $e){
            return false;
        }
        return true;
    }

    public function insertUser($user){
        $sql="INSERT INTO `website_shelter_users` (`Name`, LastName, Email, `Password`, `Role`) VALUES (:uname, :lastName, :email, :upassword, :urole)";
        $results=$this->database->connect()->prepare($sql);

        $results->bindValue(':uname', $user->GetName());
        $results->bindValue(':lastName', $user->GetLastName());
        $results->bindValue(':email', $user->GetEmail());
        $results->bindValue(':upassword', $user->GetPassword());
        $results->bindValue(':urole', $user->GetRole());
        $results->execute();
    }

    public function removeUserById($id){
        $sql="DELETE FROM website_shelter_users WHERE `Id`=:id";
        $result= $this->database->connect()->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();
    }

    public function getAllUsersCount(){
        $sql = "SELECT COUNT(*) FROM website_shelter_users";
        $results = $this->database->connect()->query($sql)->fetchColumn();
        return $results;
    }

    public function getAllUsersByNameCount($name){
        $sql = "SELECT COUNT(*) FROM website_shelter_users WHERE `Name`=\"{$name}\"";
        $results = $this->database->connect()->query($sql)->fetchColumn();
        return $results;
    }

    public function getAllUsersByLimit($startNr,$nrPerPage){
        $sql = "SELECT * FROM website_shelter_users ORDER BY `Id` desc LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj = null;
        $users = [];
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            $users[] = $obj;
        }
        return $users;
    }

    public function getUsersByNameAndLimit($startNr, $nrPerPage, $name){
        $sql = "SELECT * FROM website_shelter_users WHERE `Name`=\"{$name}\" ORDER BY `Id` DESC LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj = null;
        $users = [];
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            $users[] = $obj;
        }
        return $users;
    }

    private function instantiate($row){
        $obj = null;
        switch ($row["Role"]) {
            case 'Member':
                $obj = new Member($row ["Name"], $row ["LastName"], $row ["Email"], $row ["Password"], $row["Role"]);
                $obj->SetId($row ["Id"]);
                break;
            
            case 'Admin':
                $obj = new Admin($row ["Name"], $row ["LastName"], $row ["Email"], $row ["Password"], $row["Role"]);
                $obj->SetId($row ["Id"]);
                break;
        }
     
        return $obj;
    }

}
?>