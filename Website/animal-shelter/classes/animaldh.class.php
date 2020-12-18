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

    public function updateAnimal($animal){
        $animalBreed = "";
        $animalSpecies = "";
        if($animal->GetFamily() == "Canine" || $animal->GetFamily() == "Feline"){
            $animalBreed = $animal->GetBreed();
        }
        elseif($animal->GetFamily() == "Avian"){
            $animalSpecies = $animal->GetSpecies();
        }
        $sql="UPDATE `website_shelter_animals` SET `animal_name`=:aName, `animal_age`=:aAge, `animal_breed`=:aBreed, `animal_sex`=:aSex, `animal_size`=:aSize, `animal_description`=:aDescription, `animal_image_link`=:aLink, `animal_species`=:aSpecies, `animal_family`=:aFamily WHERE `animal_id`=:aId";
        try{
        $results=$this->database->connect()->prepare($sql);
        $results->bindValue(':aId', $animal->GetId());
        $results->bindValue(':aName', $animal->GetName());
        $results->bindValue(':aAge', $animal->GetAge());
        $results->bindValue(':aBreed', $animalBreed);
        $results->bindValue(':aSex', $animal->GetSex());
        $results->bindValue(':aSize', $animal->GetSize());
        $results->bindValue(':aDescription', $animal->GetDescription());
        $results->bindValue(':aLink', $animal->GetImgLink());
        $results->bindValue(':aSpecies', $animalSpecies);
        $results->bindValue(':aFamily', $animal->GetFamily());
        $results->execute();
        }
        catch(Exception $e){
            return false;
        }
        return true;
    }

    public function insertAnimal($animal){
        $animalBreed = "";
        $animalSpecies = "";
        if($animal->GetFamily() == "Canine" || $animal->GetFamily() == "Feline"){
            $animalBreed = $animal->GetBreed();
        }
        elseif($animal->GetFamily() == "Avian"){
            $animalSpecies = $animal->GetSpecies();
        }
        $sql="INSERT INTO `website_shelter_animals` (`animal_name`, `animal_age`, `animal_breed`, `animal_sex`, `animal_size`, `animal_description`, `animal_image_link`, `animal_species`, `animal_family`) VALUES (:aName, :aAge, :aBreed, :aSex, :aSize, :aDescription, :aLink, :aSpecies, :aFamily)";

        $results=$this->database->connect()->prepare($sql);
        $results->bindValue(':aName', $animal->GetName());
        $results->bindValue(':aAge', $animal->GetAge());
        $results->bindValue(':aBreed', $animalBreed);
        $results->bindValue(':aSex', $animal->GetSex());
        $results->bindValue(':aSize', $animal->GetSize());
        $results->bindValue(':aDescription', $animal->GetDescription());
        $results->bindValue(':aLink', $animal->GetImgLink());
        $results->bindValue(':aSpecies', $animalSpecies);
        $results->bindValue(':aFamily', $animal->GetFamily());
        $results->execute();
    }

    private function instantiate($row){
        $obj = null;
        switch ($row["animal_family"]) {
            case 'Canine':
                $obj = new Dog($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"], $row ["animal_breed"]);
                $obj->SetId($row["animal_id"]);
                break;
            
            case 'Feline':
                $obj = new Cat($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"], $row ["animal_breed"]);
                $obj->SetId($row["animal_id"]);
                break;

            case 'Avian':
                $obj = new Bird($row ["animal_name"], $row ["animal_age"], $row ["animal_sex"], $row ["animal_size"], $row ["animal_description"], $row ["animal_image_link"], $row ["animal_species"], $row["animal_family"]);
                $obj->SetId($row["animal_id"]);
                break; 
        }
     
        return $obj;
    }
}
?>