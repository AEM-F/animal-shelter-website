<?php
class AnimalDh{
    private $database;

    public function __construct(){
        $db = new Dbh();
        $this->database = $db;
    }

    public function getAllAnimals(){
        $sql = "SELECT * FROM animals";
        $results = $this->database->connect()->query($sql);

        $animals = [];
        $obj;
        foreach ($results as $row) {
            $obj = new Animal($row ["animal_id"], $row ["animal_name"], $row ["animal_age"], $row ["animal_breed"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_type"]);
            $animals[] = $obj;
        }
        return $animals;
    }

    public function getAnimalById($id){
        $sql="SELECT * FROM animals WHERE animal_id=:id";
        $results=$this->database->connect()->prepare($sql);
        $results->execute(['id' => $id]);

        $obj;
        foreach ($results as $row) {
            $obj = new Animal($row ["animal_id"], $row ["animal_name"], $row ["animal_age"], $row ["animal_breed"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_type"]);
        }
        return $obj;
    }

    public function getAllAnimalsCount(){
        $sql = "SELECT COUNT(*) FROM animals";
        $results = $this->database->connect()->query($sql)->fetchColumn();
        return $results;
    }

    public function getAllAnimalsByLimit($startNr,$nrPerPage){
        $sql = "SELECT * FROM animals ORDER BY animal_id desc LIMIT {$startNr}, {$nrPerPage}";
        $results = $this->database->connect()->query($sql);

        $obj;
        $animals = [];
        foreach ($results as $row) {
            $obj = new Animal($row ["animal_id"], $row ["animal_name"], $row ["animal_age"], $row ["animal_breed"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_type"]);
            $animals[] = $obj;
        }
        return $animals;
    }
}
?>