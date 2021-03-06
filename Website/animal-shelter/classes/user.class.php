<?php
abstract class User{

    protected $id;
    protected $name;
    protected $lastName;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($name, $lastName, $email, $password, $role) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function GetId() { return $this->id; }
    public function GetName() { return $this->name; }
    public function SetId($id){$this->id = $id;}
    public function GetLastName() { return $this->lastName; }
    public function GetEmail() { return $this->email; }
    public function GetPassword() { return $this->password; }
    public function GetRole() { return $this->role; }
}
?>