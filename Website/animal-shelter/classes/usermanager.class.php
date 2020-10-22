<?php
class UserManager{

    private $userDh;

    public function __construct(){
        $this->userDh = new UserDh();
    }

    /*User management section*/

    public function getUserByName($name){
        return $this->userDh->getUserByName($name);
    }

    public function getUserByEmail($email){
        $inputEmail= $this->sanitizeString($email);
        return $this->userDh->getUserByEmail($inputEmail);
    }

    public function updateUser($user){
            $this->userDh->updateUser($user);
    }

    public function addUser($name, $lastName, $email, $password){
        $inputName = $this->sanitizeString($name);
        $inputLastName = $this->sanitizeString($lastName);
        $inputEmail = $this->sanitizeString($email);
        $inputPassword = $this->sanitizePassword($password);
        if($inputName == "" || $inputLastName == "" || $inputEmail == "" || $inputPassword == ""){
            return false;
        }
        else{
            $user = new User($inputName, $inputLastName, $inputEmail, $inputPassword);
            $this->userDh->insertUser($user);
            return true;
        }
    }

    public function validateLogIn($email,$password){
        $inputEmail = $this->sanitizeString($email);
        $inputPassword = $this->sanitizePassword($password);
        if($inputEmail == "" || $inputPassword == ""){
        return false;
        }
        else{
        return  $this->userDh->validateLogIn($inputEmail,$inputPassword);
        }
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