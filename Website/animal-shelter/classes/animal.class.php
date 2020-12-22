<?php
abstract class Animal {
    protected $id;
    protected $name;
    protected $age;
    protected $sex;
    protected $size;
    protected $description;
    protected $imgLink;
    protected $species;
    protected $family;

    public function __construct($name, $age, $sex, $size, $description, $imgLink, $species, $family){
        $this->name = $name;
        $this->age = $age;
        $this->family = $family;
        $this->sex = $sex;
        $this->size = $size;
        $this->description = $description;
        $this->imgLink = $imgLink;
        $this->species = $species;
    }

    public function GetId() { return $this->id; }
    public function SetId($id){$this->id = $id;}
    public function GetName() { return $this->name; }
    public function GetAge() { return $this->age; }
   // public function GetBreed() { return $this->breed; }
    public function GetSex() { return $this->sex; }
    public function GetSize() { return $this->size; }
    public function GetDescription() { return $this->description; }
    public function GetImgLink() { return $this->imgLink; }
    public function GetSpecies() { return $this->species; }
    public function GetFamily() { return $this->family; }
    //public function GetAnimalShortDescription(){ return "Sex: " . $this->GetSex() . "|" . "Breed: ". $this->GetBreed() . "|"  . "Size: ". $this->GetSize() . "|" . "Age: ". $this->GetAge();}
    abstract public function GetAnimalShortDescription();
}
?>