<?php
class Member extends User{
    function __construct($name, $lastName, $email, $password, $role)
    {
        parent :: __construct($name, $lastName, $email, $password, $role);
    }
}
?>