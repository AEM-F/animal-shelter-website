<?php
class Animal {
    public $id;
    public $name;
    public $age;
    public $breed;
    public $sex;
    public $size;
    public $description;
    public $imgLink;
    public $type;

    protected static $database;

    static public function setDatabase($database){
        self::$database = $database;
    }

    protected function getAnimalByName($name){
        $sql = "SELECT * FROM animals WHERE animal_name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);
    
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getAllAnimals(){
        $sql = "SELECT * FROM animals";
        $results = self::$database->connect()->query($sql);
        //var_dump($results);
        $animals = [];
        // foreach($results as $row){
        //     $animals[] = self::instantiate($row);
        // }
        foreach ($results as $row) {
            $obj = new self;
            $obj->id = $row ["animal_id"];
            $obj->name = $row ["animal_name"];
            $obj->age = $row ["animal_age"];
            $obj->breed = $row ["animal_breed"];
            $obj->sex = $row ["animal_sex"];
            $obj->size = $row ["animal_size"];
            $obj->description = $row ["animal_description"];
            $obj->imgLink = $row ["animal_image_link"];
            $obj->type = $row ["animal_type"];
            $animals[] = $obj;
        }
        return $animals;
    }
    
    public function getAllAnimalsCount(){
        // $sql = "SELECT COUNT(*) FROM animals";
        // $results = $this->connect()->query($sql)->fetchColumn();
        // return $results;
        $animals = self::getAllAnimals();
        //print_r($animals);
        $count = count($animals,1);
        return $count;
    }

    public function getAnimalById($id){
        $animals = self::getAllAnimals();
        //print_r($animals);
        $obj = new self;
        foreach($animals as $animal)
        {
           // print_r($animal[0]->name);
            if ($id == $animal->id) 
            {
                $obj = $animal;
                break;
            }
        }
        return $obj;
    }
    
    // protected static function instantiate($row){
    //     $obj = new self;

    //     foreach($row as $prop => $value){
    //         if(property_exists($obj, $prop)){
    //             $obj->$prop = $value;
    //         }
    //     }
    //     return $obj;
    // }
}
?>