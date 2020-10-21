<?php
class User{

    private $id;
    private $name;
    private $lastName;
    private $email;
    private $password;

    function __construct($name, $lastName, $email, $password) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public function GetId() { return $this->id; }
    public function GetName() { return $this->name; }
    public function SetId($id){$this->id = $id;}
    public function GetLastName() { return $this->lastName; }
    public function GetEmail() { return $this->email; }
    public function GetPassword() { return $this->password; }
}
?>