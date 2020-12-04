<?php
class AnimalDh{
    private $database;

    public function __construct(){
        $db = new Dbh();
        $this->database = $db;
    }

    public function getAllAnimals(){
        $sql = "SELECT * FROM website_shelter_animals";
        $results = $this->database->connect()->query($sql);

        $animals = [];
        $obj = null;
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            
            $animals[] = $obj;
        }
        return $animals;
    }

    public function getAnimalById($id){
        $sql="SELECT * FROM website_shelter_animals WHERE animal_id=:id";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['id' => $id]);

        $obj = null;
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
        }
        return $obj;
    }

    public function getAllAnimalsCount(){
        $sql = "SELECT COUNT(*) FROM website_shelter_animals";
        $results = $this->database->connect()->query($sql)->fetchColumn();
        return $results;
    }

    public function getAllAnimalsByNameCount($name){
        $sql = "SELECT COUNT(*) FROM website_shelter_animals WHERE animal_name=\"{$name}\"";
        $results = $this->database->connect()->query($sql)->fetchColumn();
        return $results;
    }

    public function getAllAnimalsByLimit($startNr,$nrPerPage){
        $sql = "SELECT * FROM website_shelter_animals ORDER BY animal_id desc LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj = null;
        $animals = [];
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            $animals[] = $obj;
        }
        return $animals;
    }

    public function getTypeAnimalsByLimit($startNr,$nrPerPage,$type){
        $sql = "SELECT * FROM website_shelter_animals WHERE animal_family=\"{$type}\" ORDER BY animal_id DESC LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj = null;
        $animals = [];
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            $animals[] = $obj;
        }
        return $animals;
    }

    public function getAnimalsByNameAndLimit($startNr, $nrPerPage, $name){
        $sql = "SELECT * FROM website_shelter_animals WHERE animal_name=\"{$name}\" ORDER BY animal_id DESC LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj = null;
        $animals = [];
        foreach ($results as $row) {
            $obj = $this->instantiate($row);
            $animals[] = $obj;
        }
        return $animals;
    }

    public function removeAnimalById($id){
        $sql="DELETE FROM website_shelter_animals WHERE animal_id=:id";
        $result= $this->database->connect()->prepare($sql);
        $result->bindValue(":id", $id);
        $result->execute();
    }

    private function instantiate($row){
        $obj = null;
        if($row["animal_family"] == "Canine"){
            $obj = new Dog($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"], $row ["animal_breed"]);
            $obj->SetId($row["animal_id"]);
        }
        elseif($row["animal_family"] == "Feline"){
            $obj = new Cat($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"], $row ["animal_breed"]);
            $obj->SetId($row["animal_id"]);
        }
        elseif($row["animal_family"] == "Avian"){
            $obj = new Bird($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"]);
            $obj->SetId($row["animal_id"]);
        }
        return $obj;
    }
}
?>