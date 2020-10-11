<?php
class Dog extends Animal{

    public function __construct($id, $name, $age, $breed, $sex, $size, $description, $imgLink,$type){
       parent::__construct($id, $name, $age, $breed, $sex, $size, $description, $imgLink,$type);
    }

}
?>