<?php
class Animal {
    private $id;
    private $name;
    private $age;
    private $breed;
    private $sex;
    private $size;
    private $description;
    private $imgLink;
    private $type;

    function __construct($id, $name, $age, $breed, $sex, $size, $description, $imgLink, $type){
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->breed = $breed;
        $this->sex = $sex;
        $this->size = $size;
        $this->description = $description;
        $this->imgLink = $imgLink;
        $this->type = $type;
    }

    public function GetId() { return $this->id; }
    public function GetName() { return $this->name; }
    public function GetAge() { return $this->age; }
    public function GetBreed() { return $this->breed; }
    public function GetSex() { return $this->sex; }
    public function GetSize() { return $this->size; }
    public function GetDescription() { return $this->description; }
    public function GetImgLink() { return $this->imgLink; }
    public function GetType() { return $this->type; }
    public function GetAnimalShortDescription(){ return "Sex: " . $this->GetSex() . "|" . "Breed: ". $this->GetBreed() . "|"  . "Size: ". $this->GetSize() . "|" . "Age: ". $this->GetAge();}
}
?>