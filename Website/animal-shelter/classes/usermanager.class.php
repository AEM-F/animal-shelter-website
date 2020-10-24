<?php
class UserManager{

    private $userDh;

    public function __construct(){
        $this->userDh = new UserDh();
    }

    /*User management section*/

    public function getUserById($id){
        return $this->userDh->getUserById($id);
    }

    public function getUserByEmail($email){
        $inputEmail= $this->sanitizeString($email);
        return $this->userDh->getUserByEmail($inputEmail);
    }

    public function updateUser($user){
         $this->userDh->updateUser($user);
    }

    public function addUser($name, $lastName, $email, $password){
        $user = new User($name, $lastName, $email, $password);
         $this->userDh->insertUser($user);
        return true;
    }

    public function validateLogIn($email,$password){
        return  $this->userDh->validateLogIn($email,$password);
    }

    public function validateEmail($email){
        return $this->userDh->validateEmail($email);
    }

    public function showUser($user){
        echo 
        "
            <b>Id:</b> " . $user->GetId() . "<br>
            <b>Name:</b> " . $user->GetName() . "<br>
            <b>Last Name:</b> " . $user->GetLastName() . "<br>
            <b>Email:</b> " . $user->GetEmail();
            
    }

    public function sanitizeString($string){

        $string = strip_tags($string);

        $string = str_replace(" ","",$string);

    return $string;
    }

    public function sanitizePassword($string)
    {
        $string = md5($string);
    
        return $string;
    }
}
?>