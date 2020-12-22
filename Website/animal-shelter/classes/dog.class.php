<?php
class Dog extends Animal{
    private $breed;

    public function GetBreed() { return $this->breed; }

    public function __construct($name, $age, $sex, $size, $description, $imgLink, $species, $family, $breed)
    {
        parent :: __construct($name, $age, $sex, $size, $description, $imgLink, $species, $family);
        $this->breed = $breed;
    }

    public function GetAnimalShortDescription(){
        return "Sex: " . $this->GetSex() . "|" . "Breed: ". $this->GetBreed() . "|"  . "Size: ". $this->GetSize() . "|" . "Age: ". $this->GetAge();
    }
}
?>