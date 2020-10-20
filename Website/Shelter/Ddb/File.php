<?php
    class Person{


        private $name;
        private $pass;
        private $email;

        public function __construct($email,$name,$pass){
            $this->$name = $name;
            $this->$email = $email;
            $this->$pass = $pass;
        }
        //getter
        public function getEmail() {
            return "$this->email";
        }
        //setter
        public function setEmail($email){
            if(strpos($email, '@') > -1) {
                if(strpos($email, '@') < 1)
                $this->email = $email;
            }
        }
    }




?>