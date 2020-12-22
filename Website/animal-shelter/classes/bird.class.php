<?php
class Bird extends Animal{
   
    public function __construct($name, $age, $sex, $size, $description, $imgLink, $species, $family)
    {
        parent :: __construct($name, $age, $sex, $size, $description, $imgLink, $species, $family);
    }

    public function GetAnimalShortDescription(){
        return "Sex: " . $this->GetSex() . "|" . "Species: ". $this->GetSpecies() . "|"  . "Size: ". $this->GetSize() . "|" . "Age: ". $this->GetAge();
    }
}
?>